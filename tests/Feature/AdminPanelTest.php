<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\ServicePage;
use App\Models\TeamMember;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
        Storage::fake('public');
        Storage::fake('local');
    }

    private function admin(): User
    {
        return User::query()->where('email', 'admin@gmail.com')->firstOrFail();
    }

    public function test_guests_are_sent_to_the_login_page(): void
    {
        $this->get('/admin')->assertRedirect(route('admin.login'));
        $this->get('/admin/entreprise')->assertRedirect(route('admin.login'));
    }

    public function test_the_seeded_admin_can_log_in_and_a_wrong_password_is_refused(): void
    {
        $this->post(route('admin.login.store'), ['email' => 'admin@gmail.com', 'password' => 'mauvais'])
            ->assertSessionHasErrors('email');
        $this->assertGuest();

        $this->post(route('admin.login.store'), ['email' => 'admin@gmail.com', 'password' => '12345678'])
            ->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($this->admin());
    }

    public function test_every_admin_screen_renders(): void
    {
        $this->actingAs($this->admin());
        $message = ContactMessage::query()->create(['type' => 'renseignements', 'name' => 'Awa', 'email' => 'awa@example.com', 'message' => 'Bonjour']);

        foreach ([
            route('admin.dashboard'), route('admin.settings.edit'), route('admin.services.index'),
            route('admin.services.edit', 'erp'), route('admin.projects.index'), route('admin.projects.create'),
            route('admin.projects.edit', Project::query()->first()), route('admin.team.index'), route('admin.team.create'),
            route('admin.team.edit', TeamMember::query()->first()), route('admin.messages.index'),
            route('admin.messages.show', $message), route('admin.account.edit'),
        ] as $url) {
            $this->get($url)->assertOk();
        }
        $this->assertNotNull($message->fresh()->read_at);
    }

    public function test_company_information_is_updated_on_the_site(): void
    {
        $this->actingAs($this->admin())->put(route('admin.settings.update'), [
            'company_name' => 'NEXORA DIGITAL SARL',
            'phone_mobile' => '+225 07 11 22 33 44',
            'phone_office' => '+225 27 00 00 00 00',
            'email_contact' => 'hello@nexora.test',
            'email_careers' => 'jobs@nexora.test',
            'address' => "Rue 1\nAbidjan",
            'maps_url' => 'https://maps.example.com/nexora',
            'footer_tagline' => "Ligne A\nLigne B",
            'hero_subtitle' => 'Nouvelle phrase d’introduction.',
            'case_label' => 'Étude de cas',
            'case_title' => 'NOUVEAU CAS',
            'case_text' => 'Texte du cas.',
            'case_image' => UploadedFile::fake()->image('cas.jpg', 1200, 600),
        ])->assertRedirect(route('admin.settings.edit'));

        $this->get('/contact')->assertSee('+225 07 11 22 33 44')->assertSee('tel:+2250711223344', false)
            ->assertSee('hello@nexora.test')->assertSee('jobs@nexora.test')->assertSee('Rue 1<br>Abidjan', false)
            ->assertSee('Ligne A<br>Ligne B', false)->assertSee('Nouvelle phrase d’introduction.');
        $this->get('/project')->assertSee('NOUVEAU CAS')->assertSee('/storage/uploads/projets/', false);
    }

    public function test_a_service_page_text_and_images_are_updated(): void
    {
        $this->actingAs($this->admin())->put(route('admin.services.update', 'audit'), [
            'tab_label' => 'Audit SI',
            'card_title' => 'Audit & conseil',
            'overview_title' => 'AUDIT SI & AMOA',
            'overview_text' => 'Texte de présentation.',
            'name' => 'Audit SI & AMOA',
            'title' => 'AUDIT DES SYSTEMES',
            'para1' => 'Premier paragraphe modifié.',
            'para2' => 'Second paragraphe ajouté.',
            'image' => UploadedFile::fake()->image('audit.jpg', 1600, 700),
            'gallery' => [1 => UploadedFile::fake()->image('g2.jpg', 1000, 600)],
        ])->assertRedirect(route('admin.services.edit', 'audit'));

        $page = ServicePage::query()->where('slug', 'audit')->first();
        $this->assertStringStartsWith('uploads/services/', $page->image);
        $this->assertStringStartsWith('assets/img/', $page->gallery[0]);
        $this->assertStringStartsWith('uploads/services/', $page->gallery[1]);
        Storage::disk('public')->assertExists($page->image);

        $this->get('/service/audit')->assertOk()->assertSee('AUDIT DES SYSTEMES')
            ->assertSee('Premier paragraphe modifié.')->assertSee('Second paragraphe ajouté.')->assertSee('Audit SI');
        $this->get('/service')->assertOk()->assertSee('Audit &amp; conseil', false)->assertSee('Texte de présentation.');
    }

    public function test_projects_can_be_added_hidden_and_deleted(): void
    {
        $this->actingAs($this->admin())->post(route('admin.projects.store'), [
            'title' => "NOUVEAU PROJET\nSUR DEUX LIGNES",
            'period' => '2025',
            'client' => 'Client test',
            'provider' => 'NEXORA DIGITAL SARL',
            'sort_order' => 6,
            'is_published' => '1',
            'image' => UploadedFile::fake()->image('p.jpg', 1024, 768),
        ])->assertRedirect(route('admin.projects.index'));

        $project = Project::query()->where('client', 'Client test')->firstOrFail();
        $this->get('/project')->assertSee('Client test');

        $this->put(route('admin.projects.update', $project), [
            'title' => 'NOUVEAU PROJET', 'period' => '2025', 'client' => 'Client test', 'provider' => 'NEXORA DIGITAL SARL', 'sort_order' => 6, 'is_published' => '0',
        ])->assertRedirect(route('admin.projects.index'));
        $this->get('/project')->assertDontSee('Client test');

        $image = $project->image;
        $this->delete(route('admin.projects.destroy', $project))->assertRedirect(route('admin.projects.index'));
        $this->assertModelMissing($project);
        Storage::disk('public')->assertMissing($image);
    }

    public function test_team_members_can_be_added_and_edited(): void
    {
        $this->actingAs($this->admin())->post(route('admin.team.store'), [
            'name' => 'Aya Koné', 'roles' => "Directrice financière\nCFA", 'sort_order' => 7, 'is_published' => '1',
            'photo' => UploadedFile::fake()->image('aya.jpg', 557, 743),
        ])->assertRedirect(route('admin.team.index'));

        $this->get('/about')->assertSee('Aya Koné')->assertSee('Directrice financière<br>CFA', false);

        $member = TeamMember::query()->where('name', 'Serge Kadio')->firstOrFail();
        $this->put(route('admin.team.update', $member), ['name' => 'Serge K.', 'roles' => 'DG', 'sort_order' => 1, 'is_published' => '1'])
            ->assertRedirect(route('admin.team.index'));
        $this->get('/about')->assertSee('Serge K.')->assertDontSee('Serge Kadio');
    }

    public function test_contact_form_messages_reach_the_admin_with_their_cv(): void
    {
        $this->post(route('contact.send'), [
            'type' => 'carrieres', 'name' => 'Koffi', 'email' => 'koffi@example.com', 'subject' => 'Candidature',
            'message' => 'Mon CV', 'consent' => '1', 'cv' => UploadedFile::fake()->create('cv.pdf', 120, 'application/pdf'),
        ])->assertRedirect(route('contact') . '#carrieres');

        $message = ContactMessage::query()->where('email', 'koffi@example.com')->firstOrFail();
        Storage::disk('local')->assertExists($message->cv_path);

        $this->actingAs($this->admin());
        $this->get(route('admin.messages.index'))->assertSee('Koffi');
        $this->get(route('admin.messages.cv', $message))->assertOk()->assertDownload('CV - Koffi.pdf');
        $this->delete(route('admin.messages.destroy', $message))->assertRedirect(route('admin.messages.index'));
        Storage::disk('local')->assertMissing($message->cv_path);
    }

    public function test_the_admin_can_change_the_password(): void
    {
        $this->actingAs($this->admin())->put(route('admin.account.update'), [
            'name' => 'Administrateur', 'email' => 'admin@gmail.com', 'current_password' => 'faux', 'password' => 'NouveauMdp2026', 'password_confirmation' => 'NouveauMdp2026',
        ])->assertSessionHasErrors('current_password');

        $this->put(route('admin.account.update'), [
            'name' => 'Administrateur', 'email' => 'admin@gmail.com', 'current_password' => '12345678', 'password' => 'NouveauMdp2026', 'password_confirmation' => 'NouveauMdp2026',
        ])->assertRedirect(route('admin.account.edit'));

        $this->post(route('admin.logout'));
        $this->post(route('admin.login.store'), ['email' => 'admin@gmail.com', 'password' => 'NouveauMdp2026'])->assertRedirect(route('admin.dashboard'));
    }

    public function test_public_pages_still_render_from_the_database(): void
    {
        foreach (['/', '/about', '/about/histoire-et-heritage', '/service', '/service/web-mobile', '/service/btp', '/project', '/contact'] as $url) {
            $this->get($url)->assertOk();
        }
        $this->get('/about')->assertSee('Serge Kadio');
        $this->get('/project')->assertSee('Groupe SIFCA')->assertSee('PORTAIL E-SERVICE DGBF');
        $this->get('/service/nope')->assertNotFound();
    }
}
