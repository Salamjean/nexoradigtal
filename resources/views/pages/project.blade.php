@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - Projets réalisés')

@section('content')

@php
    /*
     * Reproduces the Figma frame "Projets réalisés" (488:1771), laid out at 1886px wide.
     * Desktop measurements use "u" units: --u = 1/1886 of the page width (see home.blade.php).
     *
     * Project rows (edited in /admin/projets) repeat every 737px. The Figma styling of the first five rows is kept by position:
     * x = image left (the Figma rows drift 2px to the left each time), t = title top in the row (by number of lines),
     * tx = title offset from the details column, and the value colours (muted / grey / white). Extra rows use the defaults.
     */
    $muted = 'text-[#888]/[0.53]';
    $grey = 'text-[#888]';
    $white = 'text-white';
    $styles = [
        ['tx' => -7, 'colors' => [$muted, $grey, $white]],
        ['tx' => -1, 'colors' => [$grey, $grey, $grey]],
        ['tx' => -1, 'colors' => [$grey, $grey, $white]],
        ['tx' => 1, 'colors' => [$grey, $grey, $grey]],
        ['tx' => 2, 'colors' => [$grey, $grey, $grey]],
    ];
    $rows = $projects->values()->map(function ($project, $i) use ($styles, $grey, $white) {
        $title = str_replace(["\r\n", "\r"], "\n", trim($project->title));
        $lines = substr_count($title, "\n") + 1;
        $style = $styles[$i] ?? ['tx' => -1, 'colors' => [$grey, $grey, $white]];
        // Figma title tops: one line at +20 (+39 on the last row), two lines at +9 / +7 / +20
        $t = [20, 9, 7, 20, 39][$i] ?? ($lines > 1 ? 9 : 20);

        return [
            'img' => $project->imageUrl(), 'x' => max(95 - 2 * $i, 75), 't' => $t, 'tx' => $style['tx'], 'title' => $title, 'lines' => $lines,
            'date' => [$project->period, $style['colors'][0]], 'client' => [$project->client, $style['colors'][1]], 'by' => [$project->provider, $style['colors'][2]],
        ];
    });
@endphp

@include('pages.partials.figma-motion')

