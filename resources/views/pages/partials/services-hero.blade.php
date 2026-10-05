{{--
    "NOS SERVICES" hero shared by the Services page (496:3850) and the six service pages (486:950...).
    Params: $tabs (array of ['label', 'href', 'active']) - category pills under the subtitle (Services page only),
            $teamPill (bool) - "Découvrez l'équipe derrière NEXORA" pill (service pages only).
    Needs the figma-motion partial for the letter reveal and a parent defining --u.
--}}
<section class="nxh-hero relative overflow-hidden px-4 sm:px-6 pt-52 pb-12 lg:px-0 lg:pb-0 lg:pt-[calc(352*var(--u))] lg:h-[calc(909*var(--u))]">
    <video class="absolute inset-0 w-full h-full object-cover opacity-20 pointer-events-none" autoplay muted loop playsinline preload="auto" aria-hidden="true">
        <source src="{{ asset('assets/video/1107905_1080p_4k_3840x2160.mp4') }}" type="video/mp4">
    </video>

    <!-- Decorative brand mark "n" (top-left) -->
    <img src="{{ asset('assets/img/figma_about_hero_mark.svg') }}" alt="" aria-hidden="true"
        class="pointer-events-none select-none absolute top-0 left-[calc(-175*var(--u))] w-[calc(708*var(--u))] opacity-30">

    <div class="relative lg:pl-[calc(24*var(--u))]">
        <h1 class="font-eurostile font-bold uppercase whitespace-nowrap leading-[0.9] tracking-[calc(-4*var(--u))] text-[calc(120*var(--u))] lg:text-[calc(115*var(--u))]" aria-label="NOS SERVICES">
            {{-- Letters on one line: whitespace between inline-block spans would render as extra spaces --}}
            @foreach (mb_str_split('NOS SERVICES') as $i => $char)<span class="nxh-letter" style="animation-delay: {{ number_format($i * 0.16, 2) }}s" aria-hidden="true">{{ $char === ' ' ? "\u{00A0}" : $char }}</span>@endforeach
        </h1>
        <div class="mt-1 w-28 h-px bg-[#0158ff] lg:mt-0 lg:ml-[calc(10*var(--u))] lg:w-[calc(112*var(--u))]"></div>
        <p class="mt-2.5 max-w-[800px] font-montserrat text-[#666] leading-[1.6] text-base lg:mt-[calc(9*var(--u))] lg:ml-[calc(11*var(--u))] lg:max-w-none lg:w-[calc(800*var(--u))] lg:text-[max(14px,calc(20*var(--u)))]">
            Depuis une décennie, NEXORA DIGITAL SARL accompagne les leaders africains dans leur quête d'excellence technologique.
        </p>

        @if (! empty($tabs))
            <!-- Category tabs: each one opens its service page -->
            <nav aria-label="Catégories de services"
                class="mt-8 flex gap-3 overflow-x-auto nx-scroll-hide [scrollbar-width:none] [&::-webkit-scrollbar]:hidden lg:overflow-visible lg:mt-[calc(41*var(--u))] lg:ml-[calc(7*var(--u))] lg:gap-[calc(12*var(--u))]">
                @foreach ($tabs as $tab)
                    <a href="{{ $tab['href'] }}"
                        class="{{ $tab['active'] ? 'bg-[#1a6bff]' : 'bg-[#111] hover:bg-[#1a6bff]/30' }} shrink-0 rounded-full border border-[#1a6bff] px-[23px] py-[11px] font-manrope font-bold uppercase leading-[1.366] whitespace-nowrap text-[13px] transition-colors duration-200 lg:px-[calc(23*var(--u))] lg:py-[calc(11*var(--u))] lg:text-[max(11px,calc(14*var(--u)))]">
                        {{ $tab['label'] }}
                    </a>
                @endforeach
            </nav>
        @endif
    </div>

    @if ($teamPill ?? false)
        @include('pages.partials.hero-team-pill', ['cookie' => 'figma_about_cookie.svg'])
    @endif
</section>
