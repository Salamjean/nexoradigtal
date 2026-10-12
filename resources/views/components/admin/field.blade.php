{{-- Admin form field: text input or textarea (rows > 0) with label, help text and validation error. --}}
@props(['name', 'label', 'value' => null, 'type' => 'text', 'rows' => 0, 'help' => null, 'required' => false])

@php
    $id = 'f-' . str_replace(['[', ']', '.'], '-', $name);
    $current = old(str_replace(['[', ']'], ['.', ''], $name), $value);
    $hasError = $errors->has($name);
@endphp

<div {{ $attributes->class('space-y-1.5') }}>
    <label for="{{ $id }}" class="block text-sm font-medium text-slate-700">
        {{ $label }} @if ($required)<span class="text-brand">*</span>@endif
    </label>
    @if ($rows > 0)
        <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}" @required($required)
            class="block w-full rounded-xl border bg-white px-4 py-3 text-sm leading-relaxed shadow-sm outline-none transition focus:border-brand focus:ring-4 focus:ring-brand/10 {{ $hasError ? 'border-red-400' : 'border-slate-300' }}">{{ $current }}</textarea>
    @else
        <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" value="{{ $current }}" @required($required)
            class="block w-full rounded-xl border bg-white px-4 py-2.5 text-sm shadow-sm outline-none transition focus:border-brand focus:ring-4 focus:ring-brand/10 {{ $hasError ? 'border-red-400' : 'border-slate-300' }}">
    @endif
    @if ($help)
        <p class="text-xs text-slate-500">{{ $help }}</p>
    @endif
    @error($name)
        <p class="text-xs font-medium text-red-600">{{ $message }}</p>
    @enderror
</div>
