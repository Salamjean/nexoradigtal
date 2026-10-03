@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - Projets Realises')

@section('content')

<!-- ============================================================ -->
<!-- HERO -->
<!-- ============================================================ -->
<section class="relative flex flex-col justify-center gap-8 pt-40 pb-16 px-4 sm:px-8 bg-slate-950 overflow-hidden">

    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0d0d0d] via-slate-950 to-blue-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-blue-600/20 via-transparent to-transparent"></div>
        <div class="absolute -top-40 right-0 w-[36rem] h-[36rem] bg-blue-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto w-full text-center">
        <h1 class="text-white font-heading font-bold text-[clamp(1.25rem,5.8vw,7.1875rem)] uppercase leading-[0.9] whitespace-nowrap drop-shadow-[0_15px_35px_rgba(0,0,0,0.8)] select-none">
            @php $heroLetters = str_split('PROJETS REALISES'); @endphp
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

    <!-- Sector tags -->
    <div class="relative z-10 max-w-7xl mx-auto w-full flex flex-wrap gap-3">
        <span class="px-6 py-4 rounded-full border border-white/40 text-white text-sm font-medium">Secteur Public</span>
        <span class="px-6 py-4 rounded-full border border-white/40 text-white text-sm font-medium">Secteur Privé</span>
    </div>

    <!-- Featured case study -->
    <div class="relative z-10 max-w-7xl mx-auto w-full mt-4">
        <div class="flex items-center justify-between mb-5">
            <span class="text-white text-sm font-medium">Étude de cas vedette</span>
            <a href="{{ route('contact') }}" class="hidden sm:inline-flex items-center gap-3 pl-6 pr-2 py-2 rounded-full border border-white/50 text-white text-sm font-medium hover:bg-white hover:text-slate-950 transition-all duration-300 group">
                Contacter notre équipe
                <span class="w-9 h-9 rounded-full bg-white/10 group-hover:bg-slate-950 group-hover:text-white flex items-center justify-center transition">
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </span>
            </a>
        </div>
        <div class="rounded-[28px] overflow-hidden h-72 sm:h-[420px]">
            <img src="{{ asset('assets/img/figma_project_featured.png') }}" alt="Portail e-Service DGBF" class="w-full h-full object-cover">
        </div>
        <div class="mt-8">
            <h2 class="text-white font-heading font-extrabold text-2xl sm:text-4xl tracking-tight leading-snug mb-4">
                PORTAIL E-SERVICE DGBF
            </h2>
            <p class="text-slate-400 text-base leading-relaxed text-justify max-w-4xl">
                Étude de cas : Accélérer la transformation numérique d'une institution publique à fort volume transactionnel. Le projet de portail e-Services pour la Direction Générale du Budget et des Finances (DGBF) de Côte d'Ivoire représente une initiative stratégique de modernisation des services publics. NEXORA DIGITAL SARL a été mandatée pour concevoir et déployer une plateforme intégrée permettant la dématérialisation des procédures budgétaires et l'automatisation des workflows de validation.
            </p>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- LISTE DES PROJETS -->
<!-- ============================================================ -->
<section class="bg-slate-950">
    @php
        $projects = [
            [
                'title' => 'DEPLOIEMENT ERP - GROUPE SIFCA',
                'date' => "Janvier 2024 à aujourd'hui",
                'client' => 'Groupe SIFCA',
                'prestataire' => 'NEXORA DIGITAL SARL',
                'img' => 'figma_project_sifca.png',
            ],
            [
                'title' => 'PLATEFORME RH - BOLLORE AFRICA LOGISTICS',
                'date' => 'Mars 2023 à décembre 2023',
                'client' => 'Bolloré Africa Logistics',
                'prestataire' => 'NEXORA DIGITAL SARL',
                'img' => 'figma_project_bollore.png',
            ],
            [
                'title' => 'DEMATERIALISATION - MINISTERE DES FINANCES',
                'date' => 'Juin 2023 – En cours',
                'client' => 'Ministère des Finances CI',
                'prestataire' => 'NEXORA DIGITAL SARL',
                'img' => 'figma_project_finances.png',
            ],
            [
                'title' => "INFRASTRUCTURE IT - ORANGE COTE D'IVOIRE",
                'date' => 'Septembre 2022 (en cours)',
                'client' => "Orange Côte d'Ivoire",
                'prestataire' => 'NEXORA DIGITAL SARL',
                'img' => 'figma_project_orange.png',
            ],
            [
                'title' => 'PORTAIL E-GOUVERNEMENT - DGBF',
                'date' => 'Avril 2022 à janvier 2024',
                'client' => 'Direction Générale du Budget',
                'prestataire' => 'NEXORA DIGITAL SARL',
                'img' => 'figma_project_dgbf.png',
            ],
        ];
    @endphp
    @foreach ($projects as $i => $project)
        <div class="border-t border-slate-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                <div class="rounded-[28px] overflow-hidden h-64 sm:h-96">
                    <img src="{{ asset('assets/img/'.$project['img']) }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover">
                </div>
                <div>
                    <h3 class="text-white font-heading font-bold text-xl sm:text-2xl tracking-tight leading-snug mb-6">
                        {{ $project['title'] }}
                    </h3>
                    <div class="space-y-4">
                        <div class="pb-4 border-b border-slate-800">
                            <span class="text-white text-xs font-semibold uppercase tracking-wide block mb-1">Date</span>
                            <span class="text-slate-400 text-lg">{{ $project['date'] }}</span>
                        </div>
                        <div class="pb-4 border-b border-slate-800">
                            <span class="text-white text-xs font-semibold uppercase tracking-wide block mb-1">Client</span>
                            <span class="text-slate-400 text-lg">{{ $project['client'] }}</span>
                        </div>
                        <div>
                            <span class="text-white text-xs font-semibold uppercase tracking-wide block mb-1">Prestataire principal</span>
                            <span class="text-slate-400 text-lg">{{ $project['prestataire'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>
@endsection
