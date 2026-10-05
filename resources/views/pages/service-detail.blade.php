@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - ' . $service['name'])

{{-- Footer sits on the same Figma frame fill as the page --}}
@section('footer_bg', 'bg-[#000d26]')

@section('content')

@php
    /*
     * Reproduces the six Figma service frames (486:950 ... 486:1496), laid out at 1886px wide.
     * Desktop measurements use "u" units: --u = 1/1886 of the page width (see home.blade.php).
     * Page data (texts, offsets, images) lives in config/nexora_services.php.
     */
    $img = fn (string $suffix) => asset('assets/img/figma_svc_' . $service['img'] . '_' . $suffix . '.jpg');
@endphp

@include('pages.partials.figma-motion')

<!-- Page background = Figma frame fill (#0158FF at 15%) over black -->
<div class="[container-type:inline-size] [--u:calc(100cqw/1886)] bg-[#000d26] font-inter text-white overflow-hidden">

    <!-- ============================================================ -->
    <!-- HERO -->
    <!-- ============================================================ -->
    @include('pages.partials.services-hero', ['teamPill' => true])

    <!-- ============================================================ -->
    <!-- INTRO: "Nos services" + title + text + "Contactez NEXORA" -->
    <!-- ============================================================ -->
    <section class="relative px-4 sm:px-6 pt-14 lg:px-0 lg:pl-[calc(145*var(--u))] lg:pt-[calc(var(--label)*var(--u))] lg:min-h-[calc(614*var(--u))]"
        style="--label: {{ $service['label'] }}">
        <p class="font-medium text-[#0158ff] leading-[1.21] text-lg lg:text-[max(14px,calc(21*var(--u)))]">Nos services</p>
        <h2 class="mt-4 font-eurostile font-bold uppercase leading-[1.3] text-[23px] sm:text-[32px] lg:leading-[1.8] lg:whitespace-nowrap lg:mt-[calc(var(--gap)*var(--u))] lg:ml-[calc(var(--x)*var(--u))] lg:text-[max(20px,calc(40*var(--u)))]"
            style="--gap: {{ $service['title_gap'] }}; --x: {{ $service['title_x'] }}">{{ $service['title'] }}</h2>

        @foreach ($service['paras'] as [$gap, $text])
            <p class="mt-5 font-medium text-[#888] text-justify leading-[1.21] text-base lg:mt-[calc(var(--gap)*var(--u))] lg:w-[calc(1119*var(--u))] lg:text-[max(13px,calc(20.8*var(--u)))]"
                style="--gap: {{ $gap }}">{{ $text }}</p>
        @endforeach

        <a href="{{ route('contact') }}"
            class="mt-8 inline-flex items-center justify-between gap-4 h-14 rounded-full border border-white pl-6 pr-2 font-medium text-[15px] whitespace-nowrap transition-shadow duration-300 hover:shadow-[0_0_20px_4px_rgba(1,88,255,0.45)] lg:mt-0 lg:absolute lg:left-[calc(1423*var(--u))] lg:top-[calc(463*var(--u))] lg:h-[calc(65*var(--u))] lg:min-w-[calc(301*var(--u))] lg:pl-[calc(28*var(--u))] lg:pr-[calc(7*var(--u))] lg:text-[max(12px,calc(17.2*var(--u)))]">
            Contactez NEXORA
            {{-- Solid blue circle + white flag on every page (the Figma arrow / 50% circle variants were unified on request) --}}
            <span class="flex shrink-0 items-center justify-center w-10 h-10 rounded-full bg-[#0158ff] lg:w-[calc(49*var(--u))] lg:h-[calc(49*var(--u))]">
                <img src="{{ asset('assets/img/figma_home_btn_flag.svg') }}" alt="" class="w-3.5 h-auto rotate-[73.96deg] lg:w-[calc(17.47*var(--u))]">
            </span>
        </a>
    </section>

    <!-- ============================================================ -->
    <!-- MAIN IMAGE -->
    <!-- ============================================================ -->
    <div class="px-4 sm:px-6 mt-10 lg:mt-0 lg:px-0 lg:pl-[calc(154*var(--u))]">
        <div class="relative w-full h-56 sm:h-96 lg:w-[calc(1578*var(--u))] lg:h-[calc(693*var(--u))]">
            <img src="{{ $img('main') }}" alt="{{ $service['name'] }} - NEXORA" class="absolute inset-0 w-full h-full object-cover rounded-3xl lg:rounded-[calc(30*var(--u))]">
            @if ($service['glow'])
                <!-- Figma overlays: red 10% + blue 17% with a blue glow -->
                <span class="absolute inset-0 rounded-3xl bg-[#ff0901]/10 lg:rounded-[calc(30*var(--u))]" aria-hidden="true"></span>
                <span class="absolute inset-0 rounded-3xl bg-[#0158ff]/[0.17] shadow-[0_4px_40px_2px_rgba(1,88,255,0.37)] lg:rounded-[calc(30*var(--u))]" aria-hidden="true"></span>
            @endif
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- DISCUTONS DE VOTRE VISION DIGITAL -->
    <!-- ============================================================ -->
    <section class="px-4 sm:px-6 mt-14 flex flex-col gap-10 lg:flex-row lg:gap-0 lg:px-0 lg:pl-[calc(145*var(--u))] lg:mt-[calc(81*var(--u))]">
        <div class="lg:pt-[calc(13*var(--u))] lg:w-[calc(748*var(--u))] lg:shrink-0">
            <h2 class="font-eurostile font-bold uppercase leading-[1.3] text-[23px] sm:text-[32px] lg:w-[calc(556*var(--u))] lg:text-[max(20px,calc(40*var(--u)))]">DISCUTONS DE VOTRE VISION DIGITAL</h2>
            <p class="mt-5 font-medium text-[#888] text-justify tracking-[0.02em] leading-[1.41] text-base lg:mt-[calc(49*var(--u))] lg:text-[max(13px,calc(21.3*var(--u)))]">
                Pour en savoir plus sur nos services de développement web et mobile ou pour discuter d'un projet spécifique, l'équipe NEXORA est à votre disposition. N'hésitez pas à nous contacter directement ou nous écrire à <a href="mailto:contact@nexora.fr" class="transition-colors hover:text-white">contact@nexora.fr</a> pour découvrir comment notre expertise digitale peut contribuer à la réussite de vos projets.
            </p>
        </div>
        <div class="relative shrink-0 flex items-center justify-center w-full aspect-[686/396] rounded-3xl bg-black lg:block lg:aspect-auto lg:ml-[calc(139*var(--u))] lg:w-[calc(686*var(--u))] lg:h-[calc(396*var(--u))] lg:rounded-[calc(33*var(--u))]">
            <img src="{{ asset('assets/img/figma_svc_logo_nexora.png') }}" alt="NEXORA"
                class="w-[86%] h-auto lg:absolute lg:left-[calc(10*var(--u))] lg:top-[calc(150*var(--u))] lg:w-[calc(649*var(--u))] lg:h-[calc(92*var(--u))]">
        </div>
    </section>

    <div class="mx-4 sm:mx-6 mt-14 h-px bg-[#d9d9d9] lg:mx-0 lg:ml-[calc(145*var(--u))] lg:mt-[calc(77*var(--u))] lg:w-[calc(1573*var(--u))]"></div>

    <!-- ============================================================ -->
    <!-- GALLERY - horizontal scroller (starts with the 2nd image at x=392, as in Figma) -->
    <!-- ============================================================ -->
    <section class="pt-14 pb-16 lg:pt-[calc(112*var(--u))] lg:pb-[calc(100*var(--u))]">
        <div x-data x-init="if (window.matchMedia('(min-width: 1024px)').matches) { const c = $el.querySelectorAll('img'); if (c[1]) $el.scrollLeft = c[1].offsetLeft - c[0].offsetLeft; }"
            class="flex gap-3 overflow-x-auto nx-scroll-hide [scrollbar-width:none] [&::-webkit-scrollbar]:hidden snap-x snap-mandatory px-4 scroll-px-4 lg:gap-[calc(20*var(--u))] lg:px-[calc(392*var(--u))] lg:scroll-px-[calc(392*var(--u))]">
            @foreach (['g1', 'g2', 'g3'] as $i => $g)
                <img src="{{ $img($g) }}" alt="{{ $service['name'] }} - illustration {{ $i + 1 }}" loading="lazy"
                    class="snap-start shrink-0 w-[300px] h-[182px] sm:w-[480px] sm:h-[290px] object-cover rounded-[7px] lg:w-[calc(1008*var(--u))] lg:h-[calc(610*var(--u))] lg:rounded-[calc(7*var(--u))]">
            @endforeach
        </div>
    </section>
</div>

@endsection
