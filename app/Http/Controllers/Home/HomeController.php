<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
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
     * No mailer is configured yet: submissions are logged and CVs are kept in storage/app/private/candidatures.
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
            $data['cv'] = $request->file('cv')->store('candidatures', 'local');
        }

        Log::info("Formulaire de contact ({$type})", $data);

        return $back->with('contact_sent', $type);
    }

    public function service()
    {
        return view('pages.service');
    }

    public function serviceShow(string $slug)
    {
        $service = config("nexora_services.$slug");
        abort_if($service === null, 404);

        return view('pages.service-detail', ['service' => $service + ['slug' => $slug]]);
    }

    public function project()
    {
        return view('pages.project');
    }
}