<!-- Page background = Figma frame fill (#0158FF at 6%) over black -->
<div class="[container-type:inline-size] [--u:calc(100cqw/1886)] bg-[#00050f] font-inter text-white overflow-hidden">

    <!-- ============================================================ -->
    <!-- HERO -->
    <!-- ============================================================ -->
    @include('pages.partials.page-hero', [
        'title' => 'PROJETS REALISES',
        'video' => '1107905_1080p_4k_3840x2160.mp4',
        'titleX' => 24,
        'pills' => [
            ['label' => 'Renseignement généraux', 'href' => route('contact') . '#renseignements'],
            ['label' => 'Renseignement généraux', 'href' => route('contact') . '#carrieres'],
        ],
    ])

    <!-- ============================================================ -->
    <!-- ETUDE DE CAS VEDETTE -->
    <!-- ============================================================ -->
    <section class="relative px-4 sm:px-6 pt-14 lg:px-0 lg:pl-[calc(94*var(--u))] lg:pt-[calc(230*var(--u))] lg:min-h-[calc(641*var(--u))]">
        <p class="font-medium leading-[1.21] text-lg lg:text-[max(14px,calc(21*var(--u)))]">{{ Site::get('case_label') }}</p>
        <h2 class="mt-4 font-eurostile font-bold uppercase leading-[1.3] text-[23px] sm:text-[32px] lg:leading-[1.8] lg:mt-[calc(54.6*var(--u))] lg:-ml-px lg:text-[max(20px,calc(40*var(--u)))]">{{ Site::get('case_title') }}</h2>
        <p class="mt-5 font-medium text-[#888] text-justify leading-[1.21] text-base lg:mt-[calc(37*var(--u))] lg:w-[calc(1119*var(--u))] lg:text-[max(13px,calc(20.8*var(--u)))]">{{ Site::get('case_text') }}</p>

        <a href="{{ route('contact') }}"
            class="mt-8 inline-flex items-center justify-between gap-4 h-14 rounded-full border border-white pl-6 pr-2 font-medium text-[15px] whitespace-nowrap transition-shadow duration-300 hover:shadow-[0_0_20px_4px_rgba(1,88,255,0.45)] lg:mt-0 lg:absolute lg:left-[calc(1494*var(--u))] lg:top-[calc(476*var(--u))] lg:h-[calc(65*var(--u))] lg:min-w-[calc(301*var(--u))] lg:pl-[calc(26*var(--u))] lg:pr-[calc(7*var(--u))] lg:text-[max(12px,calc(17.2*var(--u)))]">
            Contacter notre équipe
            <span class="flex shrink-0 items-center justify-center w-10 h-10 rounded-full bg-[#0158ff] lg:w-[calc(49*var(--u))] lg:h-[calc(49*var(--u))]">
                <img src="{{ asset('assets/img/figma_home_btn_flag.svg') }}" alt="" class="w-3.5 h-auto rotate-[73.96deg] lg:w-[calc(17.47*var(--u))]">
            </span>
        </a>
    </section>

    <div class="px-4 sm:px-6 mt-10 lg:mt-0 lg:px-0 lg:pl-[calc(93*var(--u))]">
        <img src="{{ \App\Support\Media::url(Site::get('case_image')) }}" alt="{{ Site::get('case_title') }}"
            class="w-full h-60 sm:h-96 object-cover rounded-3xl lg:w-[calc(1701*var(--u))] lg:h-[calc(744*var(--u))] lg:rounded-[calc(29*var(--u))]">
    </div>

    <!-- ============================================================ -->
    <!-- PROJECT ROWS -->
    <!-- ============================================================ -->
    <section class="px-4 sm:px-6 pt-14 pb-16 lg:px-0 lg:pt-[calc(84*var(--u))] lg:pb-[calc(82*var(--u))]">
        @foreach ($rows as $i => $project)
            <article class="{{ $i > 0 ? 'mt-12 lg:mt-[calc(49*var(--u))]' : '' }} lg:ml-[calc(var(--x)*var(--u))]" style="--x: {{ $project['x'] }}; --t: {{ $project['t'] }}; --tx: {{ $project['tx'] }}; --lines: {{ $project['lines'] }}">
                <div class="flex flex-col gap-8 lg:flex-row lg:gap-0">
                    <img src="{{ $project['img'] }}" alt="{{ str_replace("\n", ' ', $project['title']) }}" loading="lazy"
                        class="w-full aspect-[849/637] object-cover rounded-3xl lg:shrink-0 lg:aspect-auto lg:w-[calc(849*var(--u))] lg:h-[calc(637*var(--u))] lg:rounded-[calc(29*var(--u))]">

                    <div class="lg:ml-[calc(75*var(--u))] lg:w-[calc(774*var(--u))]">
                        <h3 class="font-eurostile font-bold uppercase leading-[1.15] text-xl sm:text-2xl lg:leading-none lg:whitespace-nowrap lg:mt-[calc(var(--t)*var(--u))] lg:ml-[calc(var(--tx)*var(--u))] lg:text-[max(16px,calc(30*var(--u)))]">{!! str_replace("\n", ' <br class="hidden lg:inline">', e($project['title'])) !!}</h3>

                        <dl class="mt-6 font-medium lg:mt-[calc((122_-_var(--t)_-_30_*_var(--lines))*var(--u))]">
                            @foreach ([['Date', $project['date']], ['Client', $project['client']], ['Prestataire principal', $project['by']]] as $j => [$label, [$value, $color]])
                                @if ($j > 0)
                                    <div class="my-5 h-0.5 bg-[#d9d9d9] lg:mt-[calc(42*var(--u))] lg:mb-[calc(33*var(--u))]" aria-hidden="true"></div>
                                @endif
                                <dt class="leading-[1.21] text-base lg:text-[max(12px,calc(20.8*var(--u)))]">{{ $label }}</dt>
                                <dd class="mt-2 leading-[1.21] text-lg lg:mt-[calc(14.8*var(--u))] lg:text-[max(14px,calc(26.5*var(--u)))] {{ $color }}">{{ $value }}</dd>
                            @endforeach
                        </dl>
                    </div>
                </div>
                @unless ($loop->last)
                    <div class="mt-8 h-0.5 bg-[#d9d9d9] lg:mt-[calc(49*var(--u))] lg:w-[calc(1697*var(--u))]" aria-hidden="true"></div>
                @endunless
            </article>
        @endforeach
    </section>
</div>

@endsection
