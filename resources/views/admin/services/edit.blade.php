@extends('admin.layout')

@section('title', $page->name)
@section('heading', 'Service : ' . $page->name)

@section('content')
<div class="mb-6 flex flex-wrap items-center gap-3 text-sm">
    <a href="{{ route('admin.services.index') }}" class="text-slate-500 hover:text-brand">← Tous les services</a>
    <a href="{{ route('service.show', $page->slug) }}" target="_blank" class="ml-auto rounded-xl border border-slate-300 bg-white px-4 py-2 font-medium text-slate-700 hover:border-brand hover:text-brand">Voir la page sur le site</a>
</div>

<form method="POST" action="{{ route('admin.services.update', $page) }}" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @method('PUT')

    <x-admin.card title="Page détaillée du service" :description="'La page ouverte depuis l’onglet « ' . $page->tab_label . ' ».'">
        <div class="grid gap-5 xl:grid-cols-[1fr_22rem]">
            <div class="space-y-5">
                <div class="grid gap-5 md:grid-cols-2">
                    <x-admin.field name="tab_label" label="Onglet" :value="$page->tab_label" required help="Bouton sous le titre « NOS SERVICES »." />
                    <x-admin.field name="name" label="Nom du service" :value="$page->name" required help="Titre de l’onglet du navigateur et textes alternatifs." />
                </div>
                <x-admin.field name="title" label="Titre de la page" :value="$page->title" required help="En majuscules sur le site." />
                <x-admin.field name="para1" label="Paragraphe 1" :value="$page->para1" :rows="5" required />
                <x-admin.field name="para2" label="Paragraphe 2 (facultatif)" :value="$page->para2" :rows="4" />
            </div>
            <x-admin.image name="image" label="Grande image" :current="$page->imageUrl()" />
        </div>
    </x-admin.card>

    <x-admin.card title="Galerie" description="Les 3 images qui défilent en bas de la page, de gauche à droite.">
        <div class="grid gap-5 md:grid-cols-3">
            @foreach ([0, 1, 2] as $i)
                <x-admin.image name="gallery[{{ $i }}]" label="Image {{ $i + 1 }}" :current="$page->galleryUrls()[$i] ?? null" />
            @endforeach
        </div>
    </x-admin.card>

    <x-admin.card title="Page « Nos services »" description="Le bloc de ce service sur la page qui présente tous les services.">
        <div class="grid gap-5 xl:grid-cols-[1fr_22rem]">
            <div class="space-y-5">
                <div class="grid gap-5 md:grid-cols-2">
                    <x-admin.field name="overview_title" label="Titre du bloc" :value="$page->overview_title" required />
                    <x-admin.field name="card_title" label="Titre de la carte" :value="$page->card_title" help="Cartes qui défilent en haut de la page. Vide = pas de carte." />
                </div>
                <x-admin.field name="overview_text" label="Texte du bloc" :value="$page->overview_text" :rows="7" required />
            </div>
            <x-admin.image name="overview_image" label="Image du bloc" :current="$page->overviewImageUrl()" />
        </div>
    </x-admin.card>

    <x-admin.submit :cancel="route('admin.services.index')" />
</form>
@endsection
