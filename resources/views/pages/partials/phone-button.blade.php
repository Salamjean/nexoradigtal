{{--
    Floating phone button (fixed bottom-right, pulses like in Figma). Param: $pulse = 'nxh-phone-35' | 'nxh-phone-3'
    Same size as the hero cookie button: 44px on mobile, 56px on the 1886px frame (2.97vw) on desktop.
--}}
<a href="tel:+2250171755000" aria-label="Appelez NEXORA"
    class="{{ $pulse }} fixed bottom-6 right-6 z-40 flex items-center justify-center w-11 h-11 lg:w-[2.97vw] lg:h-[2.97vw]">
    <img src="{{ asset('assets/img/figma_home_phone_circle.svg') }}" alt="" class="absolute inset-0 w-full h-full">
    <img src="{{ asset('assets/img/figma_home_phone.svg') }}" alt="" class="relative w-[52%] h-auto">
</a>
