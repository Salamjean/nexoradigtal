@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - Nos Services')

{{-- Footer sits on the same Figma frame fill as the page --}}
@section('footer_bg', 'bg-[#000d26]')

@section('content')

@php
    /*
     * Reproduces the Figma frame "Services" (496:3850), laid out at 1886px wide.
     * Desktop measurements use "u" units: --u = 1/1886 of the page width (see home.blade.php).
     */
    // Category tabs: one per service page (config/nexora_services.php), the first one highlighted as in Figma
    $tabs = [];
    foreach (['web-mobile' => 'Web & Mobile', 'erp' => 'ERP', 'automatisation-ia' => 'Automatisation & IA', 'audit' => 'Audit', 'conseil' => 'Infrastructure', 'btp' => 'BTP'] as $slug => $label) {
        $tabs[] = ['label' => $label, 'href' => route('service.show', $slug), 'active' => $slug === 'web-mobile'];
    }

    // Carousel cards, in the Figma order (the track starts scrolled so the 2nd card sits at x=189)
    $cards = [
        ['title' => 'Plateforme web & mobile', 'slug' => 'web-mobile'],
        ['title' => 'ERP 1 Système d’information', 'slug' => 'erp'],
        ['title' => 'Automatisation & IA', 'slug' => 'automatisation-ia'],
        ['title' => 'Audit SI & AMOA', 'slug' => 'audit'],
        ['title' => 'Conseil et transformation', 'slug' => 'conseil'],
    ];

    /*
     * Service blocks. Vertical offsets come from the Figma frame:
     * top = gap above the row, title = title offset in the row, para/link = gaps in the text column,
     * img = image top offset in the row, x = extra image offset (1039 vs 1043), sep = gap before the separator.
     */
    $services = [
        [
            'id' => 'svc-web-mobile', 'slug' => 'web-mobile', 'title' => 'PLATEFORME WEB &MOBILE', 'size' => 40, 'img' => 'figma_service_web.jpg', 'h' => 394,
            'top' => 0, 'pt' => 0, 'para' => 50, 'link' => 64, 'imgTop' => 3, 'x' => 0, 'sep' => 35,
            'text' => "NEXORA conçoit et développe des plateformes web et applications mobiles sur mesure, couvrant l'intégralité du cycle produit. De la conception UX/UI au déploiement en production, nous assurons le développement front-end et back-end, ainsi que les intégrations API et l'architecture cloud. Nos solutions sont conçues pour la performance, la sécurité et la scalabilité sur les marchés africains et internationaux.",
        ],
        [
            'id' => 'svc-erp', 'slug' => 'erp', 'title' => 'ERP SYSTEMES D’INFORMATION', 'size' => 35, 'img' => 'figma_service_web.jpg', 'h' => 394,
            'top' => 79, 'pt' => 20, 'para' => 31, 'link' => 75, 'imgTop' => 0, 'x' => 0, 'sep' => 155,
            'text' => "NEXORA déploie et paramètre des systèmes ERP adaptés à vos processus métiers, en s'appuyant sur les meilleures solutions du marché. Nous accompagnons la migration de vos outils vers des environnements intégrés qui centralisent vos données, automatisent vos flux et optimisent votre pilotage opérationnel. Nos consultants assurent une adoption fluide et un transfert de compétences durable vers vos équipes. Nous couvrons les modules clés : finance, RH, logistique, CRM et gestion de projets.",
        ],
        [
            'id' => 'svc-automation', 'slug' => 'automatisation-ia', 'title' => 'AUTOMATISATION & IA', 'size' => 40, 'img' => 'figma_service_ia.jpg', 'h' => 394,
            'top' => 75, 'pt' => 23, 'para' => 26, 'link' => 65, 'imgTop' => 0, 'x' => 0, 'sep' => 39,
            'text' => "Nos équipes maîtrisent des technologies d'automatisation avancées telles que la RPA, les workflows intelligents et les connecteurs API, qui éliminent les tâches répétitives et accélèrent vos opérations. Nous déployons également des modules d'intelligence artificielle pour l'analyse prédictive, la reconnaissance documentaire et la prise de décision assistée en temps réel. Chaque solution est dimensionnée aux réalités de votre secteur d'activité.",
        ],
        [
            'id' => 'svc-audit', 'slug' => 'audit', 'title' => 'AUDI SI & AMOA', 'size' => 40, 'img' => 'figma_service_audit.jpg', 'h' => 359,
            'top' => 76, 'pt' => 15, 'para' => 94, 'link' => 52, 'imgTop' => 0, 'x' => 0, 'sep' => 80,
            'text' => "NEXORA réalise des audits approfondis de vos systèmes d'information, identifiant les axes d'amélioration, les risques et les opportunités d'optimisation. En tant qu'assistant à maîtrise d'ouvrage (AMOA), nous pilotons vos projets de transformation de bout en bout, du cadrage à la réception.",
        ],
        [
            'id' => 'svc-conseil', 'slug' => 'conseil', 'title' => 'CONSEIL & TRANSFORMATION', 'size' => 40, 'img' => 'figma_service_conseil.jpg', 'h' => 298,
            'top' => 74, 'pt' => 25, 'para' => 24, 'link' => 54, 'imgTop' => 0, 'x' => 4, 'sep' => 74, 'truncate' => true,
            'text' => 'Nous accompagnons les dirigeants dans la définition de leur feuille de route digitale. Stratégie, gouvernance des données et conduite du changement : notre pôle conseil mobilise des experts reconnus pour accélérer la transformation de votre organisation et maximiser votre retour sur investissement technologique.',
        ],
        [
            'id' => 'svc-btp', 'slug' => 'btp', 'title' => "BTP & FORNITURES\nMATERIEL IT", 'size' => 40, 'img' => 'figma_service_btp.jpg', 'h' => 453,
            'top' => 78, 'pt' => 44, 'para' => 27, 'link' => 72, 'imgTop' => 0, 'x' => 4, 'sep' => null,
            'text' => "NEXORA propose une offre intégrée de fournitures de matériels informatiques, de solutions d'infrastructure réseau et de travaux de câblage BTP. Nous assurons l'approvisionnement en équipements certifiés — serveurs, postes de travail, switches et solutions de stockage — ainsi que leur installation et maintenance. Nos équipes déploient des infrastructures conformes aux standards internationaux, en garantissant la performance, la sécurité et la durabilité de vos installations numériques sur le long terme.",
        ],
    ];
