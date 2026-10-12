{{-- Admin section card with a title and an optional description. --}}
@props(['title' => null, 'description' => null])

<section {{ $attributes->class('rounded-2xl border border-slate-200 bg-white p-6 shadow-sm lg:p-8') }}>
    @if ($title)
        <header class="mb-6">
            <h2 class="text-base font-semibold text-slate-900">{{ $title }}</h2>
            @if ($description)
                <p class="mt-1 text-sm text-slate-500">{{ $description }}</p>
            @endif
        </header>
    @endif
    {{ $slot }}
</section>
