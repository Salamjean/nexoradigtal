@extends('admin.layout')

@section('title', 'Mon compte')
@section('heading', 'Mon compte')

@section('content')
<form method="POST" action="{{ route('admin.account.update') }}" class="max-w-3xl space-y-6">
    @csrf
    @method('PUT')

    <x-admin.card title="Identifiants de connexion">
        <div class="grid gap-5 md:grid-cols-2">
            <x-admin.field name="name" label="Nom affiché" :value="$user->name" required />
            <x-admin.field name="email" type="email" label="Nom d’utilisateur (e-mail)" :value="$user->email" required />
        </div>
    </x-admin.card>

    <x-admin.card title="Changer le mot de passe" description="Laissez vide pour garder le mot de passe actuel. 8 caractères minimum.">
        <div class="grid gap-5 md:grid-cols-2">
            <x-admin.field name="password" type="password" label="Nouveau mot de passe" />
            <x-admin.field name="password_confirmation" type="password" label="Confirmer le nouveau mot de passe" />
        </div>
    </x-admin.card>

    <x-admin.card title="Confirmation" description="Saisissez votre mot de passe actuel pour enregistrer ces modifications.">
        <x-admin.field name="current_password" type="password" label="Mot de passe actuel" required class="max-w-sm" />
    </x-admin.card>

    <x-admin.submit />
</form>
@endsection
