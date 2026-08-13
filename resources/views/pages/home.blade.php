@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - Accueil')

@section('content')
<!-- HERO SECTION (Exact Match with Image Design) -->
<section class="relative min-h-screen flex flex-col justify-between pt-36 pb-12 px-4 sm:px-8 bg-slate-950 overflow-hidden">
    
    <!-- Background Image with Dark Blue Indigo Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/img/office_bg.png') }}" alt="NEXORA Background" class="w-full h-full object-cover opacity-35 scale-105 filter blur-[1px]">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-tr from-slate-950 via-slate-900/90 to-indigo-950/80 backdrop-blur-[2px]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-blue-600/15 via-transparent to-transparent"></div>
    </div>

    <!-- Empty Spacer for Top Header clearance -->
    <div class="relative z-10"></div>

    <!-- Main Hero Title Center: NEXORA DIGITAL SARL -->
    <div class="relative z-10 max-w-7xl mx-auto w-full my-auto text-center py-16">
        <h1 class="text-white font-heading font-black text-4xl sm:text-6xl md:text-7xl lg:text-8xl xl:text-[6.5rem] tracking-wider uppercase leading-none drop-shadow-[0_15px_35px_rgba(0,0,0,0.8)] select-none">
            NEXORA DIGITAL SARL
        </h1>
    </div>

    <!-- Bottom Widgets Grid (Team Avatars Pill on Left & Project Showcase Card on Right) -->
    <div class="relative z-10 max-w-7xl mx-auto w-full flex flex-col lg:flex-row items-end justify-between gap-6 pt-8">
        
        <!-- Bottom Left: Team Avatars Pill & Cookie Floating Icon -->
        <div class="flex items-center gap-3">
            
            <!-- Cookie / Privacy floating icon button -->
            <button type="button" aria-label="Gestion des cookies" class="w-10 h-10 rounded-full bg-blue-600 hover:bg-blue-500 text-white flex items-center justify-center shadow-lg shadow-blue-600/40 transition-all duration-300 hover:scale-105 focus:outline-none">
                <i class="fa-solid fa-cookie-bite text-base"></i>
            </button>

            <!-- Team Avatars Glass Capsule Pill -->
            <div class="bg-slate-900/60 backdrop-blur-xl border border-white/20 rounded-full px-4 sm:px-5 py-2.5 flex items-center gap-3 sm:gap-4 shadow-2xl hover:border-white/30 transition-all duration-300">
                <!-- 5 Overlapping Circular Avatars -->
                <div class="flex -space-x-3 overflow-hidden">
                    <img src="{{ asset('assets/img/avatar1.png') }}" alt="Membre équipe 1" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                    <img src="{{ asset('assets/img/avatar2.png') }}" alt="Membre équipe 2" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                    <img src="{{ asset('assets/img/avatar3.png') }}" alt="Membre équipe 3" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                    <img src="{{ asset('assets/img/avatar4.png') }}" alt="Membre équipe 4" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                    <img src="{{ asset('assets/img/avatar5.png') }}" alt="Membre équipe 5" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                </div>
                <!-- Label Text -->
                <span class="text-white text-xs sm:text-sm font-medium tracking-wide">
                    Découvrez l'équipe derrière NEXORA
                </span>
            </div>
        </div>

        <!-- Bottom Right: Interactive Showcase Card (Derniers projets - Plateau-Apps) -->
        <div x-data="{ 
            currentProject: 1,
            totalProjects: 4,
            projects: [
                { id: 1, title: 'Plateau-Apps', category: 'Derniers projets', image: '{{ asset('assets/img/plateau_app_mockup.png') }}' },
                { id: 2, title: 'Nexora ERP', category: 'Derniers projets', image: '{{ asset('assets/img/plateau_app_mockup.png') }}' },
                { id: 3, title: 'Smart City CI', category: 'Derniers projets', image: '{{ asset('assets/img/plateau_app_mockup.png') }}' },
                { id: 4, title: 'GovPort Web', category: 'Derniers projets', image: '{{ asset('assets/img/plateau_app_mockup.png') }}' }
            ],
            next() {
                this.currentProject = this.currentProject < this.totalProjects ? this.currentProject + 1 : 1;
            },
            prev() {
                this.currentProject = this.currentProject > 1 ? this.currentProject - 1 : this.totalProjects;
            }
        }" class="bg-white rounded-3xl p-3 sm:p-4 max-w-md w-full shadow-2xl border border-white/50 text-slate-900 transition-all duration-300 hover:shadow-blue-500/20">
            
            <div class="flex items-center gap-4">
                <!-- Project Image Preview Box (3D Blue Frame) -->
                <div class="w-1/2 h-44 sm:h-48 rounded-2xl bg-gradient-to-br from-blue-900 via-indigo-950 to-slate-950 relative overflow-hidden flex items-center justify-center p-2 shadow-inner group">
                    <!-- Subtle Glow -->
                    <div class="absolute inset-0 bg-blue-500/20 blur-xl group-hover:bg-blue-500/30 transition-all duration-500"></div>
                    <!-- Mockup image -->
                    <img :src="projects[currentProject - 1].image" :alt="projects[currentProject - 1].title" class="relative z-10 max-h-full max-w-full object-contain filter drop-shadow-[0_10px_15px_rgba(0,0,0,0.5)] group-hover:scale-105 transition-transform duration-500">
                </div>

                <!-- Project Info & Navigation -->
                <div class="w-1/2 flex flex-col justify-between h-44 sm:h-48 py-2 pr-2">
                    <div>
                        <!-- Category Subtitle -->
                        <span class="text-slate-500 text-[11px] sm:text-xs font-semibold uppercase tracking-wider block" x-text="projects[currentProject - 1].category">
                            Derniers projets
                        </span>
                        <!-- Project Title -->
                        <h3 class="text-slate-900 text-xl sm:text-2xl font-bold font-heading mt-1 leading-snug" x-text="projects[currentProject - 1].title">
                            Plateau-Apps
                        </h3>
                    </div>

                    <!-- Progress Pagination (e.g. 1/4 with dynamic line) -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-700 text-xs font-bold" x-text="`${currentProject}/${totalProjects}`">1/4</span>
                            <div class="flex items-center gap-1.5 text-slate-400">
                                <button @click="prev()" class="hover:text-blue-600 p-1 transition"><i class="fa-solid fa-chevron-left text-xs"></i></button>
                                <button @click="next()" class="hover:text-blue-600 p-1 transition"><i class="fa-solid fa-chevron-right text-xs"></i></button>
                            </div>
                        </div>

                        <!-- Progress Line -->
                        <div class="w-full bg-slate-200 h-1.5 rounded-full overflow-hidden flex">
                            <div class="bg-blue-600 h-full rounded-full transition-all duration-500 ease-out" :style="`width: ${(currentProject / totalProjects) * 100}%`"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- SECTION 2: NOS SERVICES & SOLUTIONS DIGITALES -->
