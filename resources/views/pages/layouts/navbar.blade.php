@php
    $navLinks = [
        ['route' => 'home', 'label' => 'Maison'],
        ['route' => 'about', 'label' => 'A propos de nous', 'children' => [
            ['route' => 'about', 'label' => 'Qui sommes-nous ?'],
            ['route' => 'history', 'label' => 'Histoire et héritage'],
        ]],
        ['route' => 'service', 'label' => 'Services', 'match' => ['service.*']],
        ['route' => 'project', 'label' => 'Projet'],
    ];
    // Figma header is laid out at 1886px wide (17px Inter Medium); scale it down with the viewport
    $navText = 'text-[clamp(0.75rem,0.9vw,1.0625rem)]';
@endphp

<header class="absolute top-0 left-0 right-0 z-50 px-4 sm:px-6 lg:px-[clamp(1.5rem,1.86vw,2.1875rem)] pt-4 lg:pt-[clamp(1.25rem,1.9vw,2.25rem)] font-inter font-medium">
    <div class="flex flex-col items-center gap-3 lg:grid lg:grid-cols-[1fr_auto_1fr] lg:gap-6">

        <!-- Left Pill Switch: Solutions digitales / Transformation digitale -->
        <div x-data="{ activeTab: 'transformation' }" class="lg:justify-self-start flex items-center rounded-full border-4 border-[#0158ff] p-[3px] text-white leading-none {{ $navText }}">
            <button type="button" @click="activeTab = 'solutions'"
                :class="activeTab === 'solutions' ? 'bg-[#0158ff]' : 'hover:bg-white/10'"
                class="h-9 lg:h-[clamp(2.25rem,2.76vw,3.25rem)] min-w-[clamp(8rem,15vw,17.6875rem)] rounded-full px-[clamp(0.875rem,1.22vw,1.4375rem)] text-left whitespace-nowrap transition-colors duration-300">
                Solutions digitales
            </button>
            <button type="button" @click="activeTab = 'transformation'"
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
                    @php
                        $children = $link['children'] ?? [];
                        $active = request()->routeIs($link['route'], ...($link['match'] ?? []), ...array_column($children, 'route'));
                    @endphp
                    @if ($children)
                        <!-- Dropdown: the panel is teleported to <body> so the scrollable mobile capsule doesn't clip it -->
                        <div x-data="{
                                open: false, timer: null, top: 0, left: 0, openedAt: 0,
                                show() { clearTimeout(this.timer); const r = this.$refs.trigger.getBoundingClientRect(); this.top = r.bottom + 14; this.left = Math.max(8, r.left - 16); if (!this.open) this.openedAt = Date.now(); this.open = true; },
                                hide() { this.timer = setTimeout(() => this.open = false, 150); },
                                // A tap fires mouseenter then click: don't let that click close what the tap just opened
                                toggle() { if (this.open && Date.now() - this.openedAt > 300) { this.open = false; } else { this.show(); } },
                            }"
                            @mouseleave="hide()" @keydown.escape.window="open = false" @scroll.window="open = false" @resize.window="open = false">
                            <button type="button" x-ref="trigger" @mouseenter="show()" @click="toggle()"
                                aria-haspopup="true" :aria-expanded="open.toString()" @if ($active) aria-current="page" @endif
                                class="relative flex items-center gap-1.5 transition-colors hover:text-[#0158ff]">
                                {{ $link['label'] }}
                                <svg class="w-[0.6em] h-auto transition-transform duration-200" :class="open && 'rotate-180'" viewBox="0 0 10 6" fill="none" aria-hidden="true"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                @if ($active)
                                    <span class="absolute left-0 right-0 -bottom-[0.3em] h-px bg-[#0158ff]" aria-hidden="true"></span>
                                @endif
                            </button>
                            <template x-teleport="body">
                                <div x-show="open" x-cloak x-transition.opacity.duration.150ms
                                    @mouseenter="show()" @mouseleave="hide()" @click.outside="if (!$refs.trigger.contains($event.target)) open = false"
                                    :style="`top: ${top}px; left: ${left}px`"
                                    class="fixed z-[60] min-w-[14rem] rounded-2xl bg-white p-2 shadow-2xl font-inter font-medium text-black {{ $navText }}">
                                    @foreach ($children as $child)
                                        @php $childActive = request()->routeIs($child['route']); @endphp
                                        <a href="{{ route($child['route']) }}" @if ($childActive) aria-current="page" @endif
                                            class="block rounded-xl px-4 py-3 whitespace-nowrap transition-colors hover:bg-[#0158ff]/10 hover:text-[#0158ff] {{ $childActive ? 'text-[#0158ff]' : '' }}">
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </template>
                        </div>
                    @else
                        <a href="{{ route($link['route']) }}" @if ($active) aria-current="page" @endif class="relative transition-colors hover:text-[#0158ff]">
                            {{ $link['label'] }}
                            @if ($active)
                                <!-- Active page: 1px blue underline, as on "Maison" in Figma -->
                                <span class="absolute left-0 right-0 -bottom-[0.3em] h-px bg-[#0158ff]" aria-hidden="true"></span>
                            @endif
                        </a>
                    @endif
                @endforeach
            </div>

            <div class="group/cta ml-4 lg:ml-[clamp(1rem,2.1vw,2.5rem)] self-stretch shrink-0 flex items-center gap-2.5 lg:gap-[clamp(0.625rem,0.9vw,1.0625rem)] rounded-full bg-[#0158ff] pl-4 lg:pl-[clamp(1rem,1.27vw,1.5rem)] pr-1.5 lg:pr-[clamp(0.375rem,0.74vw,0.875rem)] text-white">
                <a href="{{ route('contact') }}" @if (request()->routeIs('contact')) aria-current="page" @endif class="transition-opacity hover:opacity-80">
                    Contactez-nous
                </a>
                <!-- Dark / Light theme toggle: the moon dissolves into a sun when the capsule is hovered (Figma "Component 5", dissolve 1.02s) -->
                <button type="button" aria-label="Basculer le thème" class="group relative flex items-center justify-center w-8 h-8 lg:w-[clamp(2rem,2.33vw,2.75rem)] lg:h-[clamp(2rem,2.33vw,2.75rem)] rounded-full bg-[#0d0d0d] transition-colors hover:bg-black">
                    <img src="{{ asset('assets/img/figma_nav_moon.svg') }}" alt="" class="w-4 lg:w-[45.5%] h-auto transition-opacity duration-[1022ms] ease-in-out group-hover/cta:opacity-0 group-focus-visible:opacity-0">
                    <img src="{{ asset('assets/img/figma_nav_sun.svg') }}" alt="" class="absolute left-1/2 top-1/2 w-5 lg:w-[54.5%] h-auto -translate-x-1/2 -translate-y-1/2 opacity-0 transition-opacity duration-[1022ms] ease-in-out group-hover/cta:opacity-100 group-focus-visible:opacity-100">
                </button>
            </div>
        </nav>

    </div>
</header>
