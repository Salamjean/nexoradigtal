<footer class="bg-slate-950 border-t border-slate-800/80 text-slate-400 pt-16 pb-12 relative overflow-hidden">
    <!-- Subtle glow background effect -->
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-3/4 h-32 bg-blue-600/10 blur-3xl rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800/80">
            
            <!-- Brand Column -->
            <div class="lg:col-span-2 space-y-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-white font-heading font-extrabold text-2xl tracking-wider">
                    <div class="relative flex items-center justify-center">
                        <span class="absolute -top-1 -left-1 w-2.5 h-2.5 bg-blue-500 rounded-xs shadow-sm shadow-blue-400"></span>
                        <span class="text-3xl leading-none text-white font-heading font-black tracking-tighter">n</span>
                    </div>
                    <span>NEXORA</span>
                </a>
                <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                    NEXORA DIGITAL SARL accompagne les entreprises dans leur transformation numérique à travers des solutions virtuelles et logicielles innovantes de haute performance.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-blue-600 hover:border-blue-600 transition duration-300">
                        <i class="fa-brands fa-linkedin-in text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-blue-600 hover:border-blue-600 transition duration-300">
                        <i class="fa-brands fa-x-twitter text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-blue-600 hover:border-blue-600 transition duration-300">
                        <i class="fa-brands fa-facebook-f text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-blue-600 hover:border-blue-600 transition duration-300">
                        <i class="fa-brands fa-github text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Navigation Links -->
            <div>
                <h3 class="text-white text-sm font-semibold uppercase tracking-wider mb-4 font-heading">Navigation</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition">Maison</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-blue-400 transition">À propos de nous</a></li>
                    <li><a href="{{ route('service') }}" class="hover:text-blue-400 transition">Nos Services</a></li>
                    <li><a href="#projets" class="hover:text-blue-400 transition">Projets & Réalisations</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-blue-400 transition">Contactez-nous</a></li>
                </ul>
            </div>

            <!-- Expertise -->
            <div>
                <h3 class="text-white text-sm font-semibold uppercase tracking-wider mb-4 font-heading">Nos Expertises</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="#" class="hover:text-blue-400 transition">Applications Web & Mobile</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Transformation Digitale</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Cloud & Infrastructures</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Intelligence Artificielle</a></li>
                    <li><a href="#" class="hover:text-blue-400 transition">Conseil & Stratégie IT</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-white text-sm font-semibold uppercase tracking-wider mb-4 font-heading">Contact</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot text-blue-500 mt-1"></i>
                        <span>Abidjan, Plateau, Côte d'Ivoire</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-blue-500"></i>
                        <a href="mailto:contact@nexora.ci" class="hover:text-blue-400 transition">contact@nexora.ci</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-phone text-blue-500"></i>
                        <a href="tel:+2250700000000" class="hover:text-blue-400 transition">+225 07 00 00 00 00</a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Bottom Copyright -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} NEXORA DIGITAL SARL. Tous droits réservés.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-slate-400 transition">Politique de confidentialité</a>
                <a href="#" class="hover:text-slate-400 transition">Conditions d'utilisation</a>
                <a href="#" class="hover:text-slate-400 transition">Mentions légales</a>
            </div>
        </div>
    </div>
</footer>
