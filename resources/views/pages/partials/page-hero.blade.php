{{--
    Hero of the "Projets réalisés" (488:1771) and "Contactez l'équipe" (475:915) frames.
    Params: $title (string), $video (file name in assets/video, or null), $titleX (Figma x of the title: 24 or 31),
            $pills (array of ['label', 'href']) - outlined pills at y=655.
    Needs the figma-motion partial for the letter reveal and a parent defining --u.
--}}
<section class="nxh-hero relative overflow-hidden px-4 sm:px-6 pt-52 pb-12 lg:px-0 lg:pb-0 lg:pt-[calc(352*var(--u))] lg:h-[calc(909*var(--u))]">
    @if ($video)
        <video class="absolute inset-0 w-full h-full object-cover opacity-20 pointer-events-none" autoplay muted loop playsinline preload="auto" aria-hidden="true">
            <source src="{{ asset('assets/video/' . $video) }}" type="video/mp4">
        </video>
    @endif

    <!-- Decorative brand mark "n" (top-left) -->
    <img src="{{ asset('assets/img/figma_about_hero_mark.svg') }}" alt="" aria-hidden="true"
        class="pointer-events-none select-none absolute top-0 left-[calc(-175*var(--u))] w-[calc(708*var(--u))] opacity-30">

    <div class="relative lg:pl-[calc(var(--tx)*var(--u))]" style="--tx: {{ $titleX }}">
        <h1 class="font-eurostile font-bold uppercase whitespace-nowrap leading-[0.9] tracking-[calc(-4*var(--u))] text-[calc(105*var(--u))] lg:text-[calc(115*var(--u))]" aria-label="{{ $title }}">
            {{-- Letters on one line: whitespace between inline-block spans would render as extra spaces --}}
            @foreach (mb_str_split($title) as $i => $char)<span class="nxh-letter" style="animation-delay: {{ number_format($i * 0.16, 2) }}s" aria-hidden="true">{{ $char === ' ' ? "\u{00A0}" : $char }}</span>@endforeach
        </h1>
        <div class="mt-1 w-28 h-px bg-[#0158ff] lg:mt-0 lg:ml-[calc((34_-_var(--tx))*var(--u))] lg:w-[calc(112*var(--u))]"></div>
        <p class="mt-2.5 max-w-[800px] font-montserrat text-[#666] leading-[1.6] text-base lg:mt-[calc(9*var(--u))] lg:ml-[calc((35_-_var(--tx))*var(--u))] lg:max-w-none lg:w-[calc(800*var(--u))] lg:text-[max(14px,calc(20*var(--u)))]">
            Depuis une décennie, NEXORA DIGITAL SARL accompagne les leaders africains dans leur quête d'excellence technologique.
        </p>

        @if (! empty($pills))
            <div class="mt-10 flex flex-wrap gap-3 lg:flex-nowrap lg:mt-[calc(127*var(--u))] lg:ml-[calc((34_-_var(--tx))*var(--u))] lg:gap-[calc(21*var(--u))]">
                @foreach ($pills as $pill)
                    <a href="{{ $pill['href'] }}"
                        class="flex items-center justify-center h-14 px-6 rounded-full border border-white font-medium whitespace-nowrap text-base transition-colors duration-300 hover:bg-white hover:text-black lg:h-[calc(82*var(--u))] lg:min-w-[calc(377*var(--u))] lg:px-[calc(36*var(--u))] lg:text-[max(13px,calc(23*var(--u)))]">
                        {{ $pill['label'] }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Cookie button (bottom-left) -->
    <button type="button" aria-label="Gestion des cookies"
        class="relative mt-8 block w-11 h-11 rounded-full transition-transform duration-300 hover:scale-105 lg:mt-0 lg:absolute lg:left-[calc(22*var(--u))] lg:top-[calc(834*var(--u))] lg:w-[calc(56*var(--u))] lg:h-[calc(56*var(--u))]">
        <img src="{{ asset('assets/img/figma_about_cookie.svg') }}" alt="" class="w-full h-full">
    </button>
</section>
