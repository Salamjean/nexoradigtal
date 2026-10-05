@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - Histoire et héritage')

{{-- Figma frame fill is #0158FF at 15% on this page: the footer shares it --}}
@section('footer_bg', 'bg-[#000d26]')

@section('content')

@php
    /*
     * Reproduces the Figma frame "R" (881:1267), laid out at 1886px wide.
     * Desktop measurements use "u" units: --u = 1/1886 of the page width (see home.blade.php).
     */
    $projects = [
        ['year' => '2003', 'title' => ['ERP Ressources Humaines', "Administration de l'État"], 'client' => 'Ministère de la Fonction Publique', 'logo' => 'figma_history_card_logo.svg'],
        ['year' => '2008', 'title' => ['Portail Citoyen Municipal', 'Dématérialisation - Douala'], 'client' => 'Mairie de Douala', 'logo' => 'figma_history_card_logo.svg'],
        ['year' => '2013', 'title' => ['BankConnect Mobile', 'Infrastructure Fintech'], 'client' => 'EcoBank Cameroun', 'logo' => 'figma_history_card_logo.svg'],
        ['year' => '2017', 'title' => ['ERP Rollout National', 'Secteur Minier'], 'client' => 'Société des Mines', 'logo' => 'figma_history_card_logo_alt.svg'],
        ['year' => '2021', 'title' => ['Smart City Traffic IoT', 'Gestion Urbaine'], 'client' => 'Ministère des Transports', 'logo' => 'figma_history_card_logo_alt.svg'],
    ];

    $year = 'font-normal leading-[1.21] text-[#0158ff] text-5xl lg:text-[calc(57.2*var(--u))]';
    $heading = 'font-eurostile font-bold uppercase text-white leading-[1.25] text-[26px] lg:text-[max(20px,calc(40*var(--u)))]';
    $body = 'font-normal text-[#888] text-justify leading-[1.587] text-base lg:text-[max(13px,calc(20.8*var(--u)))]';
@endphp

<style>
    /* Timeline markers glide down the line and back (Figma: 3.05s loop, ease-in-out each way) */
    .nxhist-dot { animation: nxhist-dot 3.05s infinite; }
    @keyframes nxhist-dot {
        0% { transform: translateY(0); animation-timing-function: cubic-bezier(0.45, 0, 0.55, 1); }
        49.18% { transform: translateY(var(--travel)); animation-timing-function: cubic-bezier(0.45, 0, 0.55, 1); }
        98.361%, 100% { transform: translateY(0); }
    }
    @media (prefers-reduced-motion: reduce) {
        .nxhist-dot { animation: none; }
    }
</style>

<!-- Page background = Figma frame fill (#0158FF at 15%) over black -->
<div class="[container-type:inline-size] [--u:calc(100cqw/1886)] bg-[#000d26] font-inter text-white overflow-hidden">

    <!-- ============================================================ -->
    <!-- HERO -->
    <!-- ============================================================ -->
    <section class="relative overflow-hidden px-4 sm:px-6 pt-52 pb-12 lg:px-0 lg:pb-0 lg:pt-[calc(352*var(--u))] lg:h-[calc(909*var(--u))]">
        <!-- Decorative brand mark "n" (top-left) -->
        <img src="{{ asset('assets/img/figma_about_hero_mark.svg') }}" alt="" aria-hidden="true"
            class="pointer-events-none select-none absolute top-0 left-[calc(-175*var(--u))] w-[calc(708*var(--u))] opacity-30">

        <div class="relative lg:pl-[calc(24*var(--u))]">
            <h1 class="font-eurostile font-bold uppercase whitespace-nowrap leading-[0.9] text-[calc(92*var(--u))] lg:text-[calc(115*var(--u))]">HISTOIRE ET HERITAGE</h1>
            <div class="mt-1 w-28 h-px bg-[#0158ff] lg:mt-0 lg:ml-[calc(10*var(--u))] lg:w-[calc(112*var(--u))]"></div>
            <p class="mt-2.5 max-w-[800px] font-montserrat text-[#666] leading-[1.6] text-base lg:mt-[calc(9*var(--u))] lg:ml-[calc(11*var(--u))] lg:max-w-none lg:w-[calc(800*var(--u))] lg:text-[max(14px,calc(20*var(--u)))]">
                Depuis une décennie, NEXORA DIGITAL SARL accompagne les leaders africains dans leur quête d'excellence technologique.
            </p>
        </div>

        @include('pages.partials.hero-team-pill', ['cookie' => 'figma_about_cookie.svg'])
    </section>

    <!-- ============================================================ -->
    <!-- TIMELINE: 2003 / 2010 / Aujourd'hui -->
    <!-- ============================================================ -->
    <section class="relative px-4 sm:px-6 py-12 lg:px-0 lg:pt-[calc(127*var(--u))] lg:pb-0">
        <!-- Vertical line + animated markers (desktop) -->
        <div class="hidden lg:block absolute left-[calc(939*var(--u))] top-[calc(1*var(--u))] w-px h-[calc(2593*var(--u))] bg-[#0158ff]" aria-hidden="true"></div>
        @foreach ([[906, 163, 520], [906, 991, 520], [905, 1789, 740]] as [$dotX, $dotY, $travel])
            <img src="{{ asset('assets/img/figma_history_dot.svg') }}" alt="" aria-hidden="true"
                class="nxhist-dot hidden lg:block absolute w-[calc(67*var(--u))] h-auto"
                style="left: calc({{ $dotX }} * var(--u)); top: calc({{ $dotY }} * var(--u)); --travel: calc({{ $travel }} * var(--u));">
        @endforeach

        <!-- ===== 2003 ===== -->
        <div class="relative flex flex-col gap-10 lg:flex-row lg:items-start lg:gap-0">
            <!-- Photo collage (positions in % of the 667x711 Figma group) -->
            <div class="relative w-full aspect-[667/711] lg:w-[calc(667*var(--u))] lg:ml-[calc(150*var(--u))] lg:shrink-0">
                <div class="absolute left-0 top-0 w-full h-[35.30%] overflow-hidden rounded-[max(14px,calc(28*var(--u)))]">
                    <img src="{{ asset('assets/img/figma_history_collage_office.jpg') }}" alt="L'équipe NEXORA au travail" class="absolute left-[2.1%] top-[-11.97%] w-full h-[149.48%] max-w-none object-cover">
                </div>
                <img src="{{ asset('assets/img/figma_history_laptop.jpg') }}" alt="Une collaboratrice NEXORA sur son ordinateur" class="absolute left-[44.68%] top-[40.37%] w-[54.57%] h-[38.96%] object-cover rounded-[max(14px,calc(30*var(--u)))]">
                <img src="{{ asset('assets/img/figma_history_collage_team.jpg') }}" alt="Les talents NEXORA" class="absolute left-[1.80%] top-[64.56%] w-[54.57%] h-[35.44%] object-cover rounded-[max(14px,calc(30*var(--u)))]">
                <div class="absolute left-[1.65%] top-[22.78%] w-[51.72%] h-[40.93%] overflow-hidden rounded-[max(14px,calc(30*var(--u)))]">
                    <img src="{{ asset('assets/img/figma_history_collage_handshake.jpg') }}" alt="Une poignée de main chez NEXORA" class="absolute left-[0.25%] top-[0.09%] w-full h-[117.91%] max-w-none object-cover">
                </div>
            </div>

            <div class="lg:ml-[calc(218*var(--u))] lg:mt-[calc(42*var(--u))] lg:w-[calc(715*var(--u))]">
                <p class="{{ $year }}">2003</p>
                <h2 class="mt-4 lg:mt-[calc(21*var(--u))] lg:ml-[calc(3*var(--u))] lg:w-[calc(702*var(--u))] {{ $heading }}">DES ORIGINES ANCREES DANS L’AMBITION AFRICAINE</h2>
                <p class="mt-6 lg:mt-[calc(68*var(--u))] lg:ml-[calc(6*var(--u))] lg:w-[calc(709*var(--u))] {{ $body }}">Fondée par Monsieur Serge KADIO, en 2003 à Abidjan, en Côte d'Ivoire, NEXORA Digital SARL est née d'une vision audacieuse : faire de la technologie le moteur du développement économique africain. Portée par une équipe d'ingénieurs passionnés, la société a d'abord accompagné les entreprises locales dans l'intégration de leurs systèmes informatiques, posant les bases d'une expertise reconnue. Dès ses premières années d'activité, NEXORA s'est distinguée par sa rigueur technique, sa réactivité et sa capacité à livrer des solutions adaptées aux réalités du marché ivoirien et aux standards internationaux. Ancrée dans le tissu économique local, elle a rapidement établi sa réputation grâce à son sérieux, sa maîtrise technologique et son engagement sans faille envers ses clients.</p>
            </div>
        </div>

        <!-- ===== 2010 ===== -->
        <div class="relative mt-16 flex flex-col gap-10 lg:mt-[calc(131*var(--u))] lg:flex-row lg:items-start lg:gap-0">
            <div class="order-2 lg:order-none lg:ml-[calc(123*var(--u))] lg:mt-[calc(141*var(--u))] lg:w-[calc(715*var(--u))]">
                <p class="{{ $year }}">2010</p>
                <h2 class="mt-4 lg:mt-[calc(27.5*var(--u))] lg:ml-[calc(2*var(--u))] {{ $heading }} lg:leading-[1.575]">UN NOUVEAU CHAPITRE<br>ET UNE EXPANSION</h2>
                <p class="mt-6 lg:mt-[calc(4.5*var(--u))] lg:ml-[calc(6*var(--u))] lg:w-[calc(709*var(--u))] {{ $body }}">Au tournant de la décennie, forte de ses premiers succès, NEXORA a progressivement élargi son périmètre d'intervention, passant de Fondée en 2003 à Abidjan, en Côte d'Ivoire, NEXORA Digital SARL est née d'une vision audacieuse : faire de la technologie le moteur du développement économique africain. Portée par une équipe d'ingénieurs passionnés, la société a d'abord accompagné les entreprises locales dans l'intégration de leurs systèmes informatiques, posant les bases d'une expertise reconnue dès ses premières années d'activité.</p>
            </div>
            <img src="{{ asset('assets/img/figma_history_laptop.jpg') }}" alt="Une collaboratrice NEXORA devant le logo de l'entreprise"
                class="order-1 lg:order-none w-full aspect-[709/757] object-cover bg-[#d9d9d9] rounded-[max(20px,calc(30*var(--u)))] lg:w-[calc(709*var(--u))] lg:h-[calc(757*var(--u))] lg:aspect-auto lg:ml-[calc(203*var(--u))] lg:shrink-0">
        </div>

        <!-- ===== Aujourd'hui ===== -->
        <div class="relative mt-16 flex flex-col gap-10 lg:mt-[calc(77*var(--u))] lg:flex-row lg:items-start lg:gap-0">
            <div class="relative w-full aspect-[709/757] overflow-hidden rounded-[max(20px,calc(30*var(--u)))] lg:w-[calc(709*var(--u))] lg:ml-[calc(129*var(--u))] lg:shrink-0">
                <img src="{{ asset('assets/img/figma_history_today.jpg') }}" alt="Une poignée de main dans les bureaux NEXORA" class="absolute inset-0 w-full h-full object-cover">
                <!-- Wall sign: frosted tile + NEXORA "n" (Figma overlays on the photo) -->
                <span class="absolute left-[41.72%] top-[7.26%] w-[10.05%] h-[10.04%] -rotate-[1.43deg] rounded-[calc(13*var(--u))] bg-[#d9d9d9]/[0.03] shadow-[0_4px_4px_rgba(0,0,0,0.25)]" aria-hidden="true"></span>
                <img src="{{ asset('assets/img/figma_history_wall_logo.svg') }}" alt="" aria-hidden="true" class="absolute left-[42.88%] top-[8.85%] w-[7.62%] h-auto -rotate-[1.01deg]">
                <img src="{{ asset('assets/img/figma_history_wall_logo_flag.svg') }}" alt="" aria-hidden="true" class="absolute left-[42.88%] top-[8.85%] w-[2.84%] h-auto -rotate-[1.01deg]">
            </div>

            <div class="lg:ml-[calc(197*var(--u))] lg:mt-[calc(63*var(--u))] lg:w-[calc(715*var(--u))]">
                <p class="{{ $year }}">Aujourd'hui</p>
                <h2 class="mt-4 lg:mt-[calc(21*var(--u))] lg:ml-[calc(5*var(--u))] lg:w-[calc(702*var(--u))] {{ $heading }}">LES FONDEMENTS DU SUCCES : CLIENTS ET TALENT</h2>
                <p class="mt-6 lg:mt-[calc(63*var(--u))] lg:ml-[calc(6*var(--u))] lg:w-[calc(709*var(--u))] {{ $body }}">Notre succès est indéniablement dû en grande partie aux organisations et institutions pour lesquelles nous intervenons. Une compréhension approfondie des besoins de nos clients est primordiale pour mener à bien des projets de transformation numérique d'une telle envergure. Nous sommes fiers de notre partenariat avec de nombreuses entreprises et institutions renommées du continent, avec lesquelles nous avons tissé des relations de confiance durables. Par ailleurs, notre succès s'explique également par la qualité de nos collaborateurs. Nous accordons une grande importance à l'expertise, aux certifications, à la formation continue et au développement des jeunes talents africains.</p>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- PROJETS HISTORIQUES (horizontal scroller) -->
    <!-- ============================================================ -->
    <section x-data="{ step() { const card = $refs.track.querySelector('article'); return card ? card.offsetWidth + parseFloat(getComputedStyle($refs.track).columnGap || 0) : 300; } }"
        class="pt-16 pb-10 lg:pt-[calc(111*var(--u))] lg:pb-[calc(34*var(--u))]">
        <div class="flex items-center gap-6 px-4 sm:px-6 lg:px-0 lg:ml-[calc(93*var(--u))] lg:gap-0">
            <h2 class="font-eurostile font-bold uppercase leading-[1.43] text-2xl lg:w-[calc(669*var(--u))] lg:text-[max(18px,calc(35*var(--u)))]">PROJETS HISTORIQUES</h2>
            <div class="flex gap-3 lg:mt-[calc(6*var(--u))] lg:gap-[calc(15*var(--u))]">
                <button type="button" aria-label="Projets précédents" @click="$refs.track.scrollBy({ left: -step(), behavior: 'smooth' })"
                    class="relative flex items-center justify-center w-11 h-11 transition-transform duration-200 hover:scale-105 lg:w-[calc(46*var(--u))] lg:h-[calc(46*var(--u))]">
                    <img src="{{ asset('assets/img/figma_history_arrow_circle.svg') }}" alt="" class="absolute inset-0 w-full h-full">
                    <img src="{{ asset('assets/img/figma_history_arrow_left.svg') }}" alt="" class="relative w-4 h-auto -rotate-[178.46deg] lg:w-[calc(16.42*var(--u))]">
                </button>
                <button type="button" aria-label="Projets suivants" @click="$refs.track.scrollBy({ left: step(), behavior: 'smooth' })"
                    class="relative flex items-center justify-center w-11 h-11 transition-transform duration-200 hover:scale-105 lg:w-[calc(46*var(--u))] lg:h-[calc(46*var(--u))]">
                    <img src="{{ asset('assets/img/figma_history_arrow_circle.svg') }}" alt="" class="absolute inset-0 w-full h-full">
                    <img src="{{ asset('assets/img/figma_history_arrow.svg') }}" alt="" class="relative w-4 h-auto lg:w-[calc(16.42*var(--u))]">
                </button>
            </div>
        </div>

        <div x-ref="track" class="mt-8 flex gap-3 overflow-x-auto nx-scroll-hide [scrollbar-width:none] [&::-webkit-scrollbar]:hidden snap-x snap-mandatory scroll-pl-4 px-4 sm:px-6 lg:mt-[calc(48*var(--u))] lg:gap-[calc(11*var(--u))] lg:px-[calc(123*var(--u))] lg:scroll-pl-[calc(123*var(--u))]">
            @foreach ($projects as $project)
                <article class="snap-start shrink-0 flex flex-col w-[300px] min-h-[340px] rounded-[30px] bg-[#1f3688]/50 p-7 lg:w-[calc(558*var(--u))] lg:h-[calc(574*var(--u))] lg:min-h-0 lg:rounded-[calc(30*var(--u))] lg:pt-[calc(69*var(--u))] lg:pl-[calc(54*var(--u))] lg:pr-[calc(30*var(--u))] lg:pb-0">
                    <p class="leading-[1.21] text-2xl lg:text-[calc(32.7*var(--u))]">{{ $project['year'] }}</p>
                    <h3 class="mt-5 font-medium leading-[1.551] text-lg lg:mt-[calc(28.5*var(--u))] lg:ml-[calc(2*var(--u))] lg:text-[max(14px,calc(24.5*var(--u)))]">{{ $project['title'][0] }}<br>{{ $project['title'][1] }}</h3>
                    <p class="mt-5 leading-[1.571] text-base lg:mt-[calc(30*var(--u))] lg:ml-[calc(3*var(--u))] lg:text-[max(12px,calc(21*var(--u)))]">{{ $project['client'] }}<br>NEXORA Digital SARL</p>
                    <img src="{{ asset('assets/img/' . $project['logo']) }}" alt="" aria-hidden="true" class="mt-8 w-14 h-auto lg:mt-[calc(45*var(--u))] lg:ml-[calc(9*var(--u))] lg:w-[calc(69.4*var(--u))]">
                </article>
            @endforeach
        </div>
    </section>
</div>

@endsection
