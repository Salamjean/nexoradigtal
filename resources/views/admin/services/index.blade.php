@extends('admin.layout')

@section('title', 'Services')
@section('heading', 'Services')

@section('content')
<p class="mb-6 max-w-3xl text-sm text-slate-500">
    Les 6 services du site. Chacun a un bloc sur la page « Nos services » et sa propre page détaillée.
    Leur nombre et leur mise en page suivent la maquette : vous pouvez modifier les textes et les images.
</p>

<div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
    @foreach ($pages as $page)
        <article class="flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <img src="{{ $page->imageUrl() }}" alt="" class="aspect-[16/7] w-full object-cover">
            <div class="flex flex-1 flex-col p-5">
                <span class="self-start rounded-full bg-brand/10 px-3 py-1 text-xs font-semibold uppercase text-brand">{{ $page->tab_label }}</span>
                <h2 class="mt-3 font-semibold text-slate-900">{{ $page->name }}</h2>
                <p class="mt-1 line-clamp-2 text-sm text-slate-500">{{ $page->para1 }}</p>
                <div class="mt-5 flex items-center gap-2 pt-1">
                    <a href="{{ route('admin.services.edit', $page) }}" class="rounded-xl bg-brand px-4 py-2 text-sm font-semibold text-white hover:bg-brand-dark">Modifier</a>
                    <a href="{{ route('service.show', $page->slug) }}" target="_blank" class="rounded-xl px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100">Voir la page</a>
                </div>
            </div>
        </article>
    @endforeach
</div>
@endsection
