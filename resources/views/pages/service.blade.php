@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - Nos Services')

@section('content')

<!-- ============================================================ -->
<!-- HERO -->
<!-- ============================================================ -->
<section class="relative flex flex-col justify-center gap-8 pt-52 lg:pt-40 pb-16 px-4 sm:px-8 bg-slate-950 overflow-hidden">

    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0d0d0d] via-slate-950 to-blue-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-blue-600/20 via-transparent to-transparent"></div>
        <div class="absolute -top-40 right-0 w-[36rem] h-[36rem] bg-blue-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto w-full text-center">
        <h1 class="text-white font-heading font-bold text-[clamp(1.25rem,5.8vw,7.1875rem)] uppercase leading-[0.9] whitespace-nowrap drop-shadow-[0_15px_35px_rgba(0,0,0,0.8)] select-none">
            @php $heroLetters = str_split('NOS SERVICES'); @endphp
            @foreach ($heroLetters as $i => $char)
                <span class="nx-letter" style="animation-delay: {{ $i * 0.025 }}s">{{ $char === ' ' ? "\u{00A0}" : $char }}</span>
            @endforeach
        </h1>
        <div class="mt-6 max-w-3xl mx-auto">
            <div class="w-28 h-px bg-blue-600 mb-3 mx-auto"></div>
            <p class="font-montserrat text-[#888] text-base sm:text-lg leading-relaxed">
                Depuis une décennie, NEXORA DIGITAL SARL accompagne les leaders africains dans leur quête d'excellence technologique.
            </p>
        </div>
    </div>

    <!-- Category tabs -->
    <div class="relative z-10 max-w-7xl mx-auto w-full">
        <div class="flex gap-3 overflow-x-auto nx-scroll-hide">
            @php
                $tabs = [
                    ['label' => 'Web & Mobile', 'target' => '#svc-web-mobile', 'active' => true],
                    ['label' => 'ERP', 'target' => '#svc-erp', 'active' => false],
                    ['label' => 'Audit', 'target' => '#svc-audit', 'active' => false],
                    ['label' => 'Infrastructure', 'target' => '#svc-btp', 'active' => false],
                    ['label' => 'BTP', 'target' => '#svc-btp', 'active' => false],
                ];
            @endphp
            @foreach ($tabs as $tab)
                <a href="{{ $tab['target'] }}" class="shrink-0 px-6 py-3 rounded-full border text-xs font-bold uppercase tracking-wide transition {{ $tab['active'] ? 'bg-blue-600 border-blue-600 text-white' : 'bg-[#111] border-blue-600/60 text-white hover:bg-blue-600/20' }}">
                    {{ $tab['label'] }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Intro panel -->
    <div class="relative z-10 max-w-7xl mx-auto w-full mt-6">
        <div class="rounded-[28px] bg-blue-600/50 border border-blue-500/20 overflow-hidden grid grid-cols-1 lg:grid-cols-2">
            <div class="relative h-72 lg:h-auto order-2 lg:order-1">
                <img src="{{ asset('assets/img/figma_service_intro.png') }}" alt="Expertise digitale NEXORA" class="absolute inset-0 w-full h-full object-cover">
            </div>
            <div class="px-6 sm:px-10 py-10 sm:py-14 flex flex-col justify-center order-1 lg:order-2">
                <span class="text-white/80 text-sm font-medium mb-3">Nos services</span>
                <h2 class="text-white font-heading font-extrabold text-2xl sm:text-3xl tracking-tight leading-snug mb-6">
                    EXPERTISE DIGITALE POUR CHAQUE DEFI
                </h2>
                <p class="text-white/70 text-base leading-relaxed mb-8">
                    NEXORA est un partenaire de référence en transformation digitale et en développement de solutions technologiques sur mesure pour les entreprises. Notre force réside dans notre capacité à mobiliser des expertises pointues pour concevoir, développer et déployer des produits qui répondent aux plus hautes exigences de performance, d'innovation et d'excellence.
                </p>
                <a href="#svc-web-mobile" class="inline-flex items-center gap-3 pl-6 pr-2 py-2 rounded-full border border-white/60 text-white text-sm font-semibold hover:bg-white hover:text-slate-950 transition-all duration-300 group self-start opacity-90">
                    Voir tous les services
                    <span class="w-9 h-9 rounded-full bg-white/10 group-hover:bg-slate-950 group-hover:text-white flex items-center justify-center transition">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <!-- Horizontal service chips -->
    <div class="relative z-10 max-w-7xl mx-auto w-full mt-4">
        <div class="flex gap-5 overflow-x-auto nx-scroll-hide snap-x snap-mandatory pb-2">
            @php
                $chips = [
                    ['img' => 'figma_service_chip_1.png', 'title' => 'Plateforme web & mobile', 'target' => '#svc-web-mobile'],
                    ['img' => 'figma_service_chip_2.png', 'title' => 'ERP 1 Système d\'information', 'target' => '#svc-erp'],
                    ['img' => 'figma_service_chip_4.png', 'title' => 'Audit SI & AMOA', 'target' => '#svc-audit'],
                    ['img' => 'figma_service_chip_3.png', 'title' => 'Automatisation & IA', 'target' => '#svc-automation'],
                    ['img' => 'figma_service_chip_5.png', 'title' => 'Conseil et transformation', 'target' => '#svc-conseil'],
                ];
            @endphp
            @foreach ($chips as $chip)
                <div class="snap-center shrink-0 w-[220px] rounded-3xl bg-blue-600/10 border border-blue-500/20 p-5 flex flex-col items-center text-center gap-3 hover:bg-blue-600/15 hover:border-blue-500/40 transition-all duration-300">
                    <img src="{{ asset('assets/img/'.$chip['img']) }}" alt="{{ $chip['title'] }}" class="w-16 h-16 rounded-full object-cover ring-4 ring-white/10">
                    <div>
                        <span class="text-blue-400 text-[10px] font-bold uppercase tracking-wider">Services</span>
                        <h3 class="text-white font-montserrat font-medium text-base leading-snug mt-1">{{ $chip['title'] }}</h3>
                    </div>
                    <a href="{{ $chip['target'] }}" class="mt-auto inline-flex items-center gap-2 px-4 py-2 rounded-full border border-blue-500/40 text-white text-xs font-medium hover:bg-blue-600 hover:border-blue-600 transition">
                        Découvrez-en plus <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- DETAIL DES SERVICES -->
<!-- ============================================================ -->
<section class="bg-slate-950">
    @php
        $services = [
            [
                'id' => 'svc-web-mobile',
                'title' => 'PLATEFORME WEB & MOBILE',
                'text' => "NEXORA conçoit et développe des plateformes web et applications mobiles sur mesure, couvrant l'intégralité du cycle produit. De la conception UX/UI au déploiement en production, nous assurons le développement front-end et back-end, ainsi que les intégrations API et l'architecture cloud. Nos solutions sont conçues pour la performance, la sécurité et la scalabilité sur les marchés africains et internationaux.",
                'img' => 'figma_service_web_mobile.png',
            ],
            [
                'id' => 'svc-erp',
                'title' => "ERP SYSTEMES D'INFORMATION",
                'text' => "NEXORA déploie et paramètre des systèmes ERP adaptés à vos processus métiers, en s'appuyant sur les meilleures solutions du marché. Nous accompagnons la migration de vos outils vers des environnements intégrés qui centralisent vos données, automatisent vos flux et optimisent votre pilotage opérationnel. Nos consultants assurent une adoption fluide et un transfert de compétences durable vers vos équipes. Nous couvrons les modules clés : finance, RH, logistique, CRM et gestion de projets.",
                'img' => 'figma_service_erp.png',
            ],
            [
                'id' => 'svc-automation',
                'title' => 'AUTOMATISATION & IA',
                'text' => "Nos équipes maîtrisent des technologies d'automatisation avancées telles que la RPA, les workflows intelligents et les connecteurs API, qui éliminent les tâches répétitives et accélèrent vos opérations. Nous déployons également des modules d'intelligence artificielle pour l'analyse prédictive, la reconnaissance documentaire et la prise de décision assistée en temps réel. Chaque solution est dimensionnée aux réalités de votre secteur d'activité.",
                'img' => 'figma_service_automation.png',
            ],
            [
                'id' => 'svc-audit',
                'title' => 'AUDIT SI & AMOA',
                'text' => "NEXORA réalise des audits approfondis de vos systèmes d'information, identifiant les axes d'amélioration, les risques et les opportunités d'optimisation. En tant qu'assistant à maîtrise d'ouvrage (AMOA), nous pilotons vos projets de transformation de bout en bout, du cadrage à la réception.",
                'img' => 'figma_service_audit.png',
            ],
            [
                'id' => 'svc-conseil',
                'title' => 'CONSEIL & TRANSFORMATION',
                'text' => 'Nous accompagnons les dirigeants dans la définition de leur feuille de route digitale. Stratégie, gouvernance des données et conduite du changement : notre pôle conseil mobilise des experts reconnus pour accélérer la transformation de votre organisation et maximiser votre retour sur investissement technologique.',
                'img' => 'figma_service_conseil.png',
            ],
            [
                'id' => 'svc-btp',
                'title' => 'BTP & FOURNITURES MATERIEL IT',
                'text' => "NEXORA propose une offre intégrée de fournitures de matériels informatiques, de solutions d'infrastructure réseau et de travaux de câblage BTP. Nous assurons l'approvisionnement en équipements certifiés — serveurs, postes de travail, switches et solutions de stockage — ainsi que leur installation et maintenance. Nos équipes déploient des infrastructures conformes aux standards internationaux, en garantissant la performance, la sécurité et la durabilité de vos installations numériques sur le long terme.",
                'img' => 'figma_service_btp.png',
            ],
        ];
    @endphp
    @foreach ($services as $i => $service)
        <div id="{{ $service['id'] }}" class="border-t border-slate-800 {{ $i === 0 ? 'border-t-0' : '' }}">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20 grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <div>
                    <h2 class="text-white font-heading font-extrabold text-2xl sm:text-3xl tracking-tight leading-snug mb-5">
                        {{ $service['title'] }}
                    </h2>
                    <p class="text-slate-400 text-base leading-relaxed mb-6 text-justify">
                        {{ $service['text'] }}
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-blue-500 text-sm font-semibold uppercase tracking-wide hover:text-blue-400 transition">
                        En savoir plus <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
                <div class="rounded-[28px] overflow-hidden h-64 sm:h-80">
                    <img src="{{ asset('assets/img/'.$service['img']) }}" alt="{{ $service['title'] }}" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    @endforeach
</section>
@endsection
