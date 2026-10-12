<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\ServicePage;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

/**
 * Public pages. Texts and images edited from the admin panel come from the database;
 * the Figma pixel layout stays in the views and config/nexora_services.php.
 */
class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about', ['team' => TeamMember::query()->published()->get()]);
    }

    public function history()
    {
        return view('pages.history');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Handles both contact page forms ("renseignements" and "carrieres").
     * Messages are saved for the admin panel (/admin/messages); CVs are kept in storage/app/private/candidatures.
     */
    public function contactSend(Request $request)
    {
        $type = $request->input('type') === 'carrieres' ? 'carrieres' : 'renseignements';

        $rules = [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['nullable', 'string', 'max:190'],
            'message' => ['nullable', 'string', 'max:5000'],
            'consent' => ['accepted'],
        ];
        if ($type === 'carrieres') {
            $rules += [
                'skills' => ['nullable', 'string', 'max:500'],
                'experience' => ['nullable', 'string', 'max:50'],
                'cv' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            ];
        }

        $validator = Validator::make($request->all(), $rules, [
            'consent.accepted' => 'Veuillez accepter la politique de confidentialité.',
        ], [
            'name' => 'nom', 'email' => 'adresse courriel', 'phone' => 'numéro de portable',
            'subject' => 'sujet', 'message' => 'message', 'skills' => 'compétences', 'experience' => "années d'expérience", 'cv' => 'CV',
        ]);

        $back = redirect()->to(route('contact') . '#' . $type);

        if ($validator->fails()) {
            return $back->withErrors($validator, $type)->withInput()->with('contact_form', $type);
        }

        $data = $validator->safe()->except(['consent', 'cv']);
        if ($request->hasFile('cv')) {
            $data['cv_path'] = $request->file('cv')->store('candidatures', 'local');
        }

        $message = ContactMessage::query()->create(['type' => $type] + $data);
        Log::info("Formulaire de contact ({$type}) #{$message->id}");

        return $back->with('contact_sent', $type);
    }

    public function service()
    {
        return view('pages.service', ['pages' => ServicePage::ordered()->keyBy('slug')]);
    }

    public function serviceShow(string $slug)
    {
        $layout = config("nexora_services.$slug");
        $page = ServicePage::query()->where('slug', $slug)->first();
        abort_if($layout === null || $page === null, 404);

        // Paragraph gaps come from the Figma layout; a 2nd paragraph added from the admin gets the usual gap
        $paras = [[$layout['paras'][0][0], $page->para1]];
        if (filled($page->para2)) {
            $paras[] = [$layout['paras'][1][0] ?? 48.5, $page->para2];
        }

        return view('pages.service-detail', ['service' => [
            'slug' => $slug,
            'name' => $page->name,
            'title' => $page->title,
            'paras' => $paras,
            'image' => $page->imageUrl(),
            'gallery' => $page->galleryUrls(),
        ] + $layout]);
    }

    public function project()
    {
        return view('pages.project', ['projects' => Project::query()->published()->get()]);
    }
}
