{{-- Sticky save bar at the bottom of admin forms. --}}
@props(['label' => 'Enregistrer', 'cancel' => null])

<div class="sticky bottom-0 -mx-5 mt-8 flex items-center justify-end gap-3 border-t border-slate-200 bg-[#f3f5fa]/95 px-5 py-4 backdrop-blur lg:-mx-10 lg:px-10">
    @if ($cancel)
        <a href="{{ $cancel }}" class="rounded-xl px-5 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-200/60">Annuler</a>
    @endif
    <button type="submit" class="rounded-xl bg-brand px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-dark focus:outline-none focus:ring-4 focus:ring-brand/20">
        {{ $label }}
    </button>
</div>
