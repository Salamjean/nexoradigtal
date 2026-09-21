<header class="absolute top-0 left-0 right-0 z-50 px-2 sm:px-6 py-5">
    <div class="w-full flex flex-col lg:flex-row items-center justify-between gap-4">


        <!-- Left Pill Switch: Solutions Digitales / Transformation Digitale (Exact Screenshot Match) -->
        <div x-data="{ activeTab: 'transformation' }" class="flex items-center">
            <div
                class="bg-[#0b0f19]/80 backdrop-blur-md border-2 border-[#0066ff] p-1 rounded-full flex items-center shadow-lg shadow-blue-600/10">
                <button @click="activeTab = 'solutions'"
                    :class="activeTab === 'solutions' ? 'bg-[#0066ff] text-white shadow-md shadow-blue-500/30' : 'text-slate-200 hover:text-white'"
                    class="px-5 sm:px-6 py-2 sm:py-2.5 text-xs sm:text-sm font-medium rounded-full transition-all duration-300 whitespace-nowrap">
                    Solutions digitales
                </button>
                <button @click="activeTab = 'transformation'"
                    :class="activeTab === 'transformation' ? 'bg-[#0066ff] text-white shadow-md shadow-blue-500/30' : 'text-slate-200 hover:text-white'"
                    class="px-5 sm:px-6 py-2 sm:py-2.5 text-xs sm:text-sm font-medium rounded-full transition-all duration-300 whitespace-nowrap">
                    Transformation digitale
                </button>
            </div>
        </div>

        <!-- Center Logo -->
        <a href="{{ route('home') }}" class="group flex items-center my-2 lg:my-0">
            <img src="{{ asset('assets/img/LOGONEXORA.png') }}" alt="NEXORA DIGITAL SARL"
                class="h-14 sm:h-16 w-auto object-contain group-hover:scale-105 transition-transform duration-300">
        </a>


        <!-- Right Navigation Bar: White Capsule Section + Blue Rounded Pill Matching 100% Identical Height -->
        <nav
            class="max-w-full overflow-x-auto nx-scroll-hide flex items-stretch text-xs sm:text-sm font-sans h-11 sm:h-12">

            <!-- Left White Section: Advanced even further to the right underneath the blue pill -->
            <div
                class="bg-white rounded-l-full h-full pl-8 sm:pl-10 pr-20 sm:pr-28 flex items-center gap-5 sm:gap-8 shadow-2xl">
                <!-- Maison -->
                <a href="{{ route('home') }}"
                    class="text-slate-900 font-medium hover:text-[#0066ff] transition relative py-1 {{ request()->routeIs('home') ? 'border-b-2 border-[#0066ff]' : '' }} whitespace-nowrap">
                    Maison
                </a>

                <!-- A propos de nous -->
                <a href="{{ route('about') }}"
                    class="text-slate-900 font-medium hover:text-[#0066ff] transition relative py-1 {{ request()->routeIs('about') ? 'border-b-2 border-[#0066ff]' : '' }} whitespace-nowrap">
                    A propos de nous
                </a>

                <!-- Services -->
                <a href="{{ route('service') }}"
                    class="text-slate-900 font-medium hover:text-[#0066ff] transition relative py-1 {{ request()->routeIs('service') ? 'border-b-2 border-[#0066ff]' : '' }} whitespace-nowrap">
                    Services
                </a>

                <!-- Projet -->
                <a href="{{ route('project') }}"
                    class="text-slate-900 font-medium hover:text-[#0066ff] transition relative py-1 {{ request()->routeIs('project') ? 'border-b-2 border-[#0066ff]' : '' }} whitespace-nowrap">
                    Projet
                </a>


            </div>

            <!-- Right Blue Section: Overlaps deeply over the extended white background -->
            <div
                class="bg-[#0066ff] hover:bg-blue-600 text-white rounded-full h-full pl-6 sm:pl-7 pr-1.5 flex items-center gap-3 transition-all duration-300 shadow-md shadow-blue-500/25 -ml-14 sm:-ml-20 z-10">
                <a href="{{ route('contact') }}" class="text-white text-xs sm:text-sm font-semibold whitespace-nowrap">
                    Contactez-nous
                </a>
                <button type="button" aria-label="Basculer le thème"
                    class="group/theme relative w-7.5 h-7.5 sm:w-8 sm:h-8 rounded-full bg-[#111111] hover:bg-slate-900 text-white flex items-center justify-center shrink-0 hover:scale-110 transition-all duration-500 focus:outline-none shadow-sm overflow-hidden">
                    <!-- Moon Icon (Smooth fade out & rotation on hover) -->
                    <i class="fa-solid fa-moon text-xs sm:text-sm transition-all duration-500 ease-in-out group-hover/theme:opacity-0 group-hover/theme:-rotate-90 group-hover/theme:scale-50"></i>
                    
                    <!-- Sun Icon (Smooth fade in & rotation on hover) -->
                    <svg class="w-4 h-4 text-white absolute opacity-0 rotate-90 scale-50 transition-all duration-500 ease-in-out group-hover/theme:opacity-100 group-hover/theme:rotate-0 group-hover/theme:scale-100 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="4.5"></circle>
                        <path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41m11.32-11.32l1.41-1.41"></path>
                    </svg>
                </button>





            </div>



        </nav>




    </div>
</header>