{{-- Floating phone button (fixed bottom-right, pulses like in Figma). Param: $pulse = 'nxh-phone-35' | 'nxh-phone-3' --}}
<a href="tel:+2250171755000" aria-label="Appelez NEXORA"
    class="{{ $pulse }} fixed bottom-6 right-6 z-40 flex items-center justify-center w-14 h-14 lg:w-[61px] lg:h-[61px]">
    <img src="{{ asset('assets/img/figma_home_phone_circle.svg') }}" alt="" class="absolute inset-0 w-full h-full">
    <img src="{{ asset('assets/img/figma_home_phone.svg') }}" alt="" class="relative w-7 lg:w-8 h-auto">
</a>
