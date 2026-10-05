@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - Accueil')

@section('content')

@php
    /*
     * The page reproduces the Figma frame "R" (758:1160), laid out at 1886px wide.
     * On desktop every Figma measurement is expressed in "u" units: --u = 1/1886 of the page width,
     * so `calc(115*var(--u))` is exactly 115px at 1886px and scales proportionally on other screens.
     */
    $services = [
        ['img' => 'figma_home_chip_conseil.png', 'cat' => 'Conseil & Audit', 'l1' => 'ERP & logiciels', 'l2' => 'métiers sur mesure'],
        ['img' => 'figma_home_chip_solutions.png', 'cat' => 'Solutions digitales', 'l1' => 'Plateformes web', 'l2' => '& mobile'],
        ['img' => 'figma_home_chip_erp.png', 'cat' => 'ERP & Logiciels', 'l1' => 'Leader en', 'l2' => 'transformation digitale'],
        ['img' => 'figma_home_chip_transformation.png', 'cat' => 'Transformation', 'l1' => 'Notre histoire et', 'l2' => 'notre vision'],
        ['img' => 'figma_home_chip_apropos.png', 'cat' => 'À propos', 'l1' => 'Audit SI &', 'l2' => 'stratégie digitale'],
    ];

    // Rolling counters: each column scrolls through these values (Figma "counter_*" nodes)
    $stats = [
        ['values' => array_merge(range(0, 9), ['10+']), 'label' => "Ans d'Expertise", 'col' => 'lg:w-[calc(403*var(--u))]'],
        ['values' => array_merge(range(0, 190, 10), ['200+']), 'label' => 'Projets Livrés', 'col' => 'lg:w-[calc(394*var(--u))]'],
        ['values' => array_merge([''], range(4, 76, 4), ['80+']), 'label' => 'Clients', 'col' => 'lg:w-[calc(348*var(--u))]'],
        ['values' => range(0, 5), 'label' => 'Secteurs', 'col' => ''],
    ];

    $techs = ['ORACLE', 'MICROSOFT', 'SAP', 'IBM', 'CISCO', 'HUAWEI', 'AWS', 'GOOGLE'];

    // One marquee set = 808px in Figma (logo widths + gaps)
    $logos = [
        ['file' => 'figma_home_logo_voa.png', 'alt' => 'VOA', 'cls' => 'w-[104px] h-10 mr-6 lg:w-[calc(207*var(--u))] lg:h-[calc(79*var(--u))] lg:mr-[calc(50*var(--u))]'],
        ['file' => 'figma_home_logo_dinor.png', 'alt' => 'Dinor', 'cls' => 'w-[79px] h-10 mr-2 lg:w-[calc(157*var(--u))] lg:h-[calc(79*var(--u))] lg:mr-[calc(17*var(--u))]'],
        ['file' => 'figma_home_logo_ci_export.png', 'alt' => "Côte d'Ivoire Export", 'cls' => 'w-[79px] h-[35px] mt-0.5 mr-9 lg:w-[calc(157*var(--u))] lg:h-[calc(70*var(--u))] lg:mt-[calc(3*var(--u))] lg:mr-[calc(71*var(--u))]'],
        ['file' => 'figma_home_logo_maggi.png', 'alt' => 'Maggi', 'cls' => 'w-[56px] h-10 mr-5 lg:w-[calc(111*var(--u))] lg:h-[calc(79*var(--u))] lg:mr-[calc(38*var(--u))]'],
    ];
@endphp

@include('pages.partials.figma-motion')

<style>
    /* Rolling counters (2s ease-out, as in Figma) */
    .nxh-count-col { transition: transform 2s ease-out; }
    .nxh-stats.is-counted .nxh-count-col { transform: translateY(calc(var(--rows) * -1.2em)); }

    /* Partner logos: one 808px set every 12s; gallery drifts right by one set every 35s */
    .nxh-logos { animation: nxh-logos 12s linear infinite; }
    @keyframes nxh-logos { to { transform: translateX(-25%); } }
    .nxh-gallery { animation: nxh-gallery 35s linear infinite; }
    @keyframes nxh-gallery { from { transform: translateX(-50%); } to { transform: translateX(0); } }

    @media (prefers-reduced-motion: reduce) {
        .nxh-logos, .nxh-gallery { animation: none; }
        .nxh-count-col { transition: none; }
    }
</style>

