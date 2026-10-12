@extends('admin.layout')

@section('title', 'Projets')
@section('heading', 'Projets réalisés')

@section('content')
<div class="mb-6 flex flex-wrap items-center gap-3">
    <p class="flex-1 text-sm text-slate-500">Les projets affichés sur la page « Projets », dans l’ordre indiqué.</p>
    <a href="{{ route('admin.projects.create') }}" class="rounded-xl bg-brand px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-dark">+ Ajouter un projet</a>
</div>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    @forelse ($projects as $project)
        <div class="flex flex-wrap items-center gap-4 border-b border-slate-100 p-4 last:border-0 sm:flex-nowrap">
            <span class="w-8 text-center text-sm font-semibold text-slate-400">{{ $project->sort_order }}</span>
            <img src="{{ $project->imageUrl() }}" alt="" class="h-16 w-24 shrink-0 rounded-lg object-cover">
            <div class="min-w-0 flex-1">
                <p class="truncate font-semibold text-slate-900">{{ str_replace("\n", ' ', $project->title) }}</p>
                <p class="truncate text-sm text-slate-500">{{ $project->client }} · {{ $project->period }}</p>
            </div>
            @unless ($project->is_published)
                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-500">Masqué</span>
            @endunless
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.projects.edit', $project) }}" class="rounded-lg px-3 py-2 text-sm font-medium text-brand hover:bg-brand/5">Modifier</a>
                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Supprimer définitivement ce projet ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="rounded-lg px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50">Supprimer</button>
                </form>
            </div>
        </div>
    @empty
        <p class="p-6 text-sm text-slate-500">Aucun projet. Ajoutez-en un pour l’afficher sur le site.</p>
    @endforelse
</div>
@endsection