<section class="py-24 bg-slate-900 border-t border-slate-800 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="px-4 py-1.5 rounded-full bg-blue-600/10 text-blue-400 border border-blue-500/20 text-xs font-bold tracking-widest uppercase inline-block">
                Nos Domaines d'Expertise
            </span>
            <h2 class="text-white text-3xl sm:text-5xl font-extrabold font-heading tracking-tight">
                Des Solutions sur mesure pour accélérer votre croissance
            </h2>
            <p class="text-slate-400 text-base sm:text-lg">
                Nous concevons et déployons des plateformes haute performance adaptées aux défis technologiques modernes.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Card 1 -->
            <div class="bg-slate-950/80 border border-slate-800 hover:border-blue-500/50 rounded-3xl p-8 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-500/10 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-600/10 border border-blue-500/20 flex items-center justify-center text-blue-400 text-2xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                    <i class="fa-solid fa-code"></i>
                </div>
                <h3 class="text-white text-xl font-bold font-heading mb-3">Développement Web & Mobile</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    Création d'applications web réactives, SaaS complexes et applications mobiles natives et hybrides pour iOS et Android.
                </p>
                <a href="{{ route('service') }}" class="inline-flex items-center gap-2 text-blue-400 text-sm font-semibold hover:text-blue-300 transition">
                    En savoir plus <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="bg-slate-950/80 border border-slate-800 hover:border-blue-500/50 rounded-3xl p-8 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-500/10 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-600/10 border border-blue-500/20 flex items-center justify-center text-blue-400 text-2xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <h3 class="text-white text-xl font-bold font-heading mb-3">Transformation Digitale</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    Audit, modernisation des processus métiers, numérisation des systèmes d'information et conduite du changement.
                </p>
                <a href="{{ route('service') }}" class="inline-flex items-center gap-2 text-blue-400 text-sm font-semibold hover:text-blue-300 transition">
                    En savoir plus <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="bg-slate-950/80 border border-slate-800 hover:border-blue-500/50 rounded-3xl p-8 transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-500/10 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-600/10 border border-blue-500/20 flex items-center justify-center text-blue-400 text-2xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                    <i class="fa-solid fa-cloud"></i>
                </div>
                <h3 class="text-white text-xl font-bold font-heading mb-3">Cloud & DevOps</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    Architecture cloud sécurisée, hébergement haute disponibilité, automatisation CI/CD et gestion d'infrastructures.
                </p>
                <a href="{{ route('service') }}" class="inline-flex items-center gap-2 text-blue-400 text-sm font-semibold hover:text-blue-300 transition">
                    En savoir plus <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 3: PORTEFEUILLE & PROJETS PHARES -->