<!-- Page background = Figma frame fill (#0158FF at 6%) over black -->
<div class="[container-type:inline-size] [--u:calc(100cqw/1886)] bg-[#00050f] font-inter text-white overflow-hidden">

    <!-- ============================================================ -->
    <!-- HERO -->
    <!-- ============================================================ -->
    <section class="nxh-hero relative overflow-hidden px-4 sm:px-6 pt-52 pb-12 lg:p-0 lg:h-[calc(909*var(--u))]">
        <video class="absolute inset-0 w-full h-full object-cover opacity-20 pointer-events-none" autoplay muted loop playsinline preload="auto" aria-hidden="true">
            <source src="{{ asset('assets/video/6036858_Office_People_3840x2160.mp4') }}" type="video/mp4">
        </video>

        <!-- Decorative brand mark "n" (top-left) -->
        <img src="{{ asset('assets/img/figma_home_hero_mark.svg') }}" alt="" aria-hidden="true"
            class="pointer-events-none select-none absolute top-0 left-[calc(-175*var(--u))] w-[calc(708*var(--u))] opacity-30">

        <h1 class="relative text-center font-eurostile font-bold uppercase whitespace-nowrap leading-[0.9] text-[calc(100*var(--u))] lg:absolute lg:inset-x-0 lg:top-[calc(352*var(--u))] lg:text-[calc(115*var(--u))]" aria-label="NEXORA DIGITAL SARL">
            {{-- Letters on one line: whitespace between inline-block spans would render as extra spaces --}}
            @foreach (mb_str_split('NEXORA DIGITAL SARL') as $i => $char)<span class="nxh-letter" style="animation-delay: {{ number_format($i * 0.16, 2) }}s" aria-hidden="true">{{ $char === ' ' ? "\u{00A0}" : $char }}</span>@endforeach
        </h1>

        @include('pages.partials.hero-team-pill', ['cookie' => 'figma_home_cookie.svg'])

        <!-- Latest projects card: the project images slide by every 4s (paused on hover), with counter and progress bar -->
        @php
            $heroProjects = [
                ['title' => 'Plateau-Apps', 'img' => 'figma_hero_card_bg.png', 'phone' => true],
                ['title' => 'Portail e-Service DGBF', 'img' => 'figma_proj_dgbf.jpg'],
                ['title' => 'ERP Groupe SIFCA', 'img' => 'figma_proj_sifca.jpg'],
                ['title' => 'Plateforme RH Bolloré', 'img' => 'figma_proj_bollore.jpg'],
            ];
        @endphp
        <div x-data="{
                i: 0, n: {{ count($heroProjects) }}, timer: null,
                start() { if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return; this.stop(); this.timer = setInterval(() => this.i = (this.i + 1) % this.n, 4000); },
                stop() { clearInterval(this.timer); },
            }" x-init="start()" @mouseenter="stop()" @mouseleave="start()"
            class="relative mt-8 flex flex-col sm:flex-row gap-4 rounded-2xl bg-white p-2 text-black lg:mt-0 lg:block lg:absolute lg:left-[calc(1055*var(--u))] lg:top-[calc(558*var(--u))] lg:w-[calc(807*var(--u))] lg:h-[calc(317*var(--u))] lg:rounded-[calc(16*var(--u))] lg:p-[calc(8*var(--u))]">
            <a href="{{ route('project') }}" class="relative block shrink-0 overflow-hidden rounded-xl aspect-[411/300] sm:w-1/2 lg:w-[calc(411*var(--u))] lg:rounded-[calc(11*var(--u))]" aria-label="Voir nos projets">
                <div class="absolute inset-0 flex transition-transform duration-700 ease-[cubic-bezier(0.65,0,0.35,1)]" :style="`transform: translateX(-${i * 100}%)`">
                    @foreach ($heroProjects as $project)
                        <div class="relative shrink-0 w-full h-full">
                            <img src="{{ asset('assets/img/' . $project['img']) }}" alt="{{ $project['title'] }}" class="absolute inset-0 w-full h-full object-cover" @if (! $loop->first) loading="lazy" @endif>
                            @if ($project['phone'] ?? false)
                                <img src="{{ asset('assets/img/figma_home_hero_phone.png') }}" alt="" class="absolute left-[17.83%] top-[22.5%] w-[58.38%] h-auto">
                            @endif
                        </div>
                    @endforeach
                </div>
            </a>
            <div class="flex flex-col px-2 pb-2 lg:contents">
                <p class="font-montserrat leading-[0.9] text-sm lg:absolute lg:left-[calc(449*var(--u))] lg:top-[calc(37*var(--u))] lg:text-[max(10px,calc(14*var(--u)))]">Derniers projets</p>
                {{-- All titles share one grid cell (the box fits the longest) and cross-fade --}}
                <div class="mt-3 grid font-montserrat font-medium leading-[0.9] text-2xl lg:mt-0 lg:absolute lg:left-[calc(451*var(--u))] lg:top-[calc(74*var(--u))] lg:w-[calc(330*var(--u))] lg:text-[calc(28*var(--u))]">
                    @foreach ($heroProjects as $k => $project)
                        <p class="[grid-area:1/1] transition-opacity duration-500" @if ($k > 0) style="opacity: 0" @endif :style="{ opacity: i === {{ $k }} ? 1 : 0 }" :aria-hidden="(i !== {{ $k }}).toString()">{{ $project['title'] }}</p>
                    @endforeach
                </div>
                <p class="mt-auto pt-6 font-montserrat font-medium leading-[0.9] text-base lg:pt-0 lg:absolute lg:left-[calc(452*var(--u))] lg:top-[calc(267*var(--u))] lg:text-[max(11px,calc(16*var(--u)))]" x-text="`${i + 1}/${n}`">1/{{ count($heroProjects) }}</p>
                <div class="mt-2 h-1.5 w-full overflow-hidden rounded-[2.5px] bg-[#d9d9d9] lg:mt-0 lg:absolute lg:left-[calc(450*var(--u))] lg:top-[calc(294*var(--u))] lg:w-[calc(331*var(--u))] lg:h-[calc(6*var(--u))]">
                    <div class="h-full rounded-[2.5px] bg-[#0158ff] transition-[width] duration-700" style="width: {{ 100 / count($heroProjects) }}%" :style="`width: ${(i + 1) / n * 100}%`"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- PARTENAIRE + CHIFFRES (#0158FF at 20%) -->
    <!-- ============================================================ -->
    <section class="relative bg-[#0158ff]/20 px-4 sm:px-6 py-16 lg:px-0 lg:pt-[calc(91*var(--u))] lg:pb-[calc(116*var(--u))]">
        <div class="lg:flex lg:pl-[calc(154*var(--u))]">
            <h2 class="font-eurostile font-bold uppercase leading-[1.8] text-[22px] lg:mt-[calc(29*var(--u))] lg:w-[calc(623*var(--u))] lg:shrink-0 lg:whitespace-nowrap lg:text-[max(16px,calc(30*var(--u)))]">
                VOTRE PARTENAIRE EN <br class="hidden lg:inline">TRANSFORMATION DIGITALE <br class="hidden lg:inline">&amp; INNOVANTES POUR VOTRE <br class="hidden lg:inline">ORGANISATION.
            </h2>
            <div class="mt-8 lg:mt-0 lg:ml-[calc(220*var(--u))] lg:w-[calc(709*var(--u))]">
                <p class="font-montserrat font-light text-[#888] text-justify leading-[1.5] text-base lg:text-[max(13px,calc(21*var(--u)))]">
                    NEXORA DIGITAL SARL est votre partenaire de référence en solutions numériques et en transformation digitale. Nous accompagnons les entreprises et organisations dans leur évolution numérique avec des solutions adaptées, innovantes et performantes. Chez NEXORA, nos experts qualifiés garantissent des résultats concrets et durables.
                </p>
                <div class="mt-8 flex flex-wrap gap-4 2xl:flex-nowrap lg:mt-[calc(47*var(--u))] lg:-ml-[calc(2*var(--u))] lg:gap-[calc(29*var(--u))]">
                    <a href="{{ route('service') }}" class="flex items-center justify-between gap-4 h-14 rounded-full border-2 border-white pl-6 pr-2 font-medium text-[15px] whitespace-nowrap transition-shadow duration-300 hover:shadow-[0_0_20px_4px_rgba(1,88,255,0.45)] lg:h-[calc(65*var(--u))] lg:min-w-[calc(320*var(--u))] lg:pl-[calc(33*var(--u))] lg:pr-[calc(8*var(--u))] lg:text-[max(12px,calc(17*var(--u)))]">
                        Découvrez nos services
                        <span class="relative flex shrink-0 items-center justify-center w-10 h-10 lg:w-[calc(49*var(--u))] lg:h-[calc(49*var(--u))]">
                            <img src="{{ asset('assets/img/figma_home_dot_blue.svg') }}" alt="" class="absolute inset-0 w-full h-full">
                            <img src="{{ asset('assets/img/figma_home_btn_flag.svg') }}" alt="" class="relative w-3.5 h-auto rotate-[73.96deg] lg:w-[calc(17.47*var(--u))]">
                        </span>
                    </a>
                    <a href="#" class="flex items-center justify-between gap-4 h-14 rounded-full border-2 border-white pl-6 pr-2 font-medium text-[15px] whitespace-nowrap transition-shadow duration-300 hover:shadow-[0_0_20px_4px_rgba(1,88,255,0.45)] lg:h-[calc(65*var(--u))] lg:min-w-[calc(362*var(--u))] lg:pl-[calc(34*var(--u))] lg:pr-[calc(8*var(--u))] lg:text-[max(12px,calc(17*var(--u)))]">
                        Regardez notre vidéo complète
                        <span class="relative flex shrink-0 items-center justify-center w-10 h-10 lg:w-[calc(49*var(--u))] lg:h-[calc(49*var(--u))]">
                            <img src="{{ asset('assets/img/figma_home_dot_blue.svg') }}" alt="" class="absolute inset-0 w-full h-full">
                            <img src="{{ asset('assets/img/figma_home_btn_flag.svg') }}" alt="" class="relative w-3.5 h-auto rotate-[73.96deg] lg:w-[calc(17.47*var(--u))]">
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Divider + LinkedIn square -->
        <div class="relative mt-16 lg:mt-[calc(103*var(--u))] lg:ml-[calc(152*var(--u))] lg:w-[calc(1583*var(--u))]">
            <div class="h-px w-full bg-[#d9d9d9]"></div>
            <a href="#" aria-label="LinkedIn NEXORA"
                class="absolute -right-1 -top-6 flex items-start w-12 h-12 bg-[#0158ff] pl-2.5 pt-2 font-montserrat font-bold leading-[0.9] text-2xl transition-transform duration-300 hover:scale-105 lg:right-auto lg:left-[calc(1609*var(--u))] lg:top-[calc(-43*var(--u))] lg:w-[calc(89*var(--u))] lg:h-[calc(88*var(--u))] lg:pl-[calc(22*var(--u))] lg:pt-[calc(22*var(--u))] lg:text-[calc(50*var(--u))]">
                in
            </a>
        </div>

        <!-- Stats (rolling counters) -->
        <div class="nxh-stats mt-14 grid grid-cols-2 gap-y-10 lg:mt-[calc(118*var(--u))] lg:ml-[calc(309*var(--u))] lg:flex lg:gap-0">
            @foreach ($stats as $stat)
                <div class="{{ $stat['col'] }}">
                    <div class="h-[1.2em] overflow-hidden font-stat font-black leading-[1.2] text-[32px] lg:text-[calc(40*var(--u))]" aria-label="{{ end($stat['values']) }}">
                        <div class="nxh-count-col" style="--rows: {{ count($stat['values']) - 1 }}" aria-hidden="true">
                            @foreach ($stat['values'] as $value)
                                <div class="h-[1.2em]">{{ $value }}</div>
                            @endforeach
                        </div>
                    </div>
                    <p class="mt-1 font-manrope font-bold uppercase text-[#1a6bff] text-xs">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- SERVICES - Horizontal scroller -->
    <!-- ============================================================ -->
    <section class="pt-6 pb-8 lg:pt-[calc(26*var(--u))] lg:pb-[calc(32*var(--u))]">
        <div class="flex gap-3 overflow-x-auto nx-scroll-hide [scrollbar-width:none] [&::-webkit-scrollbar]:hidden snap-x snap-mandatory px-4 lg:px-0 lg:gap-[calc(9*var(--u))]">
            @foreach ($services as $service)
                <article class="snap-start shrink-0 flex flex-col w-[300px] rounded-3xl bg-[#0158ff]/[0.31] p-6 lg:w-[calc(448*var(--u))] lg:h-[calc(424*var(--u))] lg:rounded-[calc(24*var(--u))] lg:p-[calc(30*var(--u))]">
                    <img src="{{ asset('assets/img/' . $service['img']) }}" alt="{{ $service['cat'] }}" class="w-28 h-28 rounded-full lg:w-[calc(141*var(--u))] lg:h-[calc(141*var(--u))]">
                    <p class="mt-8 font-montserrat font-medium leading-[0.9] text-[13px] lg:mt-[calc(46*var(--u))] lg:text-[max(10px,calc(13.2*var(--u)))]">{{ $service['cat'] }}</p>
                    <h3 class="mt-4 font-montserrat font-medium leading-[1.207] text-2xl lg:mt-[calc(18*var(--u))] lg:text-[calc(29*var(--u))]">{{ $service['l1'] }}<br>{{ $service['l2'] }}</h3>
                    <a href="{{ route('service') }}" class="mt-6 flex items-center h-12 rounded-full border border-[#0158ff] pr-1.5 font-medium text-[13px] transition-colors duration-300 hover:bg-[#0158ff]/20 lg:mt-[calc(25*var(--u))] lg:h-[calc(52*var(--u))] lg:w-[calc(388*var(--u))] lg:pr-[calc(6*var(--u))] lg:text-[max(10px,calc(13*var(--u)))]">
                        <span class="flex-1 text-center">Découvrez- en plus</span>
                        <span class="relative flex shrink-0 items-center justify-center w-9 h-9 lg:w-[calc(39*var(--u))] lg:h-[calc(39*var(--u))]">
                            <img src="{{ asset('assets/img/figma_home_dot_blue.svg') }}" alt="" class="absolute inset-0 w-full h-full">
                            <img src="{{ asset('assets/img/figma_home_btn_flag.svg') }}" alt="" class="relative w-3.5 h-auto rotate-[73.96deg] lg:w-[calc(17.47*var(--u))]">
                        </span>
                    </a>
                </article>
            @endforeach
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- VOS PROJETS + PANNEAUX + LOGOS + GALERIE (white) -->
    <!-- ============================================================ -->
    <section class="relative bg-white text-black pt-16 lg:pt-[calc(158*var(--u))]">
        <img src="{{ asset('assets/img/figma_home_flag_gradient.svg') }}" alt="" aria-hidden="true"
            class="pointer-events-none select-none absolute left-[calc(674*var(--u))] top-[calc(23*var(--u))] w-[calc(581*var(--u))] h-auto">

        <div class="relative px-4 text-center">
            <p class="font-medium text-sm lg:text-[max(12px,calc(16*var(--u)))]">Des années d'expertise digitale au service de vos projets.</p>
            <h2 class="mt-4 leading-[1.1667] text-3xl lg:mt-[calc(22*var(--u))] lg:text-[calc(48*var(--u))]">
                Vos projets <span class="text-[#0158ff]">Exigez le meilleur.</span><br>Nous les livrons.
            </h2>
        </div>

        <!-- Technologies (static row, partially off-screen like in Figma) -->
        <div class="relative mt-10 flex w-max gap-3 -ml-16 lg:mt-[calc(47*var(--u))] lg:gap-[calc(24*var(--u))] lg:-ml-[calc(240*var(--u))]">
            @foreach ($techs as $tech)
                <span class="flex shrink-0 items-center h-14 w-40 rounded-full bg-[#0158ff] pl-6 font-medium text-white text-lg lg:h-[calc(79*var(--u))] lg:w-[calc(277*var(--u))] lg:pl-[calc(68*var(--u))] lg:text-[calc(28*var(--u))]">{{ $tech }}</span>
            @endforeach
        </div>

        <!-- ===== Panel A: text left (blue) / photo right with card ===== -->
        <div class="relative mt-16 mx-4 overflow-hidden rounded-3xl flex flex-col lg:block lg:mt-[calc(119*var(--u))] lg:mx-0 lg:ml-[calc(57*var(--u))] lg:w-[calc(1784*var(--u))] lg:min-h-[calc(893*var(--u))] lg:rounded-[calc(27*var(--u))]">
            <img src="{{ asset('assets/img/figma_feature_panel_1.png') }}" alt="Experts NEXORA au travail" class="hidden lg:block absolute inset-0 w-full h-full object-cover">

            <div class="relative bg-[#253a90] text-white p-6 sm:p-10 lg:w-1/2 lg:min-h-[calc(893*var(--u))] lg:pl-[calc(72*var(--u))] lg:pt-[calc(95*var(--u))] lg:pb-[calc(60*var(--u))] lg:pr-0">
                <img src="{{ asset('assets/img/figma_home_deco_panel_a.svg') }}" alt="" aria-hidden="true"
                    class="pointer-events-none select-none absolute left-[calc(476*var(--u))] top-[calc(466*var(--u))] w-[calc(416*var(--u))] h-auto">
                <div class="relative lg:w-[calc(630*var(--u))]">
                    <p class="leading-[1.21] text-lg lg:text-[max(14px,calc(21*var(--u)))]">Services</p>
                    <h2 class="mt-6 font-eurostile font-bold uppercase leading-[1.8] text-[22px] lg:mt-[calc(44*var(--u))] lg:whitespace-nowrap lg:text-[max(16px,calc(30*var(--u)))]">
                        DES EXPERTS QUALIFIES AU <br class="hidden lg:inline">SERVICE DE VOTRE TRANS- <br class="hidden lg:inline">FORMATION DIGITALE ET DE <br class="hidden lg:inline">VOS PROJETS INNOVANT.
                    </h2>
                    <p class="mt-8 font-light text-[#888] text-justify leading-[1.571] text-base lg:mt-[calc(84*var(--u))] lg:text-[max(13px,calc(21*var(--u)))]">
                        NEXORA est votre partenaire spécialisé dans les solutions digitales de A à Z. Nous maîtrisons une gamme complète de technologies avancées, notamment le développement web &amp; mobile, l'intégration ERP, l'automatisation des processus, la digitalisation des organisations et le conseil en stratégie digitale.
                    </p>
                    <a href="{{ route('service') }}" class="mt-8 inline-flex items-center justify-between gap-4 h-14 rounded-full border border-[#0158ff] pl-6 pr-2 py-1 max-w-full font-medium text-sm lg:py-0 lg:whitespace-nowrap transition-shadow duration-300 hover:shadow-[0_0_20px_4px_rgba(1,88,255,0.45)] lg:mt-[calc(68*var(--u))] lg:h-[calc(63*var(--u))] lg:min-w-[calc(295*var(--u))] lg:pl-[calc(30*var(--u))] lg:pr-[calc(8*var(--u))] lg:text-[max(11px,calc(14*var(--u)))]">
                        Découvrez- en nos services
                        <span class="relative flex shrink-0 items-center justify-center w-10 h-10 lg:w-[calc(47*var(--u))] lg:h-[calc(47*var(--u))]">
                            <img src="{{ asset('assets/img/figma_home_dot_blue.svg') }}" alt="" class="absolute inset-0 w-full h-full">
                            <img src="{{ asset('assets/img/figma_home_btn_flag.svg') }}" alt="" class="relative w-3.5 h-auto rotate-[73.96deg] lg:w-[calc(17.47*var(--u))]">
                        </span>
                    </a>
                </div>
            </div>

            <div class="relative p-6 sm:p-10 lg:p-0 lg:absolute lg:inset-y-0 lg:left-1/2 lg:right-0">
                <img src="{{ asset('assets/img/figma_feature_panel_1.png') }}" alt="" aria-hidden="true" class="lg:hidden absolute inset-0 w-full h-full object-cover object-right">
                <div class="relative bg-white text-black rounded-[32px] p-6 lg:absolute lg:left-[calc(186*var(--u))] lg:top-[calc(215*var(--u))] lg:flex lg:flex-col lg:w-[calc(521*var(--u))] lg:min-h-[calc(465*var(--u))] lg:rounded-[calc(32*var(--u))] lg:pt-[calc(76*var(--u))] lg:px-0 lg:pb-[calc(11*var(--u))]">
                    <p class="text-center font-montserrat text-[#0158ff] leading-[1.21] text-base lg:text-[max(12px,calc(17*var(--u)))]">Nos services</p>
                    <h3 class="mt-4 font-eurostile font-bold leading-[1.8] text-base lg:mt-[calc(25*var(--u))] lg:mx-[calc(65*var(--u))] lg:text-[max(11px,calc(18*var(--u)))]">PLATEFFORMES WEB &amp; MOBILS</h3>
                    <p class="mt-4 font-montserrat font-light text-justify leading-[1.647] text-[15px] lg:mt-[calc(28*var(--u))] lg:ml-[calc(65*var(--u))] lg:w-[calc(398*var(--u))] lg:text-[max(11px,calc(17*var(--u)))]">
                        Nous développons des applications web et mobile sur mesure, performantes et adaptées à vos besoins métiers, avec une expérience utilisateur optimale et une sécurité renforcée.
                    </p>
                    <p class="mt-8 font-montserrat font-medium leading-[0.9] text-base lg:mt-auto lg:pt-[calc(24*var(--u))] lg:ml-[calc(23*var(--u))] lg:text-[max(11px,calc(16*var(--u)))]">1/5</p>
                    <div class="mt-2 h-1.5 overflow-hidden rounded-[2.5px] bg-[#d9d9d9] lg:mt-[calc(9.6*var(--u))] lg:ml-[calc(22*var(--u))] lg:w-[calc(476*var(--u))] lg:h-[calc(6*var(--u))]">
                        <div class="h-full w-[23.3%] rounded-[2.5px] bg-[#0158ff]"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Panel B: photo left with card / text right (blue) ===== -->
        <div class="relative mt-6 mx-4 overflow-hidden rounded-3xl flex flex-col-reverse lg:block lg:mt-[calc(29*var(--u))] lg:mx-0 lg:ml-[calc(59*var(--u))] lg:w-[calc(1784*var(--u))] lg:min-h-[calc(893*var(--u))] lg:rounded-[calc(27*var(--u))]">
            <img src="{{ asset('assets/img/figma_feature_panel_2.png') }}" alt="Transformation digitale NEXORA" class="hidden lg:block absolute inset-0 w-full h-full object-cover">

            <div class="relative bg-[#253a90] text-white p-6 sm:p-10 lg:ml-[50%] lg:w-1/2 lg:min-h-[calc(893*var(--u))] lg:pl-[calc(47*var(--u))] lg:pt-[calc(112*var(--u))] lg:pb-[calc(60*var(--u))] lg:pr-0">
                <img src="{{ asset('assets/img/figma_home_deco_panel_b.svg') }}" alt="" aria-hidden="true"
                    class="pointer-events-none select-none absolute left-[calc(263*var(--u))] top-[calc(496*var(--u))] w-[calc(655*var(--u))] h-auto">
                <div class="relative lg:w-[calc(777*var(--u))]">
                    <p class="leading-[1.21] text-lg lg:ml-[calc(11*var(--u))] lg:text-[max(14px,calc(21*var(--u)))]">Services</p>
                    <h2 class="mt-6 font-eurostile font-bold uppercase leading-[1.8] text-[22px] lg:mt-[calc(34*var(--u))] lg:whitespace-nowrap lg:text-[max(16px,calc(30*var(--u)))]">
                        INVESTIR DANS L’EXPERTISE <br class="hidden lg:inline">DIGITALE, C’EST GARANTIR LE <br class="hidden lg:inline">SUCCES DE VOTRE <br class="hidden lg:inline">TRANSFORMATION
                    </h2>
                    <p class="mt-8 font-light text-[#888] text-justify leading-[1.571] text-base lg:mt-[calc(10*var(--u))] lg:w-[calc(630*var(--u))] lg:text-[max(13px,calc(21*var(--u)))]">
                        NEXORA s’engage à être&nbsp; votre partenaire de référence en matière de transformation digitale. Nos experts sont notre atout le plus précieux et nous investissons massivement pour garantir leur excellence dans les domaines du digital, du conseil et de la conduite du changement, au service de vos projets et de votre organisation.
                    </p>
                    <a href="{{ route('contact') }}" class="mt-8 inline-flex items-center justify-between gap-4 h-14 rounded-full border border-[#0158ff] pl-6 pr-2 py-1 max-w-full font-medium text-sm lg:py-0 lg:whitespace-nowrap transition-shadow duration-300 hover:shadow-[0_0_20px_4px_rgba(1,88,255,0.45)] lg:mt-[calc(34*var(--u))] lg:h-[calc(63*var(--u))] lg:min-w-[calc(374*var(--u))] lg:pl-[calc(30*var(--u))] lg:pr-[calc(8*var(--u))] lg:text-[max(11px,calc(14*var(--u)))]">
                        Découvrez nos programmes de formation
                        <span class="relative flex shrink-0 items-center justify-center w-10 h-10 lg:w-[calc(47*var(--u))] lg:h-[calc(47*var(--u))]">
                            <img src="{{ asset('assets/img/figma_home_dot_blue.svg') }}" alt="" class="absolute inset-0 w-full h-full">
                            <img src="{{ asset('assets/img/figma_home_btn_flag.svg') }}" alt="" class="relative w-3.5 h-auto rotate-[73.96deg] lg:w-[calc(17.47*var(--u))]">
                        </span>
                    </a>
                </div>
            </div>

            <div class="relative p-6 sm:p-10 lg:p-0 lg:absolute lg:inset-y-0 lg:left-0 lg:w-1/2">
                <img src="{{ asset('assets/img/figma_feature_panel_2.png') }}" alt="" aria-hidden="true" class="lg:hidden absolute inset-0 w-full h-full object-cover object-left">
                <div class="relative bg-white text-black rounded-[32px] p-6 lg:absolute lg:left-[calc(155*var(--u))] lg:top-[calc(171*var(--u))] lg:flex lg:flex-col lg:w-[calc(554*var(--u))] lg:min-h-[calc(570*var(--u))] lg:rounded-[calc(32*var(--u))] lg:pt-[calc(74*var(--u))] lg:px-0 lg:pb-[calc(10*var(--u))]">
                    <p class="text-center font-montserrat text-[#0158ff] leading-[1.21] text-base lg:text-[max(12px,calc(17*var(--u)))]">Déploiement &amp; formation</p>
                    <h3 class="mt-4 font-eurostile font-bold leading-[1.8] text-base lg:mt-[calc(20*var(--u))] lg:mx-[calc(88*var(--u))] lg:text-[max(11px,calc(18*var(--u)))]">CONDUITE DU CHANGEMENT</h3>
                    <p class="mt-4 font-montserrat font-light text-justify leading-[1.647] text-[15px] lg:mt-[calc(19*var(--u))] lg:ml-[calc(88*var(--u))] lg:w-[calc(398*var(--u))] lg:text-[max(11px,calc(17*var(--u)))]">
                        NEXORA accompagne vos équipes dans la prise en main des nouveaux outils digitaux. Nous proposons à chaque profil, pour garantir une adoption réussie des solutions déployées et une montée en compétence durable. Nous assurons également la conduite du changement pour faciliter la transition digitale au sein de votre organisation.
                    </p>
                    <p class="mt-8 font-montserrat font-medium leading-[0.9] text-base lg:mt-auto lg:pt-[calc(24*var(--u))] lg:ml-[calc(22*var(--u))] lg:text-[max(11px,calc(16*var(--u)))]">1/5</p>
                    <div class="mt-2 h-1.5 overflow-hidden rounded-[2.5px] bg-[#d9d9d9] lg:mt-[calc(9.6*var(--u))] lg:ml-[calc(21*var(--u))] lg:w-[calc(498*var(--u))] lg:h-[calc(6*var(--u))]">
                        <div class="h-full w-[22.3%] rounded-[2.5px] bg-[#0158ff]"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Partner logos marquee -->
        <div class="mt-16 overflow-hidden lg:mt-[calc(113*var(--u))]">
            <div class="nxh-logos flex w-max items-start ml-8 lg:ml-[calc(178*var(--u))]">
                @foreach (range(1, 4) as $set)
                    @foreach ($logos as $logo)
                        <img src="{{ asset('assets/img/' . $logo['file']) }}" alt="{{ $set === 1 ? $logo['alt'] : '' }}" @if ($set > 1) aria-hidden="true" @endif class="shrink-0 object-cover {{ $logo['cls'] }}">
                    @endforeach
                @endforeach
            </div>
        </div>

        <!-- Gallery: drifts to the right -->
        <div class="mt-16 overflow-hidden lg:mt-[calc(129*var(--u))]">
            <div class="nxh-gallery flex w-max -ml-[304px] lg:-ml-[calc(1531*var(--u))]">
                @foreach (range(1, 2) as $set)
                    @foreach (range(1, 6) as $n)
                        <img src="{{ asset('assets/img/figma_home_gallery_' . $n . '.jpg') }}" alt="{{ $set === 1 ? 'Réalisation NEXORA' : '' }}" @if ($set > 1) aria-hidden="true" @endif
                            class="shrink-0 object-cover w-[300px] h-[179px] mr-2 rounded-md lg:w-[calc(880*var(--u))] lg:h-[calc(525*var(--u))] lg:mr-[calc(16*var(--u))] lg:rounded-[calc(6*var(--u))]">
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- DÉCOUVREZ NOS PROJETS (gray) -->
    <!-- ============================================================ -->
    <section id="projets" class="bg-[#d9d9d9] text-black px-4 sm:px-6 py-16 lg:px-0 lg:pt-[calc(54*var(--u))] lg:pb-[calc(116*var(--u))]">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between lg:pl-[calc(127*var(--u))] lg:pr-[calc(104*var(--u))]">
            <h2 class="font-medium leading-[1.21] text-4xl lg:text-[max(36px,calc(85*var(--u)))]">Découvrez nos projets</h2>

            <!-- CTA "Voir tous les projets" (Figma Default / Hover variants) -->
            <a href="{{ route('project') }}" class="group relative flex shrink-0 items-center self-start h-14 rounded-full border-2 border-[#0158ff] pl-2 pr-6 font-medium text-[#0158ff] text-base transition-all duration-300 hover:bg-[#0158ff] hover:text-white hover:shadow-[0_0_45px_8px_rgba(1,88,255,0.22),0_0_20px_4px_rgba(1,88,255,0.45),0_0_8px_0_rgba(1,88,255,0.7)] lg:mt-[calc(10*var(--u))] lg:h-[calc(65*var(--u))] lg:min-w-[calc(301*var(--u))] lg:pl-[calc(7*var(--u))] lg:pr-[calc(20*var(--u))] lg:text-[max(12px,calc(17*var(--u)))]">
                <span class="relative shrink-0 w-10 h-10 lg:w-[calc(49*var(--u))] lg:h-[calc(49*var(--u))]">
                    <img src="{{ asset('assets/img/figma_home_cta_icon.svg') }}" alt="" class="absolute inset-0 w-full h-full transition-opacity duration-300 group-hover:opacity-0">
                    <img src="{{ asset('assets/img/figma_home_cta_icon_hover_circle.svg') }}" alt="" class="absolute inset-0 w-full h-full opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <img src="{{ asset('assets/img/figma_home_cta_icon_hover_arrow.svg') }}" alt="" class="absolute left-1/2 top-1/2 w-[39.4%] h-auto -translate-x-1/2 -translate-y-1/2 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                </span>
                <span class="ml-4 whitespace-nowrap lg:ml-[calc(29*var(--u))]">Voir tous les projets</span>
            </a>
        </div>

        @php
            $projects = [
                ['img' => 'figma_project_egov_plateforme.png', 'cat' => 'Transformation Digitale', 'l1' => 'Portail e-Gov', 'l2' => 'Plateforme', 'client' => 'Ministère du Numérique', 'date' => 'Janvier 2024 - En cours',
                    'card' => 'lg:w-[calc(948*var(--u))] lg:px-[calc(7.5*var(--u))]', 'info' => 'lg:pl-[calc(36*var(--u))]'],
                ['img' => 'figma_project_egov_erp.png', 'cat' => 'Développement Web', 'l1' => 'Portail e-Gov', 'l2' => 'ERP & CRM', 'client' => 'Groupe Industrie Plus', 'date' => "Mars 2023 à aujourd'hui",
                    'card' => 'lg:w-[calc(696*var(--u))] lg:px-[calc(5.5*var(--u))]', 'info' => 'lg:pl-[calc(48*var(--u))]'],
            ];
        @endphp
        <div class="mt-10 grid gap-4 md:grid-cols-2 lg:mt-[calc(77*var(--u))] lg:flex lg:gap-[calc(13*var(--u))] lg:pl-[calc(130*var(--u))]">
            @foreach ($projects as $project)
                <article class="flex flex-col rounded-[28px] bg-white p-1.5 pb-8 lg:min-h-[calc(822*var(--u))] lg:rounded-[calc(28*var(--u))] lg:pt-[calc(6*var(--u))] lg:pb-[calc(40*var(--u))] {{ $project['card'] }}">
                    <img src="{{ asset('assets/img/' . $project['img']) }}" alt="{{ $project['l1'] }} {{ $project['l2'] }}"
                        class="w-full aspect-[933/557] object-cover rounded-[22px] lg:aspect-auto lg:h-[calc(557*var(--u))] lg:rounded-[calc(25*var(--u))]">
                    <div class="mt-8 flex flex-col gap-6 px-5 sm:flex-row sm:justify-between lg:mt-[calc(43*var(--u))] lg:gap-4 lg:px-0 {{ $project['info'] }}">
                        <div>
                            <p class="font-medium leading-[1.21] text-base lg:text-[max(12px,calc(16*var(--u)))]">{{ $project['cat'] }}</p>
                            <h3 class="mt-4 leading-[1.108] text-3xl lg:mt-[calc(17*var(--u))] lg:text-[calc(37*var(--u))]">{{ $project['l1'] }}<br>{{ $project['l2'] }}</h3>
                        </div>
                        <dl class="font-medium leading-[1.21] text-base sm:shrink-0 lg:w-[calc(245*var(--u))] lg:mt-[calc(2*var(--u))] lg:text-[max(12px,calc(16*var(--u)))]">
                            <dt>Client</dt>
                            <dd class="mt-4 lg:mt-[calc(17*var(--u))]">{{ $project['client'] }}</dd>
                            <dt class="mt-6 lg:mt-[calc(27*var(--u))]">Date</dt>
                            <dd class="mt-4 lg:mt-[calc(18*var(--u))]">{{ $project['date'] }}</dd>
                        </dl>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</div>

@include('pages.partials.phone-button', ['pulse' => 'nxh-phone-3'])

@endsection

@push('scripts')
    <script>
        // Rolling counters start once the hero has started (after the intro) and the stats are in view
        document.addEventListener('nx:hero-start', function () {
            var stats = document.querySelector('.nxh-stats');
            if (!('IntersectionObserver' in window)) {
                stats.classList.add('is-counted');
                return;
            }
            new IntersectionObserver(function (entries, observer) {
                if (entries[0].isIntersecting) {
                    stats.classList.add('is-counted');
                    observer.disconnect();
                }
            }, { threshold: 0.4 }).observe(stats);
        });
    </script>
@endpush
