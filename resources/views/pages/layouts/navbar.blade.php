<header class="absolute top-0 left-0 right-0 z-50 px-4 sm:px-8 py-5">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-4">
        
        <!-- Left Pill Switch: Solutions Digitales / Transformation Digitale -->
        <div x-data="{ activeTab: 'transformation' }" class="flex items-center">
            <div class="bg-slate-900/70 backdrop-blur-md border border-white/15 p-1 rounded-full flex items-center shadow-lg">
                <button 
                    @click="activeTab = 'solutions'" 
                    :class="activeTab === 'solutions' ? 'bg-blue-600 text-white shadow-md shadow-blue-500/30' : 'text-slate-300 hover:text-white'"
                    class="px-4 sm:px-5 py-2 text-xs sm:text-sm font-semibold rounded-full transition-all duration-300">
                    Solutions digitales
                </button>
                <button 
                    @click="activeTab = 'transformation'" 
                    :class="activeTab === 'transformation' ? 'bg-blue-600 text-white shadow-md shadow-blue-500/30' : 'text-slate-300 hover:text-white'"
                    class="px-4 sm:px-5 py-2 text-xs sm:text-sm font-semibold rounded-full transition-all duration-300">
                    Transformation digitale
                </button>
            </div>
        </div>

        <!-- Center Logo: NEXORA ('n' with glowing blue dot accent) -->
        <a href="{{ route('home') }}" class="group flex items-center gap-2 text-white font-heading font-extrabold text-2xl tracking-wider my-2 lg:my-0">
            <div class="relative flex items-center justify-center">
                <!-- Cyan blue accent square dot -->
                <span class="absolute -top-1 -left-1 w-2.5 h-2.5 bg-blue-500 rounded-xs shadow-sm shadow-blue-400 group-hover:scale-125 transition-transform duration-300"></span>
                <!-- Lowercase geometric 'n' icon -->
                <span class="text-4xl leading-none text-white font-heading font-black tracking-tighter">n</span>
            </div>
        </a>

        <!-- Right Navigation Bar: Floating White Capsule Menu -->
        <nav class="bg-white/95 backdrop-blur-md rounded-full px-3 py-1.5 shadow-2xl flex items-center gap-1 sm:gap-2 text-slate-800 text-xs sm:text-sm font-semibold border border-white/50">
            
            <a href="{{ route('home') }}" class="px-3 sm:px-4 py-2 text-slate-900 hover:text-blue-600 transition relative group">
                Maison
                <span class="absolute bottom-1 left-3 right-3 h-0.5 bg-slate-900 group-hover:bg-blue-600 transition-all rounded-full"></span>
            </a>

            <a href="{{ route('about') }}" class="px-3 sm:px-4 py-2 text-slate-600 hover:text-blue-600 transition rounded-full hover:bg-slate-100/70">
                A propos de nous
            </a>

            <a href="{{ route('service') }}" class="px-3 sm:px-4 py-2 text-slate-600 hover:text-blue-600 transition rounded-full hover:bg-slate-100/70">
                Services
            </a>

            <a href="#projets" class="px-3 sm:px-4 py-2 text-slate-600 hover:text-blue-600 transition rounded-full hover:bg-slate-100/70">
                Projet
            </a>

            <a href="{{ route('contact') }}" class="ml-1 px-4 sm:px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-full font-semibold transition shadow-md shadow-blue-600/30 hover:shadow-lg hover:shadow-blue-600/40">
                Contactez-nous
            </a>

            <!-- Dark / Light theme toggle moon button -->
            <button type="button" aria-label="Basculer le thème" class="ml-1 w-8 h-8 rounded-full bg-slate-950 text-white flex items-center justify-center hover:bg-slate-800 transition focus:outline-none shadow-inner">
                <i class="fa-solid fa-moon text-xs"></i>
            </button>
        </nav>

    </div>
</header>
