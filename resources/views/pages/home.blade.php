    @extends('pages.layouts.app')

    @section('title', 'NEXORA DIGITAL SARL - Accueil')

    @section('content')

    <!-- ============================================================ -->
    <!-- HERO -->
    <!-- ============================================================ -->
    <section class="relative flex flex-col justify-between pt-36 pb-12 px-4 sm:px-8 bg-slate-950 overflow-hidden min-h-screen">

        <!-- Background: video + overlays -->
        <div class="absolute inset-0 z-0">
            <!-- Background video -->
            <video
                class="absolute inset-0 w-full h-full object-cover"
                src="{{ asset('assets/video/6036858_Office_People_3840x2160.mp4') }}"
                autoplay muted loop playsinline
                aria-hidden="true"
            ></video>
            <!-- Dark overlay pour la lisibilité -->
            <div class="absolute inset-0 bg-[#0d0d0d]/70"></div>
            <!-- Gradient bas pour la transition douce -->
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-slate-950/80"></div>
            <!-- Glow bleu subtil -->
            <div class="absolute -top-40 right-0 w-[36rem] h-[36rem] bg-blue-600/10 rounded-full blur-[120px]"></div>
            <!-- Giant translucent "n" logo watermark on the left (matches mockup) -->
            <div class="absolute -left-16 top-1/2 -translate-y-1/2 z-0 pointer-events-none select-none opacity-[0.08]">
                <img src="{{ asset('assets/img/LOGONEXORA.png') }}" alt="" class="h-[36rem] sm:h-[46rem] w-auto object-contain">
            </div>
        </div>

        <!-- Giant animated headline: 100% On One Single Line, Zero Extra Margin -->
        <div class="relative z-10 w-full max-w-full mx-auto px-0 my-auto py-6 sm:py-10 text-center flex flex-col items-center justify-center overflow-hidden">
            <h1 id="nx-hero-title" class="text-white font-heading font-bold text-[clamp(0.85rem,4.8vw,6.2rem)] uppercase leading-none tracking-[0.02em] drop-shadow-[0_15px_35px_rgba(0,0,0,0.8)] select-none flex flex-nowrap justify-center items-center gap-x-2 sm:gap-x-6 whitespace-nowrap w-full">
                @php
                    $heroWords = explode(' ', 'NEXORA DIGITAL SARL');
                    $charIndex = 0;
                @endphp
                @foreach ($heroWords as $word)
                    <span class="inline-flex whitespace-nowrap">
                        @foreach (str_split($word) as $char)
                            <span class="nx-letter" style="animation-delay: {{ 0.2 + ($charIndex * 0.06) }}s">{{ $char }}</span>
                            @php $charIndex++; @endphp
                        @endforeach
                    </span>
                @endforeach
            </h1>
        </div>


        <!-- Bottom widgets: team avatars pill (left) / project showcase card (right) - Edge-to-edge without side margins -->
        <div class="relative z-10 w-full max-w-none px-2 sm:px-6 flex flex-col lg:flex-row items-end justify-between gap-6">


            <!-- Bottom Left: Team Avatars Pill -->
            <div class="flex items-center gap-3">
                <!-- Team Avatars Glass Capsule Pill -->
                <div class="bg-slate-900/60 backdrop-blur-xl border border-white/20 rounded-full px-4 sm:px-5 py-2.5 flex items-center gap-3 sm:gap-4 shadow-2xl hover:border-white/30 transition-all duration-300">
                    <div class="flex -space-x-3 overflow-hidden">
                        <img src="{{ asset('assets/img/avatar1.png') }}" alt="Membre equipe 1" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                        <img src="{{ asset('assets/img/avatar2.png') }}" alt="Membre equipe 2" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                        <img src="{{ asset('assets/img/avatar3.png') }}" alt="Membre equipe 3" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                        <img src="{{ asset('assets/img/avatar4.png') }}" alt="Membre equipe 4" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                        <img src="{{ asset('assets/img/avatar5.png') }}" alt="Membre equipe 5" class="inline-block h-8 w-8 sm:h-9 sm:w-9 rounded-full ring-2 ring-slate-900 object-cover">
                    </div>
                    <span class="text-white text-xs sm:text-sm font-medium tracking-wide">
                        Decouvrez l'equipe derriere NEXORA
                    </span>
                </div>
            </div>


            <!-- Bottom Right: Interactive Showcase Card (Auto & Manual Animated Project Slider) -->
            <div x-data="{
                currentProject: 1,
                totalProjects: 4,
                projects: [
                    { 
                        id: 1, 
                        title: 'Plateau-Apps', 
                        category: 'Derniers projets', 
                        description: 'Plateforme mobile et web innovante pour la gestion urbaine.',
                        image: '{{ asset('assets/img/hero_card_plateau.png') }}'
                    },
                    { 
                        id: 2, 
                        title: 'Nexora ERP & CRM', 
                        category: 'Derniers projets', 
                        description: 'Solution sur mesure d’automatisation des processus d’entreprise.',
                        image: '{{ asset('assets/img/figma_project_egov_erp.png') }}'
                    },
                    { 
                        id: 3, 
                        title: 'Smart City CI', 
                        category: 'Derniers projets', 
                        description: 'Portail intelligent de suivi et d’optimisation des services.',
                        image: '{{ asset('assets/img/figma_project_egov_plateforme.png') }}'
                    },
                    { 
                        id: 4, 
                        title: 'GovPort Web', 
                        category: 'Derniers projets', 
                        description: 'Système e-Gov sécurisé pour les démarches administratives.',
                        image: '{{ asset('assets/img/figma_service_chip_1.png') }}'
                    }
                ],
                next() {
                    this.currentProject = this.currentProject < this.totalProjects ? this.currentProject + 1 : 1;
                },
                prev() {
                    this.currentProject = this.currentProject > 1 ? this.currentProject - 1 : this.totalProjects;
                },
                init() {
                    setInterval(() => { this.next(); }, 4500);
                }
            }" class="bg-white rounded-2xl p-1 sm:p-1.5 max-w-xl w-full shadow-2xl border border-white/50 text-slate-900 transition-all duration-300 hover:shadow-blue-500/20 overflow-hidden">

                <div class="flex items-center gap-4">
                    <!-- Project Image Preview Box (Smooth Transition on Image Change) -->
                    <div class="w-1/2 h-48 sm:h-52 rounded-xl relative overflow-hidden flex items-center justify-center group shrink-0 bg-slate-950">
                        <template x-for="p in projects" :key="p.id">
                            <img :src="p.image" :alt="p.title" 
                                x-show="currentProject === p.id"
                                x-transition:enter="transition ease-out duration-700"
                                x-transition:enter-start="opacity-0 scale-105"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </template>
                    </div>

                    <!-- Project Info & Navigation (Smooth Transition on Text Change) -->
                    <div class="w-1/2 flex flex-col justify-between h-48 sm:h-52 py-2 pr-3 pl-1 relative">
                        <div class="relative min-h-[110px]">
                            <template x-for="p in projects" :key="p.id">
                                <div x-show="currentProject === p.id"
                                     x-transition:enter="transition ease-out duration-500 delay-100"
                                     x-transition:enter-start="opacity-0 translate-x-4"
                                     x-transition:enter-end="opacity-100 translate-x-0"
                                     x-transition:leave="transition ease-in duration-200"
                                     x-transition:leave-start="opacity-100 translate-x-0"
                                     x-transition:leave-end="opacity-0 -translate-x-4"
                                     class="absolute inset-0">
                                    <span class="text-slate-600 text-xs font-medium block mb-1" x-text="p.category">
                                        Derniers projets
                                    </span>
                                    <h3 class="text-slate-900 text-xl sm:text-2xl font-bold font-heading leading-tight whitespace-nowrap overflow-hidden text-ellipsis" x-text="p.title">
                                        Plateau-Apps
                                    </h3>
                                    <p class="text-slate-500 text-xs sm:text-sm mt-1.5 leading-relaxed line-clamp-2" x-text="p.description">
                                        Plateforme mobile et web innovante pour la gestion urbaine.
                                    </p>
                                </div>
                            </template>
                        </div>

                        <div class="space-y-2 z-10">
                            <div class="flex items-center justify-between">
                                <span class="text-slate-900 text-sm font-medium block" x-text="`${currentProject}/${totalProjects}`">1/4</span>
                                <div class="flex items-center gap-2 text-slate-400">
                                    <button @click="prev()" class="hover:text-blue-600 p-1 transition focus:outline-none" aria-label="Projet précédent">
                                        <i class="fa-solid fa-chevron-left text-xs"></i>
                                    </button>
                                    <button @click="next()" class="hover:text-blue-600 p-1 transition focus:outline-none" aria-label="Projet suivant">
                                        <i class="fa-solid fa-chevron-right text-xs"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="w-full bg-[#e5e7eb] h-1.5 rounded-full overflow-hidden flex cursor-pointer" @click="next()">
                                <div class="bg-[#0066ff] h-full rounded-full transition-all duration-500 ease-out" :style="`width: ${(currentProject / totalProjects) * 100}%`"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






        </div>
    </section>

    <!-- ============================================================ -->
    <!-- HERO BOTTOM - Partenaire section (fond bleu foncé) -->
    <!-- ============================================================ -->
    <section class="relative bg-[#040d2e] py-16 sm:py-20 px-4 sm:px-8 overflow-hidden">

        <!-- LinkedIn floating button (top-right) -->
        <a href="#" aria-label="LinkedIn NEXORA" class="hidden lg:flex absolute top-6 right-6 w-11 h-11 rounded-full bg-blue-600 hover:bg-blue-500 text-white items-center justify-center shadow-lg shadow-blue-600/40 transition-all duration-300 hover:scale-105 z-10">
            <i class="fa-brands fa-linkedin-in text-base"></i>
        </a>

        <!-- Main grid layout: Left for H2 title, Right for paragraph and CTA buttons -->
        <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">

            <!-- Left: Title H2 only -->
            <div class="max-w-[623px]">
                <h2 class="text-white font-heading font-bold uppercase text-[26px] lg:text-[38px] leading-[1.8] tracking-wider">
                    VOTRE PARTENAIRE EN TRANSFORMATION DIGITALE & INNOVANTES POUR VOTRE ORGANISATION.
                </h2>
            </div>

            <!-- Right: Description + CTA buttons -->
            <div class="max-w-[789px] space-y-8">
                <p class="text-[#888888] font-montserrat font-light text-[18px] lg:text-[21px] leading-[1.5] text-justify">
                    NEXORA DIGITAL SARL est votre partenaire de référence en solutions numériques et en transformation digitale. Nous accompagnons les entreprises et organisations dans leur évolution numérique avec des solutions adaptées, innovantes et performantes. Chez NEXORA, nos experts qualifiés garantissent des résultats concrets et durables.
                </p>
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('service') }}" class="inline-flex items-center gap-4 pl-6 pr-2 py-2 rounded-full border border-white text-white text-sm font-semibold hover:bg-white hover:text-slate-950 transition-all duration-300 group">
                        Découvrez nos services
                        <span class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-location-arrow text-xs text-white rotate-45"></i>
                        </span>
                    </a>
                    <a href="#" class="inline-flex items-center gap-4 pl-6 pr-2 py-2 rounded-full border border-white/40 text-white text-sm font-semibold hover:border-white transition-all duration-300 group">
                        Regardez notre vidéo complète
                        <span class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-location-arrow text-xs text-white rotate-45"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Horizontal divider line -->
        <div class="max-w-7xl mx-auto mt-16 border-t border-white/10"></div>

        <!-- Stats Section below the divider -->
        <div class="max-w-7xl mx-auto w-full pt-12">
            <div class="flex flex-wrap gap-x-12 gap-y-8 justify-between">
                @php
                    $heroStats = [
                        ['target' => 10, 'suffix' => '+', 'label' => "Ans d'Expertise"],
                        ['target' => 200, 'suffix' => '+', 'label' => 'Projets Livrés'],
                        ['target' => 80, 'suffix' => '+', 'label' => 'Clients'],
                        ['target' => 5, 'suffix' => '', 'label' => 'Secteurs'],
                    ];
                @endphp
                @foreach ($heroStats as $stat)
                    <div
                        x-data="{
                            display: '0{{ $stat['suffix'] }}',
                            init() {
                                const target = {{ $stat['target'] }};
                                const suffix = '{{ $stat['suffix'] }}';
                                const duration = 1800;
                                let start = null;
                                const step = (ts) => {
                                    if (!start) start = ts;
                                    const p = Math.min((ts - start) / duration, 1);
                                    const eased = 1 - Math.pow(1 - p, 3);
                                    this.display = Math.floor(eased * target) + suffix;
                                    if (p < 1) { requestAnimationFrame(step); } else { this.display = target + suffix; }
                                };
                                requestAnimationFrame(step);
                            }
                        }"
                        class="flex flex-col gap-2 min-w-[140px]"
                    >
                        <span class="font-stat font-black text-5xl sm:text-6xl text-white leading-none" x-text="display">0{{ $stat['suffix'] }}</span>
                        <span class="font-bold text-[11px] text-blue-400 uppercase tracking-wider">{{ $stat['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- SERVICE CHIPS - Horizontal scroller -->
    <!-- ============================================================ -->
    <section class="bg-[#010619] py-14 relative border-b border-white/10">
        <div class="max-w-[110rem] mx-auto px-4 sm:px-8">
            <div class="flex gap-6 overflow-x-auto nx-scroll-hide snap-x snap-mandatory pb-4 pr-4 sm:pr-8">
                @php
                    $chips = [
                        [
                            'img' => 'figma_service_chip_5.png',
                            'cat' => 'Conseil & Audit',
                            'title' => 'ERP & logiciels métiers sur mesure'
                        ],
                        [
                            'img' => 'figma_service_chip_1.png',
                            'cat' => 'Solutions digitales',
                            'title' => 'Plateformes web & mobile'
                        ],
                        [
                            'img' => 'figma_service_chip_2.png',
                            'cat' => 'ERP & Logiciels',
                            'title' => 'Leader en transformation digitale'
                        ],
                        [
                            'img' => 'figma_service_chip_3.png',
                            'cat' => 'Transformation',
                            'title' => 'Notre histoire et notre vision'
                        ],
                        [
                            'img' => 'figma_service_chip_4.png',
                            'cat' => 'À propos',
                            'title' => 'Audit SI & stratégie digitale'
                        ],
                    ];
                @endphp
                @foreach ($chips as $chip)
                    <div class="snap-start shrink-0 w-[280px] sm:w-[320px] rounded-[28px] bg-[#062473] border border-blue-400/25 p-7 flex flex-col justify-between hover:bg-[#082b88] hover:border-blue-300/40 hover:shadow-2xl hover:shadow-blue-600/20 transition-all duration-300 relative group min-h-[380px]">
                        <!-- Image circulaire positionnée en haut -->
                        <div class="w-20 h-20 rounded-full overflow-hidden border-2 border-white/20 bg-slate-950/80 p-0.5 shrink-0 shadow-lg group-hover:scale-105 transition-transform duration-300">
                            <img src="{{ asset('assets/img/'.$chip['img']) }}" alt="{{ $chip['cat'] }}" class="w-full h-full object-cover rounded-full">
                        </div>

                        <!-- Catégorie + Titre -->
                        <div class="my-4">
                            <span class="text-blue-300 text-xs font-bold uppercase tracking-wider block mb-2">{{ $chip['cat'] }}</span>
                            <h3 class="text-white font-heading font-bold text-xl sm:text-[1.35rem] leading-snug tracking-tight">{{ $chip['title'] }}</h3>
                        </div>

                        <!-- Bouton Découvrez-en plus -->
                        <a href="{{ route('service') }}" class="w-full rounded-full border border-blue-300/35 bg-[#031544]/90 hover:bg-blue-600/30 pl-5 pr-2 py-2 flex items-center justify-between text-white text-xs font-semibold tracking-wide transition-all duration-300 group/btn">
                            <span>Découvrez-en plus</span>
                            <span class="w-7 h-7 rounded-full bg-blue-600 group-hover/btn:bg-blue-500 flex items-center justify-center shrink-0 shadow-md transition">
                                <i class="fa-solid fa-arrow-right text-[10px] text-white"></i>
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- VOS PROJETS - White section + tech marquee -->
    <!-- ============================================================ -->
    <section class="py-20 bg-white relative overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 text-center mb-14">
            <h2 class="text-slate-950 text-3xl sm:text-5xl font-heading font-extrabold tracking-tight">
                Vos projets <span class="text-blue-600">Exigez le meilleur.</span> Nous les livrons.
            </h2>
            <p class="text-slate-500 text-base sm:text-lg mt-4">
                Des années d'expertise digitale au service de vos projets.
            </p>
        </div>

        <div class="relative overflow-hidden">
            @php $techs = ['MICROSOFT', 'ORACLE', 'SAP', 'IBM', 'CISCO', 'HUAWEI', 'AWS', 'GOOGLE']; @endphp
            <div class="flex gap-4 nx-marquee-track" style="animation-duration: 26s;">
                @foreach (array_merge($techs, $techs) as $tech)
                    <span class="shrink-0 px-8 sm:px-10 py-4 sm:py-5 rounded-full bg-blue-600 text-white font-medium text-lg sm:text-2xl">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- FEATURE PANEL A - photo right / text left -->
    <!-- ============================================================ -->
    <section class="bg-slate-950 relative overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="order-2 lg:order-1 bg-[#253a90] px-6 sm:px-12 lg:px-16 py-16 sm:py-20 flex flex-col justify-center">
                <span class="text-blue-300 text-sm font-medium mb-3">Services</span>
                <h2 class="text-white font-heading font-extrabold text-2xl sm:text-3xl tracking-tight leading-snug mb-6">
                    DES EXPERTS QUALIFIES AU SERVICE DE VOTRE TRANSFORMATION DIGITALE ET DE VOS PROJETS INNOVANT.
                </h2>
                <p class="text-blue-100/70 text-base sm:text-lg leading-relaxed">
                    NEXORA est votre partenaire spécialisé dans les solutions digitales de A à Z. Nous maîtrisons une gamme complète de technologies avancées, notamment le développement web & mobile, l'intégration ERP, l'automatisation des processus, la digitalisation des organisations et le conseil en stratégie digitale.
                </p>
            </div>
            <div class="order-1 lg:order-2 relative min-h-[22rem] lg:min-h-[38rem] flex items-center justify-center p-6 sm:p-10">
                <img src="{{ asset('assets/img/figma_feature_panel_1.png') }}" alt="Experts NEXORA au travail" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent"></div>

                <!-- Floating detail card -->
                <div class="relative z-10 bg-white rounded-[28px] p-6 sm:p-8 shadow-2xl max-w-sm w-full">
                    <span class="text-blue-600 font-montserrat text-sm">Nos services</span>
                    <h3 class="font-heading font-bold text-lg text-slate-950 mt-2 mb-3">PLATEFORMES WEB & MOBILES</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Nous développons des applications web et mobile sur mesure, performantes et adaptées à vos besoins métiers, avec une expérience utilisateur optimale et une sécurité renforcée.
                    </p>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-slate-900 font-montserrat font-medium text-sm">1/5</span>
                    </div>
                    <div class="w-full bg-slate-200 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-blue-600 h-full rounded-full" style="width: 22%"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- FEATURE PANEL B - photo left / text right -->
    <!-- ============================================================ -->
    <section class="bg-slate-950 relative overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="relative min-h-[22rem] lg:min-h-[38rem] flex items-center justify-center p-6 sm:p-10">
                <img src="{{ asset('assets/img/figma_feature_panel_2.png') }}" alt="Transformation digitale NEXORA" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent"></div>

                <!-- Floating detail card -->
                <div class="relative z-10 bg-white rounded-[28px] p-6 sm:p-8 shadow-2xl max-w-sm w-full">
                    <span class="text-blue-600 font-montserrat text-sm">Déploiement & formation</span>
                    <h3 class="font-heading font-bold text-lg text-slate-950 mt-2 mb-3">CONDUITE DU CHANGEMENT</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        NEXORA accompagne vos équipes dans la prise en main des nouveaux outils digitaux, pour garantir une adoption réussie des solutions déployées et une montée en compétence durable. Nous assurons également la conduite du changement pour faciliter la transition digitale au sein de votre organisation.
                    </p>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-slate-900 font-montserrat font-medium text-sm">1/5</span>
                    </div>
                    <div class="w-full bg-slate-200 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-blue-600 h-full rounded-full" style="width: 22%"></div>
                    </div>
                </div>
            </div>
            <div class="bg-[#253a90] px-6 sm:px-12 lg:px-16 py-16 sm:py-20 flex flex-col justify-center">
                <span class="text-blue-300 text-sm font-medium mb-3">Services</span>
                <h2 class="text-white font-heading font-extrabold text-2xl sm:text-3xl tracking-tight leading-snug mb-6">
                    INVESTIR DANS L'EXPERTISE DIGITALE, C'EST GARANTIR LE SUCCES DE VOTRE TRANSFORMATION
                </h2>
                <p class="text-blue-100/70 text-base sm:text-lg leading-relaxed mb-8">
                    NEXORA s'engage à être votre partenaire de référence en matière de transformation digitale. Nos experts sont notre atout le plus précieux et nous investissons massivement pour garantir leur excellence dans les domaines du digital, du conseil et de la conduite du changement, au service de vos projets et de votre organisation.
                </p>
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 pl-6 pr-2 py-2 rounded-full border-2 border-white/50 text-white text-sm font-semibold hover:border-white transition-all duration-300 group self-start">
                    Découvrez nos programmes de formation
                    <span class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center group-hover:bg-white group-hover:text-blue-950 transition">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- PARTENAIRES + GALERIE DE REALISATIONS -->
    <!-- ============================================================ -->
    <section class="py-20 bg-slate-950 border-t border-slate-800 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center mb-10">
            <span class="text-blue-400 text-xs font-bold tracking-widest uppercase">Ils nous font confiance</span>
        </div>

        <div class="relative overflow-hidden mb-16">
            @php $partners = ['figma_partner_logo_1.png', 'figma_partner_logo_2.png', 'figma_partner_logo_3.png', 'figma_partner_logo_4.png']; @endphp
            <div class="flex items-center gap-16 nx-marquee-track" style="animation-duration: 22s;">
                @foreach (array_merge($partners, $partners) as $logo)
                    <img src="{{ asset('assets/img/'.$logo) }}" alt="Partenaire NEXORA" class="h-9 sm:h-11 w-auto object-contain shrink-0 opacity-90">
                @endforeach
            </div>
        </div>

        <div class="relative overflow-hidden">
            @php $gallery = ['figma_gallery_1.png', 'figma_gallery_2.png', 'figma_gallery_3.png']; @endphp
            <div class="flex gap-6 nx-marquee-track" style="animation-duration: 34s;">
                @foreach (array_merge($gallery, $gallery) as $shot)
                    <div class="shrink-0 w-[300px] sm:w-[420px] h-[200px] sm:h-[280px] rounded-2xl overflow-hidden">
                        <img src="{{ asset('assets/img/'.$shot) }}" alt="Réalisation NEXORA" class="w-full h-full object-cover">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- DÉCOUVREZ NOS PROJETS (STYLE EXACT IMAGE 4 FIGMA) -->
    <!-- ============================================================ -->
    <section id="projets" class="py-20 bg-[#ECEEF0] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">


            <!-- Section Header: Title + Pill Button -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-12 gap-6">
                <h2 class="text-slate-950 text-3xl sm:text-5xl font-extrabold font-heading tracking-tight">
                    Découvrez nos projets
                </h2>
                
                <a href="{{ route('project') }}" class="inline-flex items-center gap-3 pl-2 pr-6 py-2 rounded-full border-2 border-blue-600 bg-blue-50/70 hover:bg-blue-600 text-blue-600 hover:text-white transition-all duration-300 group shadow-sm self-start sm:self-auto">
                    <span class="w-8 h-8 rounded-full bg-blue-600 text-white group-hover:bg-white group-hover:text-blue-600 flex items-center justify-center transition shadow-md">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </span>
                    <span class="font-semibold text-sm">Voir tous les projets</span>
                </a>
            </div>

            <!-- 2-Column Projects Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- Card 1: Portail e-Gov Plateforme -->
                <div class="bg-white rounded-[32px] p-5 sm:p-6 shadow-sm border border-slate-200/80 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div class="h-64 sm:h-72 rounded-2xl overflow-hidden relative bg-slate-100 mb-6">
                        <img src="{{ asset('assets/img/figma_project_egov_plateforme.png') }}" alt="Portail e-Gov Plateforme" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    
                    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                        <div>
                            <span class="text-slate-500 text-xs font-semibold uppercase tracking-wider block mb-1">Transformation Digitale</span>
                            <h3 class="text-slate-950 font-heading font-bold text-2xl sm:text-3xl leading-tight group-hover:text-blue-600 transition">
                                Portail e-Gov<br class="hidden sm:inline"> Plateforme
                            </h3>
                        </div>
                        <div class="space-y-2 text-xs sm:text-sm shrink-0 border-t sm:border-t-0 pt-3 sm:pt-0 border-slate-100">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Client</span>
                                <span class="text-slate-900 font-semibold block">Ministère du Numérique</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Date</span>
                                <span class="text-slate-900 font-semibold block">Janvier 2024 - En cours</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Portail e-Gov ERP & CRM -->
                <div class="bg-white rounded-[32px] p-5 sm:p-6 shadow-sm border border-slate-200/80 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div class="h-64 sm:h-72 rounded-2xl overflow-hidden relative bg-slate-100 mb-6">
                        <img src="{{ asset('assets/img/figma_project_egov_erp.png') }}" alt="Portail e-Gov ERP & CRM" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    
                    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                        <div>
                            <span class="text-slate-500 text-xs font-semibold uppercase tracking-wider block mb-1">Développement Web</span>
                            <h3 class="text-slate-950 font-heading font-bold text-2xl sm:text-3xl leading-tight group-hover:text-blue-600 transition">
                                Portail e-Gov<br class="hidden sm:inline"> ERP & CRM
                            </h3>
                        </div>
                        <div class="space-y-2 text-xs sm:text-sm shrink-0 border-t sm:border-t-0 pt-3 sm:pt-0 border-slate-100">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Client</span>
                                <span class="text-slate-900 font-semibold block">Groupe Industrie Plus</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Date</span>
                                <span class="text-slate-900 font-semibold block">Mars 2023 à aujourd'hui</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    @endsection

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const title = document.getElementById('nx-hero-title');
            if (!title) return;

            const letters = title.querySelectorAll('.nx-letter');
            if (!letters.length) return;

            function playLetterByLetterAnimation() {
                // Fondu de sortie doux pour toutes les lettres
                letters.forEach(function (letter) {
                    letter.style.transition = 'opacity 0.35s ease, transform 0.35s ease, filter 0.35s ease';
                    letter.style.opacity = '0';
                    letter.style.transform = 'translateY(15px) scale(0.85)';
                    letter.style.filter = 'blur(6px)';
                });

                // Reinitialisation et relance de l'animation lettre par lettre
                setTimeout(function () {
                    letters.forEach(function (letter) {
                        letter.style.transition = 'none';
                        letter.style.animation = 'none';
                        letter.style.opacity = '0';
                        letter.style.transform = 'translateY(28px) scale(0.65)';
                        letter.style.filter = 'blur(10px)';
                    });

                    // Force reflow pour garantir le redemarrage de l'animation CSS
                    void title.offsetWidth;

                    // Re-application de l'animation avec delai lettre par lettre
                    letters.forEach(function (letter, idx) {
                        const delay = (0.08 + (idx * 0.065)).toFixed(2);
                        letter.style.animation = `nx-letter-type 0.45s cubic-bezier(0.215, 0.61, 0.355, 1) ${delay}s forwards`;
                    });
                }, 380);
            }

            // Repeter l'animation lettre par lettre toutes les 15 secondes (15000ms)
            setInterval(playLetterByLetterAnimation, 15000);
        });
    </script>
    @endpush

