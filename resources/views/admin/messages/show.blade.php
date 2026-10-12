@extends('admin.layout')

@section('title', 'Message de ' . $message->name)
@section('heading', 'Message de ' . $message->name)

@section('content')
<a href="{{ route('admin.messages.index') }}" class="mb-6 inline-block text-sm text-slate-500 hover:text-brand">← Tous les messages</a>

<div class="grid gap-6 xl:grid-cols-[1fr_22rem]">
    <x-admin.card :title="$message->subject ?: '(sans sujet)'" :description="$message->typeLabel() . ' · reçu le ' . $message->created_at->format('d/m/Y à H:i')">
        <div class="whitespace-pre-line text-sm leading-relaxed text-slate-700">{{ $message->message ?: 'Aucun message saisi.' }}</div>
    </x-admin.card>

    <x-admin.card title="Expéditeur">
        <dl class="space-y-4 text-sm">
            <div><dt class="text-slate-500">Nom</dt><dd class="font-medium text-slate-900">{{ $message->name }}</dd></div>
            <div><dt class="text-slate-500">E-mail</dt><dd><a href="mailto:{{ $message->email }}" class="font-medium text-brand hover:underline">{{ $message->email }}</a></dd></div>
            @if ($message->phone)
                <div><dt class="text-slate-500">Portable</dt><dd><a href="tel:{{ preg_replace('/[^\d+]/', '', $message->phone) }}" class="font-medium text-brand hover:underline">{{ $message->phone }}</a></dd></div>
            @endif
            @if ($message->skills)
                <div><dt class="text-slate-500">Compétences commerciales</dt><dd class="text-slate-900">{{ $message->skills }}</dd></div>
            @endif
            @if ($message->experience)
                <div><dt class="text-slate-500">Années d’expérience</dt><dd class="text-slate-900">{{ $message->experience }}</dd></div>
            @endif
            @if ($message->cv_path)
                <div><dt class="text-slate-500">CV</dt><dd><a href="{{ route('admin.messages.cv', $message) }}" class="font-medium text-brand hover:underline">Télécharger le CV</a></dd></div>
            @endif
        </dl>

        <div class="mt-6 flex flex-wrap gap-2 border-t border-slate-100 pt-5">
            <a href="mailto:{{ $message->email }}?subject={{ rawurlencode('Re: ' . ($message->subject ?: 'Votre message')) }}" class="rounded-xl bg-brand px-4 py-2 text-sm font-semibold text-white hover:bg-brand-dark">Répondre</a>
            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Supprimer définitivement ce message ?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-xl px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50">Supprimer</button>
            </form>
        </div>
    </x-admin.card>
</div>
@endsection
