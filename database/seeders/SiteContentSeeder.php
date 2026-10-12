<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ServicePage;
use App\Models\Setting;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

/**
 * Fills the editable content with what the site showed before the admin panel existed
 * (the Figma texts and the images bundled in public/assets/img).
 * Safe to run again: existing rows are left untouched, so edits made in /admin are kept.
 */
class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('nexora_site') as $key => $value) {
            Setting::query()->firstOrCreate(['key' => $key], ['value' => $value]);
        }

        $order = 0;
        foreach (config('nexora_services') as $slug => $service) {
            ServicePage::query()->firstOrCreate(['slug' => $slug], [
                'sort_order' => $order++,
                'tab_label' => $service['tab'],
                'card_title' => $service['card'],
                'overview_title' => $service['overview']['title'],
                'overview_text' => $service['overview']['text'],
                'overview_image' => 'assets/img/' . $service['overview']['image'],
                'name' => $service['name'],
                'title' => $service['title'],
                'para1' => $service['paras'][0][1],
                'para2' => $service['paras'][1][1] ?? null,
                'image' => 'assets/img/figma_svc_' . $service['img'] . '_main.jpg',
                'gallery' => array_map(fn ($g) => 'assets/img/figma_svc_' . $service['img'] . '_' . $g . '.jpg', ['g1', 'g2', 'g3']),
            ]);
        }

        if (! Project::query()->exists()) {
            $projects = [
                ['DEPLOIEMENT ERP-GROUPE SIFCA', "Janvier 2024 à aujourd'hui", 'Groupe SIFCA', 'figma_proj_sifca.jpg'],
                ["PLATEFORME RH-BOLLORE AFRICA\nLOGISTICS", 'Mars 2023 à décembre 2023', 'Bolloré Africa Logistics', 'figma_proj_bollore.jpg'],
                ["DEMATHERIALISATION - MINISTERE\nDES FINANCES", 'Juin 2023 – En cours', 'Ministère des Finances CI', 'figma_proj_finances.jpg'],
                ["INFRASTRUCTURE IT-ORANGE COTE\nD’IVOIRE", 'Septembre 2022 (en cours)', "Orange Côte d'Ivoire", 'figma_proj_orange.jpg'],
                ['PORTAIL E-GOUVERNEMENT-DGBF', 'Avril 2022 à janvier 2024', 'Direction Générale du Budget', 'figma_proj_egov.jpg'],
            ];
            foreach ($projects as $i => [$title, $period, $client, $image]) {
                Project::query()->create([
                    'title' => $title, 'period' => $period, 'client' => $client, 'provider' => 'NEXORA DIGITAL SARL',
                    'image' => 'assets/img/' . $image, 'sort_order' => $i + 1,
                ]);
            }
        }

        if (! TeamMember::query()->exists()) {
            $team = [
                ['Serge Kadio', 'Directeur Général', 'figma_about_member_serge.jpg'],
                ['Carlos Riodan', 'Directeur des Opérations Digitales', 'figma_about_member_carlos.jpg'],
                ['Fabiola Khy', "PMP, ITIL v4, AWS Certified\nResponsable Sécurité &\nConformité SI", 'figma_about_member_fabiola.jpg'],
                ['Salam Chedour', 'Responsable Commercial & Contrats', 'figma_about_member_salam.jpg'],
                ['Innes Excellencia', 'Responsable Projets Infrastructure', 'figma_about_member_innes.jpg'],
                ['Khogo Soro', 'Responsable Projets Infrastructure', 'figma_about_member_khogo.jpg'],
            ];
            foreach ($team as $i => [$name, $roles, $photo]) {
                TeamMember::query()->create(['name' => $name, 'roles' => $roles, 'photo' => 'assets/img/' . $photo, 'sort_order' => $i + 1]);
            }
        }
    }
}
