<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Support\Media;
use App\Support\Site;
use Illuminate\Http\Request;

/** "Informations de l'entreprise": phones, emails, address, shared texts and the featured case study. */
class SettingsController extends Controller
{
    public function edit()
    {
        return view('admin.settings', ['values' => Site::all()]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'company_name' => ['required', 'string', 'max:120'],
            'phone_mobile' => ['required', 'string', 'max:40'],
            'phone_office' => ['nullable', 'string', 'max:40'],
            'email_contact' => ['required', 'email', 'max:190'],
            'email_careers' => ['nullable', 'email', 'max:190'],
            'address' => ['required', 'string', 'max:1000'],
            'maps_url' => ['nullable', 'url', 'max:1000'],
            'footer_tagline' => ['required', 'string', 'max:300'],
            'hero_subtitle' => ['required', 'string', 'max:400'],
            'case_label' => ['required', 'string', 'max:120'],
            'case_title' => ['required', 'string', 'max:190'],
            'case_text' => ['required', 'string', 'max:3000'],
            'case_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        if ($request->hasFile('case_image')) {
            $data['case_image'] = Media::replace($request->file('case_image'), 'projets', Site::get('case_image'));
        } else {
            unset($data['case_image']);
        }

        foreach ($data as $key => $value) {
            Setting::query()->updateOrCreate(['key' => $key], ['value' => $value]);
        }
        Site::forget();

        return redirect()->route('admin.settings.edit')->with('status', 'Les informations de l’entreprise ont été mises à jour.');
    }
}
