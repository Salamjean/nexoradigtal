@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - A propos de nous')

@section('content')

@php
    /*
     * Reproduces the Figma frame "Qui somme nosu ?" (221:1111), laid out at 1886px wide.
     * Desktop measurements use "u" units: --u = 1/1886 of the page width (see home.blade.php).
     */
    $team = [
        ['img' => 'figma_about_member_serge.jpg', 'name' => 'Serge Kadio', 'role' => ['Directeur Général'], 'patch' => true],
        ['img' => 'figma_about_member_carlos.jpg', 'name' => 'Carlos Riodan', 'role' => ['Directeur des Opérations Digitales']],
        ['img' => 'figma_about_member_fabiola.jpg', 'name' => 'Fabiola Khy', 'role' => ['PMP, ITIL v4, AWS Certified', 'Responsable Sécurité &', 'Conformité SI'], 'pin' => true],
        ['img' => 'figma_about_member_salam.jpg', 'name' => 'Salam Chedour', 'role' => ['Responsable Commercial & Contrats']],
        ['img' => 'figma_about_member_innes.jpg', 'name' => 'Innes Excellencia', 'role' => ['Responsable Projets Infrastructure']],
        ['img' => 'figma_about_member_khogo.jpg', 'name' => 'Khogo Soro', 'role' => ['Responsable Projets Infrastructure']],
    ];
@endphp

@include('pages.partials.figma-motion')

<style>
    /* Blue fade at the bottom of each portrait (Figma "Rectangle 80-88" overlays) */
    .nxa-portrait-shade {
        background-image: linear-gradient(179.23deg, rgba(1, 88, 255, 0.07) 30.535%, rgba(1, 85, 245, 0.08) 34.184%, rgba(1, 77, 223, 0.1) 42.064%, rgba(1, 70, 202, 0.12) 49.796%, rgba(1, 61, 178, 0.14) 58.419%, rgba(1, 62, 180, 0.16) 68.976%, rgba(1, 66, 191, 0.18) 77.897%, rgba(1, 70, 204, 0.18) 81.911%, rgba(1, 57, 166, 0.2) 90.879%, rgba(1, 55, 159, 0.3) 95.189%, rgba(1, 54, 156, 0.4) 97.344%, rgba(1, 53, 155, 0.5) 98.421%, rgba(1, 53, 154, 0.6) 98.96%, rgba(1, 53, 153, 0.7) 99.499%);
    }
</style>