@endphp

@include('pages.partials.figma-motion')

<style>
    html:has(.nxs-page) { scroll-behavior: smooth; }
    @media (prefers-reduced-motion: reduce) { html:has(.nxs-page) { scroll-behavior: auto; } }
</style>

<!-- Page background = Figma frame fill (#0158FF at 15%) over black -->
<div class="nxs-page [container-type:inline-size] [--u:calc(100cqw/1886)] bg-[#000d26] font-inter text-white overflow-hidden">

    <!-- ============================================================ -->
    <!-- HERO -->
    <!-- ============================================================ -->
    @include('pages.partials.services-hero', ['tabs' => $tabs])

    <!-- ============================================================ -->
    <!-- NOS SERVICES - Intro panel (#0158FF at 50%) -->
    <!-- ============================================================ -->
    <section class="px-4 sm:px-6 pt-4 lg:px-0 lg:pt-[calc(93*var(--u))]">
        <div class="overflow-hidden rounded-3xl bg-[#0158ff]/50 flex flex-col lg:flex-row lg:ml-[calc(33*var(--u))] lg:w-[calc(1825*var(--u))] lg:min-h-[calc(911*var(--u))] lg:rounded-[calc(31*var(--u))]">
            <div class="relative shrink-0 overflow-hidden aspect-square sm:aspect-[4/3] lg:aspect-auto lg:w-[calc(911*var(--u))] lg:rounded-l-[calc(31*var(--u))]">
                <img src="{{ asset('assets/img/figma_service_panel.jpg') }}" alt="Experte NEXORA devant des tableaux de bord digitaux"
                    class="absolute inset-0 w-full h-full object-cover">
                <!-- Brand "n" overlay (white 50%) with its blue flag (50%) -->
                <img src="{{ asset('assets/img/figma_service_panel_mark.svg') }}" alt="" aria-hidden="true"
                    class="pointer-events-none select-none absolute left-[17.12%] top-[18.33%] w-[62.57%] h-auto">
                <img src="{{ asset('assets/img/figma_service_panel_flag.svg') }}" alt="" aria-hidden="true"
                    class="pointer-events-none select-none absolute left-[17.12%] top-[18.33%] w-[15.15%] h-auto">
            </div>

            <div class="p-6 sm:p-10 lg:p-0 lg:pl-[calc(74*var(--u))] lg:pt-[calc(95*var(--u))] lg:pb-[calc(60*var(--u))]">
                <p class="font-medium leading-[1.21] text-lg lg:text-[max(14px,calc(21*var(--u)))]">Nos services</p>
                <h2 class="mt-6 font-eurostile font-bold uppercase leading-[1.8] text-[22px] lg:mt-[calc(69*var(--u))] lg:-ml-[calc(4*var(--u))] lg:text-[max(16px,calc(30*var(--u)))]">
                    EXPERTISE DIGITALE POUR<br class="hidden lg:block"> CHAQUE DEFI
                </h2>
                <p class="mt-6 font-light text-white/70 text-justify leading-[1.571] text-base lg:mt-[calc(30*var(--u))] lg:w-[calc(775*var(--u))] lg:text-[max(13px,calc(21*var(--u)))]">
                    NEXORA est un partenaire de référence en transformation digitale et en développement de solutions technologiques sur mesure pour les entreprises. Notre force réside dans notre capacité à mobiliser des expertises pointues pour concevoir, développer et déployer des produits qui répondent aux plus hautes exigences de performance, d'innovation et d'excellence.
                </p>
                <a href="#svc-web-mobile" class="mt-8 inline-flex items-center justify-between gap-4 h-14 rounded-full border border-white/50 pl-6 pr-2 font-medium text-[15px] whitespace-nowrap transition-shadow duration-300 hover:shadow-[0_0_20px_4px_rgba(1,88,255,0.45)] lg:mt-[calc(55*var(--u))] lg:h-[calc(65*var(--u))] lg:min-w-[calc(301*var(--u))] lg:pl-[calc(30*var(--u))] lg:pr-[calc(8*var(--u))] lg:text-[max(12px,calc(17*var(--u)))]">
                    Voir tous les services
                    <span class="flex shrink-0 items-center justify-center w-10 h-10 rounded-full bg-[#0158ff] lg:w-[calc(48*var(--u))] lg:h-[calc(48*var(--u))]">
                        <img src="{{ asset('assets/img/figma_home_btn_flag.svg') }}" alt="" class="w-3.5 h-auto rotate-[73.96deg] lg:w-[calc(17.47*var(--u))]">
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- SERVICES - Horizontal cards (#0158FF at 31%) -->
    <!-- ============================================================ -->
    <section class="pt-10 lg:pt-[calc(75*var(--u))]">
        <div x-data x-init="if (window.matchMedia('(min-width: 1024px)').matches) { const c = $el.querySelectorAll('article'); if (c[1]) $el.scrollLeft = c[1].offsetLeft - c[0].offsetLeft; }"
            class="flex gap-3 overflow-x-auto nx-scroll-hide [scrollbar-width:none] [&::-webkit-scrollbar]:hidden snap-x snap-mandatory px-4 scroll-px-4 lg:gap-[calc(9.5*var(--u))] lg:px-[calc(189*var(--u))] lg:scroll-px-[calc(189*var(--u))]">
            @foreach ($cards as $card)
                <article class="snap-start shrink-0 flex flex-col w-[300px] sm:w-[360px] rounded-3xl bg-[#0158ff]/[0.31] p-6 lg:w-[calc(560*var(--u))] lg:h-[calc(531*var(--u))] lg:rounded-[calc(30*var(--u))] lg:pt-[calc(35*var(--u))] lg:pl-[calc(36*var(--u))] lg:pr-[calc(36*var(--u))] lg:pb-0">
                    <span class="block w-28 h-28 rounded-full bg-white lg:ml-px lg:w-[calc(177*var(--u))] lg:h-[calc(177*var(--u))]" aria-hidden="true"></span>
                    <p class="mt-8 font-medium leading-[1.21] text-[15px] lg:mt-[calc(58*var(--u))] lg:text-[max(11px,calc(17*var(--u)))]">Services</p>
                    <h3 class="mt-3 font-medium leading-[1.21] text-2xl lg:mt-[calc(16.5*var(--u))] lg:whitespace-nowrap lg:text-[calc(34.5*var(--u))]">{{ $card['title'] }}</h3>
                    <a href="{{ route('service.show', $card['slug']) }}" class="mt-8 flex items-center justify-center h-14 rounded-full border border-white/50 font-medium text-[15px] whitespace-nowrap transition-colors duration-300 hover:bg-white/10 lg:mt-[calc(40*var(--u))] lg:ml-[calc(2*var(--u))] lg:h-[calc(65*var(--u))] lg:w-[calc(486*var(--u))] lg:text-[max(11px,calc(17*var(--u)))]">
                        Découvrez-en plus
                    </a>
                </article>
            @endforeach
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- DETAIL DES SERVICES -->
    <!-- ============================================================ -->
    <section class="px-4 sm:px-6 pt-16 pb-16 lg:px-0 lg:pl-[calc(91*var(--u))] lg:pt-[calc(128*var(--u))] lg:pb-[calc(202*var(--u))]">
        @foreach ($services as $service)
            <div id="{{ $service['id'] }}" class="scroll-mt-6 flex flex-col gap-8 lg:flex-row lg:items-start lg:gap-0" style="--top: {{ $service['top'] }}; --pt: {{ $service['pt'] }}; --para: {{ $service['para'] }}; --link: {{ $service['link'] }}; --img: {{ $service['imgTop'] }}; --x: {{ $service['x'] }}; --h: {{ $service['h'] }}">
                <div class="lg:mt-[calc(var(--top)*var(--u))] lg:pt-[calc(var(--pt)*var(--u))] lg:w-[calc(815*var(--u))] lg:shrink-0">
                    <h2 class="font-eurostile font-bold uppercase leading-none text-[23px] sm:text-[32px] {{ $service['size'] === 35 ? 'lg:text-[max(18px,calc(35*var(--u)))]' : 'lg:text-[max(20px,calc(40*var(--u)))]' }} {{ ($service['truncate'] ?? false) ? 'lg:truncate lg:w-[calc(760*var(--u))]' : '' }}">{!! nl2br(e($service['title'])) !!}</h2>
                    <p class="mt-5 font-medium text-[#888] text-justify leading-[1.21] text-base lg:mt-[calc(var(--para)*var(--u))] lg:text-[max(13px,calc(20.6*var(--u)))]">{{ $service['text'] }}</p>
                    <a href="{{ route('service.show', $service['slug']) }}" class="group mt-6 inline-flex items-center gap-3.5 font-semibold text-[#0158ff] leading-[1.21] text-lg transition-colors duration-200 hover:text-white lg:mt-[calc(var(--link)*var(--u))] lg:gap-[calc(14*var(--u))] lg:text-[max(14px,calc(21*var(--u)))]">
                        EN SAVOIR PLUS
                        <svg class="w-[0.86em] h-auto transition-transform duration-200 group-hover:translate-x-1" viewBox="0 0 18 16" fill="none" aria-hidden="true">
                            <path d="M1 8h15.8M10 1l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
                <img src="{{ asset('assets/img/' . $service['img']) }}" alt="{{ str_replace("\n", ' ', $service['title']) }}" loading="lazy"
                    class="w-full h-56 sm:h-80 object-cover rounded-3xl lg:mt-[calc((var(--top)_+_var(--img))*var(--u))] lg:ml-[calc((133_+_var(--x))*var(--u))] lg:w-[calc(748*var(--u))] lg:h-[calc(var(--h)*var(--u))] lg:rounded-[calc(29*var(--u))]">
            </div>
            @if ($service['sep'] !== null)
                <div class="my-12 h-0.5 bg-[#d9d9d9] lg:my-0 lg:mt-[calc(var(--sep)*var(--u))] lg:w-[calc(1696*var(--u))]" style="--sep: {{ $service['sep'] }}"></div>
            @endif
        @endforeach
    </section>
</div>

@endsection
