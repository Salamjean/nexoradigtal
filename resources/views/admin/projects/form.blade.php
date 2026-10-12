@extends('admin.layout')

@php $editing = $project->exists; @endphp

@section('title', $editing ? 'Modifier un projet' : 'Nouveau projet')
@section('heading', $editing ? 'Modifier le projet' : 'Nouveau projet')

@section('content')
<a href="{{ route('admin.projects.index') }}" class="mb-6 inline-block text-sm text-slate-500 hover:text-brand">← Tous les projets</a>

<form method="POST" action="{{ $editing ? route('admin.projects.update', $project) : route('admin.projects.store') }}" enctype="multipart/form-data">
    @csrf
    @if ($editing)
        @method('PUT')
    @endif

    <x-admin.card>
        <div class="grid gap-6 xl:grid-cols-[1fr_22rem]">
            <div class="space-y-5">
                <x-admin.field name="title" label="Titre" :value="$project->title" :rows="2" required
                    help="En majuscules sur le site. Allez à la ligne pour couper le titre en deux lignes sur ordinateur." />
                <div class="grid gap-5 md:grid-cols-2">
                    <x-admin.field name="period" label="Date" :value="$project->period" required help="Ex. : Janvier 2024 à aujourd’hui" />
                    <x-admin.field name="client" label="Client" :value="$project->client" required />
                    <x-admin.field name="provider" label="Prestataire principal" :value="$project->provider" required />
                    <x-admin.field name="sort_order" type="number" label="Ordre d’affichage" :value="$project->sort_order" required help="1 = premier projet de la liste." />
                </div>
                <label class="flex items-center gap-3 text-sm text-slate-700">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $project->is_published)) class="h-4 w-4 rounded border-slate-300 text-brand focus:ring-brand">
                    Afficher ce projet sur le site
                </label>
            </div>
            <x-admin.image name="image" label="Image" :current="$editing ? $project->imageUrl() : null" :required="! $editing" ratio="aspect-[4/3]" />
        </div>
    </x-admin.card>

    <x-admin.submit :label="$editing ? 'Enregistrer' : 'Ajouter le projet'" :cancel="route('admin.projects.index')" />
</form>
@endsection
