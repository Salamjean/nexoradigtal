@extends('admin.layout')

@section('title', 'Entreprise')
@section('heading', 'Informations de l’entreprise')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    <x-admin.card title="Coordonnées" description="Affichées dans le pied de page de toutes les pages, sur la page Contact et sur le bouton d’appel.">
        <div class="grid gap-5 md:grid-cols-2">
            <x-admin.field name="company_name" label="Nom de l’entreprise" :value="$values['company_name']" required class="md:col-span-2" />
            <x-admin.field name="phone_mobile" label="Téléphone principal" :value="$values['phone_mobile']" required help="Pied de page et bouton d’appel flottant." />
            <x-admin.field name="phone_office" label="Téléphone fixe" :value="$values['phone_office']" help="Page Contact, « Numéro de téléphone »." />
            <x-admin.field name="email_contact" type="email" label="E-mail de contact" :value="$values['email_contact']" required help="Pied de page et page Contact." />
            <x-admin.field name="email_careers" type="email" label="E-mail recrutement" :value="$values['email_careers']" help="Page Contact, « Carrières »." />
            <x-admin.field name="address" label="Adresse" :value="$values['address']" :rows="7" required help="Une ligne par ligne d’adresse (page Contact)." />
            <x-admin.field name="maps_url" type="url" label="Lien Google Maps" :value="$values['maps_url']" help="Ouvert par le rond bleu sous l’adresse, page Contact." />
        </div>
    </x-admin.card>

    <x-admin.card title="Textes communs">
        <div class="grid gap-5 md:grid-cols-2">
            <x-admin.field name="hero_subtitle" label="Phrase d’introduction des pages" :value="$values['hero_subtitle']" :rows="3" required help="Sous les grands titres (Qui sommes-nous, Services, Projets, Contact…)." />
            <x-admin.field name="footer_tagline" label="Slogan du pied de page" :value="$values['footer_tagline']" :rows="3" required help="En bleu dans le pied de page. Une ligne par retour à la ligne." />
        </div>
    </x-admin.card>

    <x-admin.card title="Page Projets : étude de cas vedette" description="Le bloc en haut de la page Projets, avant la liste des projets.">
        <div class="grid gap-5 xl:grid-cols-[1fr_22rem]">
            <div class="space-y-5">
                <div class="grid gap-5 md:grid-cols-2">
                    <x-admin.field name="case_label" label="Libellé" :value="$values['case_label']" required />
                    <x-admin.field name="case_title" label="Titre" :value="$values['case_title']" required />
                </div>
                <x-admin.field name="case_text" label="Texte" :value="$values['case_text']" :rows="7" required />
            </div>
            <x-admin.image name="case_image" label="Grande image" :current="\App\Support\Media::url($values['case_image'])" />
        </div>
    </x-admin.card>

    <x-admin.submit />
</form>
@endsection
