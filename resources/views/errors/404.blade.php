@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - Page introuvable')

{{-- Footer sits on the same Figma frame fill as the page --}}
@section('footer_bg', 'bg-[#000d26]')

@section('content')

{{--
    Error 404 page, after the Figma frame "Erreur 404" (732:949) laid out at 1886px wide.
    Desktop measurements use "u" units: --u = 1/1886 of the page width (see home.blade.php).
--}}
@include('pages.partials.figma-motion')

<!-- Page background = Figma frame fill (#0158FF at 15%) over black -->
<div class="[container-type:inline-size] [--u:calc(100cqw/1886)] bg-[#000d26] font-inter text-white overflow-hidden">
    <section class="nxh-hero relative overflow-hidden min-h-[80vh] px-4 sm:px-6 pt-52 pb-16 lg:min-h-0 lg:px-0 lg:pb-0 lg:pl-[calc(22*var(--u))] lg:pt-[calc(342*var(--u))] lg:h-[calc(963*var(--u))]">
        <video class="absolute inset-x-0 top-0 w-full h-full object-cover opacity-20 pointer-events-none lg:h-[calc(909*var(--u))]" autoplay muted loop playsinline preload="auto" aria-hidden="true">
            <source src="{{ asset('assets/video/1107905_1080p_4k_3840x2160.mp4') }}" type="video/mp4">
        </video>

        <!-- Decorative brand mark "n" (top-left) -->
        <img src="{{ asset('assets/img/figma_about_hero_mark.svg') }}" alt="" aria-hidden="true"
            class="pointer-events-none select-none absolute top-0 left-[calc(-175*var(--u))] w-[calc(708*var(--u))] opacity-30">

        <div class="relative">
            <h1 class="font-eurostile font-bold uppercase whitespace-nowrap leading-[0.9] text-[calc(150*var(--u))] lg:text-[calc(115*var(--u))]" aria-label="Erreur 404">
                {{-- Letters on one line: whitespace between inline-block spans would render as extra spaces --}}
                @foreach (mb_str_split('ERREUR 404') as $i => $char)<span class="nxh-letter" style="animation-delay: {{ number_format($i * 0.16, 2) }}s" aria-hidden="true">{{ $char === ' ' ? "\u{00A0}" : $char }}</span>@endforeach
            </h1>

            <p class="mt-6 max-w-[800px] font-montserrat text-[#666] leading-[1.3] text-base lg:mt-[calc(38.5*var(--u))] lg:ml-[calc(13*var(--u))] lg:max-w-none lg:w-[calc(800*var(--u))] lg:text-[max(14px,calc(20*var(--u)))]">
                Désolé, la page que vous cherchez a été déplacée ou n’existe plus.<br>
                Veuillez utiliser le bouton ci-dessous pour retourner à la page d’accueil.
            </p>

            <a href="{{ route('home') }}"
                class="mt-8 inline-flex items-center justify-between gap-4 h-14 rounded-full border border-[#0158ff] pl-6 pr-2 font-medium text-base whitespace-nowrap transition-shadow duration-300 hover:shadow-[0_0_20px_4px_rgba(1,88,255,0.45)] lg:mt-[calc(49*var(--u))] lg:ml-[calc(24*var(--u))] lg:h-[calc(63*var(--u))] lg:min-w-[calc(295*var(--u))] lg:pl-[calc(24*var(--u))] lg:pr-[calc(9*var(--u))] lg:text-[max(13px,calc(20*var(--u)))]">
                Retour à l’accueil
                <span class="flex shrink-0 items-center justify-center w-10 h-10 rounded-full bg-[#0158ff] lg:w-[calc(47*var(--u))] lg:h-[calc(47*var(--u))]">
                    <img src="{{ asset('assets/img/figma_home_btn_flag.svg') }}" alt="" class="w-3.5 h-auto rotate-[73.96deg] lg:w-[calc(17.47*var(--u))]">
                </span>
            </a>
        </div>

        <!-- Cookie button (bottom-left) -->
        <button type="button" aria-label="Gestion des cookies"
            class="relative mt-10 block w-11 h-11 rounded-full transition-transform duration-300 hover:scale-105 lg:mt-0 lg:absolute lg:left-[calc(22*var(--u))] lg:top-[calc(834*var(--u))] lg:w-[calc(56*var(--u))] lg:h-[calc(56*var(--u))]">
            <img src="{{ asset('assets/img/figma_about_cookie.svg') }}" alt="" class="w-full h-full">
        </button>
    </section>
</div>

@endsection
