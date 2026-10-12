@extends('admin.layout')

@section('title', 'Équipe')
@section('heading', 'Équipe de direction')

@section('content')
<div class="mb-6 flex flex-wrap items-center gap-3">
    <p class="flex-1 text-sm text-slate-500">Les membres affichés sur la page « Qui sommes-nous ? », dans l’ordre indiqué (3 par ligne).</p>
    <a href="{{ route('admin.team.create') }}" class="rounded-xl bg-brand px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-dark">+ Ajouter un membre</a>
</div>

<div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
    @forelse ($members as $member)
        <article class="flex gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <img src="{{ $member->photoUrl() }}" alt="" class="h-28 w-24 shrink-0 rounded-xl object-cover">
            <div class="flex min-w-0 flex-1 flex-col">
                <p class="font-semibold text-slate-900">{{ $member->name }}</p>
                <p class="mt-1 text-sm leading-snug text-slate-500">{!! collect($member->roleLines())->map(fn ($l) => e($l))->implode('<br>') !!}</p>
                <div class="mt-auto flex items-center gap-1 pt-3">
                    <span class="mr-auto text-xs text-slate-400">#{{ $member->sort_order }}@unless ($member->is_published) · masqué @endunless</span>
                    <a href="{{ route('admin.team.edit', $member) }}" class="rounded-lg px-3 py-1.5 text-sm font-medium text-brand hover:bg-brand/5">Modifier</a>
                    <form method="POST" action="{{ route('admin.team.destroy', $member) }}" onsubmit="return confirm('Supprimer définitivement ce membre ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-lg px-3 py-1.5 text-sm font-medium text-red-600 hover:bg-red-50">Supprimer</button>
                    </form>
                </div>
            </div>
        </article>
    @empty
        <p class="text-sm text-slate-500">Aucun membre. Ajoutez-en un pour l’afficher sur le site.</p>
    @endforelse
</div>
@endsection
