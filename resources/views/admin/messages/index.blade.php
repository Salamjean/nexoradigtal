@extends('admin.layout')

@section('title', 'Messages')
@section('heading', 'Messages reçus')

@section('content')
@php
    $filters = ['' => 'Tous'] + \App\Models\ContactMessage::TYPES;
@endphp

<div class="mb-6 flex flex-wrap gap-2">
    @foreach ($filters as $key => $label)
        <a href="{{ route('admin.messages.index', $key ? ['type' => $key] : []) }}"
            class="rounded-full px-4 py-2 text-sm font-medium {{ ($type ?? '') === $key ? 'bg-brand text-white' : 'bg-white text-slate-600 border border-slate-200 hover:border-brand' }}">{{ $label }}</a>
    @endforeach
</div>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    @forelse ($messages as $message)
        <a href="{{ route('admin.messages.show', $message) }}" class="flex items-start gap-4 border-b border-slate-100 px-5 py-4 last:border-0 hover:bg-slate-50">
            <span class="mt-2 h-2 w-2 shrink-0 rounded-full {{ $message->read_at ? 'bg-transparent' : 'bg-brand' }}" aria-hidden="true"></span>
            <span class="min-w-0 flex-1">
                <span class="flex flex-wrap items-baseline gap-x-3">
                    <span class="text-sm {{ $message->read_at ? 'text-slate-700' : 'font-semibold text-slate-900' }}">{{ $message->name }}</span>
                    <span class="text-sm text-slate-400">{{ $message->email }}</span>
                </span>
                <span class="mt-0.5 block truncate text-sm text-slate-500">{{ $message->subject ?: \Illuminate\Support\Str::limit($message->message, 90) ?: '(sans message)' }}</span>
            </span>
            <span class="shrink-0 text-right">
                <span class="block text-xs text-slate-400">{{ $message->created_at->format('d/m/Y H:i') }}</span>
                <span class="mt-1 inline-block rounded-full px-2.5 py-0.5 text-xs font-medium {{ $message->type === 'carrieres' ? 'bg-amber-50 text-amber-700' : 'bg-brand/10 text-brand' }}">{{ $message->typeLabel() }}</span>
            </span>
        </a>
    @empty
        <p class="p-6 text-sm text-slate-500">Aucun message pour le moment.</p>
    @endforelse
</div>

<div class="mt-6">{{ $messages->links() }}</div>
@endsection
