<footer class="bg-[#1b2149] text-slate-400 pt-16 pb-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-blue-900/10 via-transparent to-transparent pointer-events-none"></div>

    <!-- Decorative brand mark "n" bleeding off the bottom-right corner -->
    <div class="absolute bottom-0 right-0 h-full w-[45%] max-w-[500px] pointer-events-none select-none overflow-hidden flex items-end justify-end z-0">
        <img src="{{ asset('assets/img/LOGONEXORA.png') }}" alt="" aria-hidden="true"
            class="h-[95%] w-auto object-contain object-right-bottom translate-x-4 translate-y-2 opacity-100">
    </div>

    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 relative z-10">

        <!-- Title: NEXORA DIGITAL SARL -->
        <h2 class="text-white font-eurostile font-bold uppercase text-2xl sm:text-4xl lg:text-[44px] leading-tight tracking-wide mb-4"
            style="font-family: 'Eurostile Extended', sans-serif; font-weight: 700; color: #FFFFFF;">
            NEXORA DIGITAL SARL
        </h2>

        <!-- Subtitle: Votre partenaire en transformation digitale -->
        <p class="font-sans font-normal text-3xl sm:text-5xl lg:text-[52px] leading-[1.15] text-[#0158FF] mb-8"
            style="font-family: 'Inter', sans-serif; font-weight: 400; color: #0158FF;">
            <span class="inline-block border border-[#0158FF] px-2 py-0.5 mb-1">Votre partenaire</span><br>
            en transformation<br>
            digitale
        </p>

        <!-- Horizontal line + contact details -->
        <div class="border-t border-white/20 w-80 sm:w-96 pt-6 space-y-2 mb-8">
            <p class="text-white text-base sm:text-lg font-medium">
                <a href="tel:+2250171755000" class="hover:text-blue-400 transition-colors duration-200">+225 01 71 75 50 00</a>
            </p>
            <p class="text-white text-base sm:text-lg font-medium">
                <a href="mailto:contact@nexora-digital.com" class="hover:text-blue-400 transition-colors duration-200">contact@nexora-digital.com</a>
            </p>
        </div>

        <!-- Mentions légales -->
        <div class="space-y-1.5 mb-8 text-xs text-slate-400">
            <p><a href="#" class="hover:text-white transition-colors duration-200">Mentions légales</a></p>
            <p><a href="#" class="hover:text-white transition-colors duration-200">politique de confidentialité</a></p>
        </div>

        <!-- Copyright -->
        <p class="text-xs text-slate-500">&copy; {{ date('Y') }} NEXORA DIGITAL SARL</p>
    </div>
</footer>
