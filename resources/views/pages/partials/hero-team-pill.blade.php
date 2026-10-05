{{-- Hero "Découvrez l'équipe derrière NEXORA" pill + cookie button (Figma 1886px frames). Param: $cookie (svg file name) --}}
<div class="relative mt-10 pl-6 lg:pl-0 lg:mt-0 lg:absolute lg:left-[calc(35*var(--u))] lg:top-[calc(801*var(--u))]">
    <a href="{{ route('about') }}#equipe" class="flex items-center gap-3 lg:gap-[calc(17*var(--u))] transition-opacity hover:opacity-90">
        <span class="flex items-center rounded-full bg-white/[0.67] h-14 pl-1 pr-1.5 lg:h-[calc(75*var(--u))] lg:pl-[calc(5.5*var(--u))] lg:pr-[calc(8*var(--u))]">
            @foreach (range(1, 5) as $n)
                <img src="{{ asset('assets/img/figma_home_avatar_' . $n . '.png') }}" alt=""
                    class="w-11 h-11 lg:w-[calc(60*var(--u))] lg:h-[calc(60*var(--u))] rounded-full {{ $n > 1 ? '-ml-3 lg:-ml-[calc(15*var(--u))]' : '' }}">
            @endforeach
        </span>
        <span class="font-montserrat font-medium leading-[0.9] text-sm lg:text-[max(12px,calc(20*var(--u)))]">Découvrez l'équipe derrière NEXORA</span>
    </a>
    <button type="button" aria-label="Gestion des cookies"
        class="absolute left-0 top-6 w-11 h-11 lg:left-[calc(-13*var(--u))] lg:top-[calc(33*var(--u))] lg:w-[calc(56*var(--u))] lg:h-[calc(56*var(--u))] rounded-full transition-transform duration-300 hover:scale-105">
        <img src="{{ asset('assets/img/' . $cookie) }}" alt="" class="w-full h-full">
    </button>
</div>
