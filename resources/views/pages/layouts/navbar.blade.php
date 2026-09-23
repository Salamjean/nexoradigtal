@php
    $navLinks = [
        ['route' => 'home', 'label' => 'Accueil'],
        ['route' => 'about', 'label' => 'A propos de nous'],
        ['route' => 'service', 'label' => 'Services'],
        ['route' => 'project', 'label' => 'Projet'],
    ];
    // Figma nav text is 17px at 1886px wide; scale it down with the viewport
    $navText = 'text-[clamp(0.75rem,0.9vw,1.0625rem)]';
@endphp

<header class="absolute top-0 left-0 right-0 z-50 px-4 sm:px-6 lg:px-9 pt-4 lg:pt-[clamp(1.25rem,1.9vw,2.25rem)] font-inter font-medium">
    <div class="mx-auto max-w-[1822px] flex flex-col items-center gap-3 lg:grid lg:grid-cols-[1fr_auto_1fr] lg:gap-6">

        <!-- Left Pill Switch: Solutions Digitales / Transformation Digitale -->
        <div x-data="{ activeTab: 'transformation' }" class="lg:justify-self-start flex items-center rounded-full border-4 border-[#0158ff] p-[3px] text-white leading-none {{ $navText }}">
            <button
                type="button"
                @click="activeTab = 'solutions'"
                :class="activeTab === 'solutions' ? 'bg-[#0158ff]' : 'hover:bg-white/10'"
                class="h-9 lg:h-[clamp(2.25rem,2.76vw,3.25rem)] min-w-[clamp(8rem,15vw,17.6875rem)] rounded-full px-[clamp(0.875rem,1.22vw,1.4375rem)] text-left whitespace-nowrap transition-colors duration-300">
                Solutions digitales
            </button>
            <button
                type="button"
                @click="activeTab = 'transformation'"
                :class="activeTab === 'transformation' ? 'bg-[#0158ff]' : 'hover:bg-white/10'"
                class="h-9 lg:h-[clamp(2.25rem,2.76vw,3.25rem)] min-w-[clamp(9rem,13.8vw,16.25rem)] rounded-full px-[clamp(0.875rem,1.8vw,2.125rem)] whitespace-nowrap transition-colors duration-300">
                Transformation digitale
            </button>
        </div>

        <!-- Center Logo -->
        <a href="{{ route('home') }}" class="shrink-0 transition-transform duration-300 hover:scale-105">
            <img src="{{ asset('assets/img/figma_nav_logo.svg') }}" alt="NEXORA DIGITAL SARL" class="w-10 lg:w-[clamp(3rem,4.67vw,5.5rem)] h-auto">
        </a>

        <!-- Right Navigation: white capsule + blue "Contactez-nous" end with theme toggle -->
        <nav class="lg:justify-self-end max-w-full overflow-x-auto lg:overflow-visible nx-scroll-hide [scrollbar-width:none] [&::-webkit-scrollbar]:hidden flex items-center h-11 lg:h-[clamp(2.75rem,3.34vw,3.9375rem)] rounded-full bg-white pl-5 lg:pl-[clamp(1.5rem,3vw,3.5625rem)] text-black whitespace-nowrap shadow-2xl {{ $navText }}">
            <div class="flex items-center gap-5 lg:gap-[clamp(1.5rem,3.34vw,3.9375rem)]">
                @foreach ($navLinks as $link)
                    <a href="{{ route($link['route']) }}" @if (request()->routeIs($link['route'])) aria-current="page" @endif
                        class="transition-colors hover:text-[#0158ff] aria-[current=page]:text-[#0158ff]">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <div class="ml-4 lg:ml-[clamp(1rem,2.1vw,2.5rem)] self-stretch shrink-0 flex items-center gap-2.5 lg:gap-[clamp(0.625rem,0.9vw,1.0625rem)] rounded-full bg-[#0158ff] pl-4 lg:pl-[clamp(1rem,1.27vw,1.5rem)] pr-1.5 lg:pr-[clamp(0.375rem,0.74vw,0.875rem)] text-white">
                <a href="{{ route('contact') }}" @if (request()->routeIs('contact')) aria-current="page" @endif class="transition-opacity hover:opacity-80">
                    Contactez-nous
                </a>

                <!-- Dark / Light theme toggle moon button -->
                <button type="button" aria-label="Basculer le thème" class="flex items-center justify-center w-8 h-8 lg:w-[clamp(2rem,2.33vw,2.75rem)] lg:h-[clamp(2rem,2.33vw,2.75rem)] rounded-full bg-[#0d0d0d] transition-colors hover:bg-black">
                    <img src="{{ asset('assets/img/figma_nav_moon.svg') }}" alt="" class="w-4 lg:w-5 h-auto">
                </button>
            </div>
        </nav>

    </div>
</header>
