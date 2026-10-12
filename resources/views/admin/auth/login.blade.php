@extends('admin.layout')

@section('title', 'Connexion')

@section('guest')
<div class="relative flex min-h-screen items-center justify-center overflow-hidden bg-brand-navy px-4 py-12">
    <!-- Brand "n" in the background, as on the site heroes -->
    <img src="{{ asset('assets/img/figma_about_hero_mark.svg') }}" alt="" aria-hidden="true" class="pointer-events-none absolute -left-24 top-0 w-[38rem] max-w-none opacity-20">

    <div class="relative w-full max-w-md">
        <div class="mb-8 flex flex-col items-center text-center text-white">
            <img src="{{ asset('assets/img/figma_nav_logo.svg') }}" alt="NEXORA" class="h-16 w-auto">
            <p class="mt-5 font-eurostile text-xl font-bold tracking-wide">ADMINISTRATION</p>
            <p class="mt-2 text-sm text-white/60">Connectez-vous pour mettre à jour le site {{ Site::get('company_name') }}.</p>
        </div>

        <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-5 rounded-2xl bg-white p-8 shadow-2xl">
            @csrf
            @if (session('status'))
                <p class="rounded-xl bg-emerald-50 px-4 py-3 text-sm text-emerald-800" role="status">{{ session('status') }}</p>
            @endif

            <x-admin.field name="email" type="email" label="Nom d’utilisateur (e-mail)" :value="old('email')" required />
            <x-admin.field name="password" type="password" label="Mot de passe" required />

            <label class="flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-slate-300 text-brand focus:ring-brand">
                Rester connecté
            </label>

            <button type="submit" class="w-full rounded-xl bg-brand px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-dark focus:outline-none focus:ring-4 focus:ring-brand/20">
                Se connecter
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-white/50">
            <a href="{{ route('home') }}" class="hover:text-white">← Retour au site</a>
        </p>
    </div>
</div>
@endsection