<section id="projets" class="py-24 bg-slate-950 border-t border-slate-800 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="space-y-4">
                <span class="px-4 py-1.5 rounded-full bg-blue-600/10 text-blue-400 border border-blue-500/20 text-xs font-bold tracking-widest uppercase inline-block">
                    Réalisations Récentes
                </span>
                <h2 class="text-white text-3xl sm:text-5xl font-extrabold font-heading">
                    Découvrez nos projets phares
                </h2>
            </div>
            <a href="{{ route('contact') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full font-semibold text-sm transition shadow-lg shadow-blue-600/30 self-start md:self-auto">
                Démarrer un projet
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Project 1 Card -->
            <div class="group relative rounded-3xl bg-slate-900 border border-slate-800 overflow-hidden hover:border-blue-500/50 transition duration-500">
                <div class="h-64 sm:h-80 bg-gradient-to-br from-blue-950 via-slate-900 to-slate-950 flex items-center justify-center p-8 overflow-hidden relative">
                    <img src="{{ asset('assets/img/plateau_app_mockup.png') }}" alt="Plateau-Apps" class="max-h-full object-contain filter drop-shadow-2xl group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-80"></div>
                </div>
                <div class="p-8 relative z-10">
                    <span class="text-blue-400 text-xs font-bold tracking-widest uppercase">Mobile & Fintech</span>
                    <h3 class="text-white text-2xl font-bold font-heading mt-2 group-hover:text-blue-400 transition">Plateau-Apps</h3>
                    <p class="text-slate-400 text-sm mt-3 leading-relaxed">
                        Plateforme digitale complète pour la gestion et le suivi des services municipaux et financiers de la commune du Plateau.
                    </p>
                </div>
            </div>

            <!-- Project 2 Card -->
            <div class="group relative rounded-3xl bg-slate-900 border border-slate-800 overflow-hidden hover:border-blue-500/50 transition duration-500">
                <div class="h-64 sm:h-80 bg-gradient-to-br from-indigo-950 via-slate-900 to-slate-950 flex items-center justify-center p-8 overflow-hidden relative">
                    <img src="{{ asset('assets/img/plateau_app_mockup.png') }}" alt="Nexora ERP" class="max-h-full object-contain filter drop-shadow-2xl group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-80"></div>
                </div>
                <div class="p-8 relative z-10">
                    <span class="text-blue-400 text-xs font-bold tracking-widest uppercase">Logiciel ERP / Enterprise</span>
                    <h3 class="text-white text-2xl font-bold font-heading mt-2 group-hover:text-blue-400 transition">Nexora Enterprise ERP</h3>
                    <p class="text-slate-400 text-sm mt-3 leading-relaxed">
                        Système intégré de gestion des ressources humaines, stocks, facturation et comptabilité pour les grandes entreprises.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- SECTION 4: CALL TO ACTION -->
<section class="py-20 bg-gradient-to-r from-blue-900 via-indigo-900 to-slate-950 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-500/20 via-transparent to-transparent"></div>
    <div class="max-w-5xl mx-auto px-4 text-center relative z-10 space-y-6">
        <h2 class="text-white text-3xl sm:text-5xl font-extrabold font-heading tracking-tight">
            Prêt à faire passer votre entreprise au niveau supérieur ?
        </h2>
        <p class="text-blue-100 text-base sm:text-lg max-w-2xl mx-auto">
            Discutons de votre projet et élaborons ensemble la solution numérique optimale pour vos objectifs.
        </p>
        <div class="pt-4">
            <a href="{{ route('contact') }}" class="px-8 py-4 bg-white text-blue-950 font-bold rounded-full text-base hover:bg-slate-100 transition shadow-2xl hover:scale-105 inline-block">
                Demander un devis gratuit
            </a>
        </div>
    </div>
</section>
@endsection