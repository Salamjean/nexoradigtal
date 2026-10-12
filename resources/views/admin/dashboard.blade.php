@extends('admin.layout')

@section('title', 'Tableau de bord')
@section('heading', 'Tableau de bord')

@section('content')
@php
    $tiles = [
        ['label' => 'Messages non lus', 'value' => $counts['unread'], 'route' => 'admin.messages.index', 'accent' => true],
        ['label' => 'Pages de services', 'value' => $counts['services'], 'route' => 'admin.services.index'],
        ['label' => 'Projets', 'value' => $counts['projects'], 'route' => 'admin.projects.index'],
        ['label' => 'Membres de l’équipe', 'value' => $counts['team'], 'route' => 'admin.team.index'],
    ];
    $shortcuts = [
        ['route' => 'admin.settings.edit', 'title' => 'Informations de l’entreprise', 'text' => 'Téléphones, e-mails, adresse, slogan du pied de page, étude de cas vedette.'],
        ['route' => 'admin.services.index', 'title' => 'Services', 'text' => 'Textes et images des 6 pages de services et de la page « Nos services ».'],
        ['route' => 'admin.projects.index', 'title' => 'Projets réalisés', 'text' => 'Ajouter, modifier, masquer ou supprimer un projet.'],
        ['route' => 'admin.team.index', 'title' => 'Équipe', 'text' => 'Photos, noms et fonctions de l’équipe de direction.'],
    ];
@endphp

<p class="mb-8 text-sm text-slate-500">Bonjour {{ auth()->user()->name }}, voici l’état du site. Les modifications enregistrées ici apparaissent immédiatement sur le site.</p>

<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
    @foreach ($tiles as $tile)
        <a href="{{ route($tile['route']) }}" class="rounded-2xl border p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md {{ ! empty($tile['accent']) && $tile['value'] > 0 ? 'border-brand bg-brand text-white' : 'border-slate-200 bg-white' }}">
            <p class="text-sm {{ ! empty($tile['accent']) && $tile['value'] > 0 ? 'text-white/80' : 'text-slate-500' }}">{{ $tile['label'] }}</p>
            <p class="mt-2 font-eurostile text-3xl font-bold">{{ $tile['value'] }}</p>
        </a>
    @endforeach
</div>

<div class="mt-8 grid gap-6 xl:grid-cols-[1fr_1.2fr]">
    <x-admin.card title="Que voulez-vous modifier ?">
        <div class="grid gap-3">
            @foreach ($shortcuts as $shortcut)
                <a href="{{ route($shortcut['route']) }}" class="group flex items-center gap-4 rounded-xl border border-slate-200 px-5 py-4 transition hover:border-brand hover:bg-brand/5">
                    <span class="flex-1">
                        <span class="block text-sm font-semibold text-slate-900">{{ $shortcut['title'] }}</span>
                        <span class="block text-sm text-slate-500">{{ $shortcut['text'] }}</span>
                    </span>
                    <svg class="h-5 w-5 text-slate-400 transition group-hover:translate-x-1 group-hover:text-brand" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M9 6l6 6-6 6"/></svg>
                </a>
            @endforeach
        </div>
    </x-admin.card>

    <x-admin.card title="Derniers messages reçus" description="Envoyés depuis la page Contact du site.">
        @forelse ($latestMessages as $message)
            <a href="{{ route('admin.messages.show', $message) }}" class="flex items-start gap-3 border-b border-slate-100 py-3 last:border-0 hover:bg-slate-50">
                <span class="mt-1.5 h-2 w-2 shrink-0 rounded-full {{ $message->read_at ? 'bg-transparent' : 'bg-brand' }}" aria-hidden="true"></span>
                <span class="min-w-0 flex-1">
                    <span class="flex items-baseline justify-between gap-3">
                        <span class="truncate text-sm {{ $message->read_at ? 'text-slate-700' : 'font-semibold text-slate-900' }}">{{ $message->name }}</span>
                        <span class="shrink-0 text-xs text-slate-400">{{ $message->created_at->format('d/m/Y H:i') }}</span>
                    </span>
                    <span class="block truncate text-sm text-slate-500">{{ $message->typeLabel() }} · {{ $message->subject ?: \Illuminate\Support\Str::limit($message->message, 60) ?: '(sans sujet)' }}</span>
                </span>
            </a>
        @empty
            <p class="text-sm text-slate-500">Aucun message pour le moment.</p>
        @endforelse
    </x-admin.card>
</div>
@endsection