<!-- Page background = Figma frame fill (#0158FF at 6%) over black -->
<div class="[container-type:inline-size] [--u:calc(100cqw/1886)] bg-[#00050f] font-inter text-white overflow-hidden lg:pb-[calc(41*var(--u))]">

    <!-- ============================================================ -->
    <!-- HERO -->
    <!-- ============================================================ -->
    <section class="nxh-hero relative overflow-hidden px-4 sm:px-6 pt-52 pb-12 lg:px-0 lg:pb-0 lg:pt-[calc(352*var(--u))] lg:h-[calc(909*var(--u))]">
        <video class="absolute inset-0 w-full h-full object-cover opacity-20 pointer-events-none" autoplay muted loop playsinline preload="auto" aria-hidden="true">
            <source src="{{ asset('assets/video/0_Person_Protective_Suit_3840x2160.mp4') }}" type="video/mp4">
        </video>

        <!-- Decorative brand mark "n" (top-left) -->
        <img src="{{ asset('assets/img/figma_about_hero_mark.svg') }}" alt="" aria-hidden="true"
            class="pointer-events-none select-none absolute top-0 left-[calc(-175*var(--u))] w-[calc(708*var(--u))] opacity-30">

        <div class="relative lg:pl-[calc(24*var(--u))]">
            <h1 class="font-eurostile font-bold uppercase whitespace-nowrap leading-[0.9] text-[calc(100*var(--u))] lg:text-[calc(115*var(--u))]" aria-label="QUI SOMME NOUS ?">
                {{-- Letters on one line: whitespace between inline-block spans would render as extra spaces --}}
                @foreach (mb_str_split('QUI SOMME NOUS ?') as $i => $char)<span class="nxh-letter" style="animation-delay: {{ number_format($i * 0.16, 2) }}s" aria-hidden="true">{{ $char === ' ' ? "\u{00A0}" : $char }}</span>@endforeach
            </h1>
            <div class="mt-1 w-28 h-px bg-[#0158ff] lg:mt-0 lg:ml-[calc(10*var(--u))] lg:w-[calc(112*var(--u))]"></div>
            <p class="mt-2.5 max-w-[800px] font-montserrat text-[#666] leading-[1.6] text-base lg:mt-[calc(9*var(--u))] lg:ml-[calc(11*var(--u))] lg:max-w-none lg:w-[calc(800*var(--u))] lg:text-[max(14px,calc(20*var(--u)))]">
                Depuis une décennie, NEXORA DIGITAL SARL accompagne les leaders africains dans leur quête d'excellence technologique.
            </p>
        </div>

        @include('pages.partials.hero-team-pill', ['cookie' => 'figma_about_cookie.svg'])
    </section>

    <!-- ============================================================ -->
    <!-- NOTRE EQUIPE (#DDDDDD at 13%) -->
    <!-- ============================================================ -->
    <section class="bg-[#dddddd]/[0.13] px-4 sm:px-6 py-12 lg:px-0 lg:pt-[calc(76*var(--u))] lg:pb-[calc(68*var(--u))]">
        <div class="overflow-hidden rounded-3xl bg-[#0158ff]/[0.37] flex flex-col lg:flex-row lg:ml-[calc(34*var(--u))] lg:w-[calc(1829*var(--u))] lg:min-h-[calc(921*var(--u))] lg:rounded-[calc(29*var(--u))]">
            <img src="{{ asset('assets/img/figma_about_team_photo.jpg') }}" alt="L'équipe NEXORA au bureau"
                class="w-full h-72 sm:h-96 object-cover lg:h-auto lg:w-[calc(908*var(--u))] lg:shrink-0">

            <div class="p-6 sm:p-10 lg:p-0 lg:pl-[calc(74*var(--u))] lg:pt-[calc(99*var(--u))] lg:pb-[calc(60*var(--u))]">
                <p class="font-medium leading-[1.21] text-lg lg:text-[max(14px,calc(21*var(--u)))]">Notre équipe</p>
                <h2 class="mt-6 font-eurostile font-bold uppercase leading-[1.8] text-[22px] lg:mt-[calc(51*var(--u))] lg:whitespace-nowrap lg:text-[max(16px,calc(30*var(--u)))]">UNE EQUIPE PROFESSIONNELLE</h2>
                <p class="mt-8 font-light text-[#888] text-justify whitespace-pre-wrap leading-[1.571] text-base lg:mt-[calc(57*var(--u))] lg:w-[calc(726*var(--u))] lg:text-[max(13px,calc(21*var(--u)))]">La force de NEXORA réside dans la qualité de ses talents. Notre équipe dirigeante s'engage à bâtir l'excellence numérique de demain en conjuguant  avec passion l'expertise de nos consultants seniors à l'ambition  et à l'audace de nos jeunes talents, unis pour accélérer la transformation  digitale en Afrique.</p>
                <a href="#equipe" class="mt-8 inline-flex items-center justify-between gap-4 h-14 rounded-full border border-white pl-6 pr-4 font-medium text-[15px] whitespace-nowrap transition-shadow duration-300 hover:shadow-[0_0_20px_4px_rgba(1,88,255,0.45)] lg:mt-[calc(74*var(--u))] lg:h-[calc(66*var(--u))] lg:min-w-[calc(354*var(--u))] lg:pl-[calc(30*var(--u))] lg:pr-[calc(6*var(--u))] lg:text-[max(12px,calc(17.5*var(--u)))]">
                    Découvrez l’équipe de direction
                    <span class="flex shrink-0 items-center justify-center w-6 lg:w-[calc(22*var(--u))]">
                        <img src="{{ asset('assets/img/figma_home_btn_flag.svg') }}" alt="" class="w-3.5 h-auto rotate-[73.96deg] lg:w-[calc(17.47*var(--u))]">
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- EQUIPE DE DIRECTION (white) -->
    <!-- ============================================================ -->
    <section id="equipe" class="scroll-mt-8 bg-white text-black px-4 sm:px-6 py-12 lg:px-0 lg:pt-[calc(74*var(--u))] lg:pb-0">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-[repeat(3,calc(557*var(--u)))] lg:gap-x-[calc(14.5*var(--u))] lg:gap-y-[calc(29*var(--u))] lg:ml-[calc(86*var(--u))]">
            @foreach ($team as $member)
                <article class="lg:min-h-[calc(926*var(--u))]">
                    <div class="relative overflow-hidden rounded-[32px] aspect-[557/743] lg:aspect-auto lg:h-[calc(743*var(--u))] lg:rounded-[calc(32*var(--u))]">
                        <img src="{{ asset('assets/img/' . $member['img']) }}" alt="{{ $member['name'] }}" class="absolute inset-0 w-full h-full object-cover">
                        @if (!empty($member['patch']))
                            <!-- Figma patch covering a mark on the photo -->
                            <span class="absolute left-[90.13%] top-[93.81%] w-[6.64%] aspect-square bg-[#342f29]" aria-hidden="true"></span>
                        @endif
                        @if (!empty($member['pin']))
                            <img src="{{ asset('assets/img/figma_about_pin_logo.svg') }}" alt="" aria-hidden="true" class="absolute left-[51.71%] top-[66.49%] w-[4.67%] h-auto">
                        @endif
                        <span class="nxa-portrait-shade absolute inset-0" aria-hidden="true"></span>
                    </div>
                    <h3 class="mt-5 leading-[1.21] text-3xl lg:mt-[calc(25*var(--u))] lg:text-[calc(35*var(--u))]">{{ $member['name'] }}</h3>
                    <p class="mt-2 font-medium leading-[1.524] text-lg lg:mt-[calc(11*var(--u))] lg:text-[max(13px,calc(21*var(--u)))]">{!! collect($member['role'])->map(fn ($line) => e($line))->implode('<br>') !!}</p>
                </article>
            @endforeach
        </div>
    </section>
</div>

@include('pages.partials.phone-button', ['pulse' => 'nxh-phone-3'])

@endsection
