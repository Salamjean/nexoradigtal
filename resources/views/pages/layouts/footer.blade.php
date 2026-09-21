<footer class="bg-[#020514] text-slate-400 pt-16 pb-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-blue-900/15 via-transparent to-transparent pointer-events-none"></div>

    <!-- Phone icon button at top right -->
    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 relative">
        <a href="tel:+2250171755000" aria-label="Appelez-nous" class="hidden sm:flex absolute top-0 right-6 lg:right-16 w-11 h-11 rounded-full border border-white/20 hover:border-white text-white items-center justify-center transition-all duration-300 hover:scale-105 hover:bg-white/10 z-20">
            <i class="fa-solid fa-phone text-sm"></i>
        </a>
    </div>

    <!-- Decorative brand mark "n" bleeding off the bottom-right corner -->
    <div class="absolute bottom-0 right-0 h-[90%] w-[45%] max-w-[400px] pointer-events-none select-none overflow-hidden flex items-end justify-end z-0">
        <img src="{{ asset('assets/img/LOGONEXORA.png') }}" alt="" aria-hidden="true"
            class="h-full w-full object-contain object-right-bottom translate-x-6 translate-y-2 opacity-95">
    </div>

    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 relative z-10">

        <h2 class="text-white font-heading font-black text-2xl sm:text-4xl uppercase mb-3 tracking-tight">
            NEXORA DIGITAL SARL
        </h2>
        <p class="text-blue-500 font-heading font-bold text-3xl sm:text-5xl leading-[1.15] mb-8">
            Votre partenaire<br>
            en transformation<br>
            digitale
        </p>

        <div class="border-t border-white/20 w-48 sm:w-64 pt-6 space-y-2 mb-8">
            <p class="text-white text-base sm:text-lg font-medium">
                <a href="tel:+2250171755000" class="hover:text-blue-400 transition-colors duration-200">+225 01 71 75 50 00</a>
            </p>
            <p class="text-white text-base sm:text-lg font-medium">
                <a href="mailto:contact@nexora-digital.com" class="hover:text-blue-400 transition-colors duration-200">contact@nexora-digital.com</a>
            </p>
        </div>

        <div class="space-y-1.5 mb-8 text-xs text-slate-400">
            <p><a href="#" class="hover:text-white transition-colors duration-200">Mentions légales</a></p>
            <p><a href="#" class="hover:text-white transition-colors duration-200">politique de confidentialité</a></p>
        </div>

        <p class="text-xs text-slate-500">&copy; {{ date('Y') }} NEXORA DIGITAL SARL</p>
    </div>
</footer>
