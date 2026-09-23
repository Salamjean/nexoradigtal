@php
    // Figma footer is laid out at 1886px wide; sizes scale down with the viewport
    $footerSmall = 'text-[clamp(0.8125rem,0.76vw,0.894rem)] font-medium';
@endphp

<footer class="relative overflow-hidden bg-[#00050f] text-white font-inter px-4 sm:px-6 lg:px-[clamp(2.25rem,2.65vw,3.125rem)] pt-20 lg:pt-[clamp(5rem,9.9vw,11.625rem)] pb-10 lg:pb-[45px]">

    <!-- Decorative brand mark "n" bleeding off the bottom-right corner -->
    <div class="pointer-events-none select-none absolute right-0 bottom-0 w-[36.7vw] max-w-[692px] translate-x-[28.5%] translate-y-[13.25%]" aria-hidden="true">
        <img src="{{ asset('assets/img/figma_footer_mark.svg') }}" alt="" class="block w-full h-auto">
        <img src="{{ asset('assets/img/figma_footer_mark_flag.svg') }}" alt="" class="absolute -left-px top-0 w-[24.4%] h-auto">
    </div>

    <div class="relative z-10 mx-auto max-w-[1822px]">

        <h2 class="nx-display uppercase whitespace-nowrap text-[clamp(1.25rem,3.7vw,4.375rem)] leading-[0.9]">
            NEXORA DIGITAL SARL
        </h2>

        <p class="mt-10 lg:mt-[clamp(2.5rem,5.3vw,6.25rem)] text-[#0158ff] text-[clamp(2rem,3.7vw,4.375rem)] leading-[1.27]">
            Votre partenaire<br>
            en transformation<br>
            digitale
        </p>

        <div class="mt-10 lg:mt-[clamp(2.5rem,6.7vw,7.875rem)] h-px w-full max-w-[609px] sm:w-[clamp(15rem,32.3vw,38.0625rem)] bg-[#d9d9d9]"></div>

        <div class="mt-8 lg:mt-[clamp(1.5rem,3.6vw,4.25rem)] text-[clamp(1.125rem,1.96vw,2.3125rem)] leading-[1.22]">
            <p><a href="tel:+2250171755000" class="transition-colors duration-200 hover:text-[#0158ff]">+225 01 71 75 50 00</a></p>
            <p><a href="mailto:contact@nexora-digital.com" class="transition-colors duration-200 hover:text-[#0158ff]">contact@nexora-digital.com</a></p>
        </div>

        <ul class="mt-10 lg:mt-[clamp(2rem,3.8vw,4.5rem)] space-y-[25px] leading-[0.9] {{ $footerSmall }}">
            <li><a href="#" class="transition-colors duration-200 hover:text-[#0158ff]">Mentions légales</a></li>
            <li><a href="#" class="transition-colors duration-200 hover:text-[#0158ff]">politique de confidentialité</a></li>
        </ul>

        <p class="mt-14 lg:mt-[75px] leading-[19.5px] {{ $footerSmall }}">&copy; {{ date('Y') }} NEXORA DIGITAL SARL</p>
    </div>
</footer>
