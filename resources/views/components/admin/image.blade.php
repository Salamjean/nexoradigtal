{{-- Admin image field: current image preview + file picker with a live preview of the new file. --}}
@props(['name', 'label', 'current' => null, 'help' => 'JPG, PNG ou WebP, 5 Mo maximum.', 'required' => false, 'ratio' => 'aspect-video'])

@php
    $id = 'f-' . str_replace(['[', ']', '.'], '-', $name);
    $errorKey = str_replace(['[', ']'], ['.', ''], $name);
@endphp

<div x-data="{ preview: @js($current), picked: '' }" {{ $attributes->class('space-y-2') }}>
    <span class="block text-sm font-medium text-slate-700">{{ $label }} @if ($required)<span class="text-brand">*</span>@endif</span>
    <label for="{{ $id }}" class="group relative block cursor-pointer overflow-hidden rounded-xl border-2 border-dashed {{ $errors->has($errorKey) ? 'border-red-400' : 'border-slate-300' }} bg-slate-50 {{ $ratio }} transition hover:border-brand">
        <template x-if="preview">
            <img :src="preview" alt="" class="absolute inset-0 h-full w-full object-cover">
        </template>
        <span class="absolute inset-0 flex flex-col items-center justify-center gap-1 text-sm font-medium transition"
            :class="preview ? 'bg-black/45 text-white opacity-0 group-hover:opacity-100' : 'text-slate-500'">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 16V4M7 9l5-5 5 5M4 16v3a1 1 0 001 1h14a1 1 0 001-1v-3"/></svg>
            <span x-text="preview ? 'Changer l’image' : 'Choisir une image'"></span>
        </span>
    </label>
    <input id="{{ $id }}" type="file" name="{{ $name }}" accept="image/jpeg,image/png,image/webp" class="sr-only" @required($required)
        @change="const f = $event.target.files[0]; if (f) { preview = URL.createObjectURL(f); picked = f.name }">
    <p class="text-xs text-slate-500" x-text="picked ? 'Nouvelle image : ' + picked + ' (enregistrez pour l’appliquer)' : @js($help)">{{ $help }}</p>
    @error($errorKey)
        <p class="text-xs font-medium text-red-600">{{ $message }}</p>
    @enderror
</div>
