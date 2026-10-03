@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - A propos de nous')

@section('content')

<!-- ============================================================ -->
<!-- HERO -->
<!-- ============================================================ -->
<section class="relative flex flex-col justify-center gap-10 pt-40 pb-16 px-4 sm:px-8 bg-slate-950 overflow-hidden">

    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0d0d0d] via-slate-950 to-blue-950/40"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-blue-600/20 via-transparent to-transparent"></div>
        <div class="absolute -top-40 right-0 w-[36rem] h-[36rem] bg-blue-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto w-full text-center">
        <h1 class="text-white font-heading font-bold text-[clamp(1.25rem,5.8vw,7.1875rem)] uppercase leading-[0.9] whitespace-nowrap drop-shadow-[0_15px_35px_rgba(0,0,0,0.8)] select-none">
            @php $heroLetters = str_split('QUI SOMMES NOUS ?'); @endphp
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

    <!-- Team avatars pill -->
    <div class="relative z-10 max-w-7xl mx-auto w-full">
        <div class="inline-flex bg-slate-900/60 backdrop-blur-xl border border-white/20 rounded-full px-4 sm:px-5 py-2.5 items-center gap-3 sm:gap-4 shadow-2xl hover:border-white/30 transition-all duration-300">
            <div class="flex -space-x-3 overflow-hidden">
                <img src="{{ asset('assets/img/avatar1.png') }}" alt="Membre equipe 1" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                <img src="{{ asset('assets/img/avatar2.png') }}" alt="Membre equipe 2" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                <img src="{{ asset('assets/img/avatar3.png') }}" alt="Membre equipe 3" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                <img src="{{ asset('assets/img/avatar4.png') }}" alt="Membre equipe 4" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                <img src="{{ asset('assets/img/avatar5.png') }}" alt="Membre equipe 5" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
            </div>
            <span class="text-white text-xs sm:text-sm font-medium tracking-wide">
                Decouvrez l'equipe derriere NEXORA
            </span>
        </div>
    </div>

    <!-- Team professional intro panel -->
    <div class="relative z-10 max-w-7xl mx-auto w-full mt-4">
        <div class="rounded-[28px] bg-blue-600/30 border border-blue-500/20 overflow-hidden grid grid-cols-1 lg:grid-cols-2">
            <div class="relative h-72 lg:h-auto">
                <img src="{{ asset('assets/img/figma_about_team_photo.png') }}" alt="Équipe NEXORA au bureau" class="absolute inset-0 w-full h-full object-cover">
            </div>
            <div class="px-6 sm:px-10 py-10 sm:py-14 flex flex-col justify-center">
                <span class="text-white/80 text-sm font-medium mb-3">Notre équipe</span>
                <h2 class="text-white font-heading font-extrabold text-2xl sm:text-3xl tracking-tight leading-snug mb-6">
                    UNE EQUIPE PROFESSIONNELLE
                </h2>
                <p class="text-white/70 text-base leading-relaxed mb-8">
                    La force de NEXORA réside dans la qualité de ses talents. Notre équipe dirigeante s'engage à bâtir l'excellence numérique de demain en conjuguant avec passion l'expertise de nos consultants seniors à l'ambition et à l'audace de nos jeunes talents, unis pour accélérer la transformation digitale en Afrique.
                </p>
                <a href="#equipe" class="inline-flex items-center gap-3 pl-6 pr-2 py-2 rounded-full border border-white/60 text-white text-sm font-semibold hover:bg-white hover:text-slate-950 transition-all duration-300 group self-start">
                    Découvrez l'équipe de direction
                    <span class="w-9 h-9 rounded-full bg-white/10 group-hover:bg-slate-950 group-hover:text-white flex items-center justify-center transition">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- EQUIPE DE DIRECTION -->
<!-- ============================================================ -->
<section id="equipe" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-14">
            @php
                $team = [
                    ['img' => 'figma_about_team_1.png', 'name' => 'Serge Kadio', 'role' => 'Directeur Général'],
                    ['img' => 'figma_about_team_3.png', 'name' => 'Carlos Riodan', 'role' => 'Directeur des Opérations Digitales'],
                    ['img' => 'figma_about_team_5.png', 'name' => 'Fabiola Khy', 'role' => 'Responsable Sécurité & Conformité SI', 'sub' => 'PMP, ITIL v4, AWS Certified'],
                    ['img' => 'figma_about_team_2.png', 'name' => 'Salam Chedour', 'role' => 'Responsable Commercial & Contrats'],
                    ['img' => 'figma_about_team_4.png', 'name' => 'Innes Excellencia', 'role' => 'Responsable Projets Infrastructure'],
                    ['img' => 'figma_about_team_6.png', 'name' => 'Khogo Soro', 'role' => 'Responsable Projets Infrastructure'],
                ];
            @endphp
            @foreach ($team as $member)
                <div class="group">
                    <div class="rounded-[24px] overflow-hidden bg-slate-100 aspect-[4/5]">
                        <img src="{{ asset('assets/img/'.$member['img']) }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <h3 class="text-slate-950 text-2xl font-medium mt-5">{{ $member['name'] }}</h3>
                    <p class="text-slate-500 text-sm mt-1">{{ $member['role'] }}</p>
                    @if (!empty($member['sub']))
                        <p class="text-slate-400 text-xs mt-0.5">{{ $member['sub'] }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
