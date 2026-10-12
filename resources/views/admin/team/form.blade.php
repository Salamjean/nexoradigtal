@extends('admin.layout')

@php $editing = $member->exists; @endphp

@section('title', $editing ? 'Modifier un membre' : 'Nouveau membre')
@section('heading', $editing ? 'Modifier : ' . $member->name : 'Nouveau membre de l’équipe')

@section('content')
<a href="{{ route('admin.team.index') }}" class="mb-6 inline-block text-sm text-slate-500 hover:text-brand">← Toute l’équipe</a>

<form method="POST" action="{{ $editing ? route('admin.team.update', $member) : route('admin.team.store') }}" enctype="multipart/form-data">
    @csrf
    @if ($editing)
        @method('PUT')
    @endif

    <x-admin.card>
        <div class="grid gap-6 xl:grid-cols-[1fr_18rem]">
            <div class="space-y-5">
                <x-admin.field name="name" label="Nom et prénom" :value="$member->name" required />
                <x-admin.field name="roles" label="Fonction" :value="$member->roles" :rows="3" required help="Une ligne par ligne affichée sous le nom." />
                <x-admin.field name="sort_order" type="number" label="Ordre d’affichage" :value="$member->sort_order" required help="1 = en haut à gauche." class="max-w-xs" />
                <label class="flex items-center gap-3 text-sm text-slate-700">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $member->is_published)) class="h-4 w-4 rounded border-slate-300 text-brand focus:ring-brand">
                    Afficher ce membre sur le site
                </label>
            </div>
            <x-admin.image name="photo" label="Photo (format portrait)" :current="$editing ? $member->photoUrl() : null" :required="! $editing" ratio="aspect-[557/743]" />
        </div>
    </x-admin.card>

    <x-admin.submit :label="$editing ? 'Enregistrer' : 'Ajouter le membre'" :cancel="route('admin.team.index')" />
</form>
@endsection
