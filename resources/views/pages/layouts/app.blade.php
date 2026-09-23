<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'NEXORA DIGITAL SARL - Solutions & Transformation Digitale')</title>
    <meta name="description" content="NEXORA DIGITAL SARL - Votre partenaire de confiance pour la transformation numérique, le développement de solutions web & mobiles sur mesure et l'innovation technologique.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:wght@700;800;900&family=Montserrat:wght@300;400;500;600;700&family=Big+Shoulders+Display:wght@700;900&family=Inter:wght@400;500;600&family=Michroma&display=swap" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Tailwind & Custom Styles (Vite with CDN fallback) -->
    @if (file_exists(public_path('hot')) || file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                            heading: ['"Poppins"', 'sans-serif'],
                            montserrat: ['"Montserrat"', 'sans-serif'],
                            stat: ['"Big Shoulders Display"', 'sans-serif'],
                            inter: ['"Inter"', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
        <style>
            .font-heading {
                font-family: 'Poppins', sans-serif;
            }
            /* Mirror of the hero title letter reveal in resources/css/app.css */
            @keyframes nx-letter-in {
                from { opacity: 0; transform: translateY(16px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .nx-letter {
                display: inline-block;
                opacity: 0;
                animation: nx-letter-in 0.45s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            }
            .nx-intro .nx-letter {
                animation-play-state: paused;
            }
            @media (prefers-reduced-motion: reduce) {
                .nx-letter {
                    animation: none;
                    opacity: 1;
                }
            }
        </style>
    @endif

    <!-- Display font: Eurostile Extended Bold (Figma titles). Commercial font: drop the licensed
         file(s) in public/assets/fonts/ as EurostileExtended-Bold.{woff2,woff,otf,ttf} and it is used automatically. -->
    @php
        $eurostileSources = collect(['woff2' => 'woff2', 'woff' => 'woff', 'otf' => 'opentype', 'ttf' => 'truetype'])
            ->filter(fn ($format, $ext) => file_exists(public_path("assets/fonts/EurostileExtended-Bold.$ext")))
            ->map(fn ($format, $ext) => "url('".asset("assets/fonts/EurostileExtended-Bold.$ext")."') format('$format')")
            ->prepend("local('Eurostile Extended Bold'), local('EurostileExtended-Bold'), local('Eurostile-BoldExtendedTwo'), local('EurostileLTStd-BoldEx2')")
            ->implode(', ');
    @endphp
    <style>
        @font-face {
            font-family: 'Eurostile Extended';
            src: {!! $eurostileSources !!};
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
        .nx-display {
            font-family: 'Eurostile Extended', 'Michroma', sans-serif;
            font-weight: 700;
        }
        /* Until Eurostile is available, Michroma stands in: thicken it with a stroke to match the Bold weight */
        html:not(.nx-eurostile) .nx-display {
            font-weight: 400;
            -webkit-text-stroke: 0.07em currentColor;
        }
    </style>
    <script>
        if (document.fonts) {
            // A missing font rejects the FontFace's own `loaded` promise too: mark it handled
            document.fonts.forEach(function (face) {
                if (face.family.indexOf('Eurostile Extended') !== -1) face.loaded.catch(function () {});
            });
            document.fonts.load('700 1em "Eurostile Extended"').then(function (faces) {
                if (faces.length) document.documentElement.classList.add('nx-eurostile');
            }).catch(function () { /* font not available: keep the Michroma fallback */ });
        }
    </script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased selection:bg-blue-600 selection:text-white min-h-screen flex flex-col overflow-x-hidden">

    <!-- Écran de chargement avec vidéo d'intro (Nexora Logo Reveal - 1 seule fois par session) -->
    <script>
        if (sessionStorage.getItem('nx_intro_seen')) {
            document.write('<style>#nx-preloader{display:none !important;}</style>');
        }
    </script>
    <div id="nx-preloader" class="fixed inset-0 z-[99999] bg-white flex items-center justify-center transition-opacity duration-700 ease-out">
        <div class="relative w-full h-full flex items-center justify-center overflow-hidden bg-white">
            <video id="nx-preloader-video" 
                   src="{{ asset('assets/video/nexora-logo-reveal.mp4') }}" 
                   autoplay 
                   muted 
                   playsinline 
                   preload="auto"
                   class="w-full h-full object-contain md:object-cover bg-white">
            </video>
            <!-- Bouton passer -->
            <button id="nx-preloader-skip" 
                    type="button" 
                    class="absolute bottom-6 right-6 z-10 px-4 py-2 bg-slate-900/80 hover:bg-slate-900 text-white backdrop-blur-md rounded-full text-xs font-semibold shadow-lg transition-all duration-300">
                Passer &rarr;
            </button>
        </div>
    </div>
    <script>
        (function () {
            var overlay = document.getElementById('nx-preloader');
            if (sessionStorage.getItem('nx_intro_seen')) {
                if (overlay && overlay.parentNode) {
                    overlay.parentNode.removeChild(overlay);
                }
                return;
            }

            // Marquer l'intro comme vue pour cette session
            sessionStorage.setItem('nx_intro_seen', '1');

            var video = document.getElementById('nx-preloader-video');
            var skip = document.getElementById('nx-preloader-skip');
            if (!overlay || !video) return;

            // Masquer le défilement pendant l'animation (et retenir l'animation des titres jusqu'à la fermeture)
            document.documentElement.classList.add('overflow-hidden', 'nx-intro');
            document.body.classList.add('overflow-hidden');

            // Configuration impérative du mode muet pour contourner les restrictions d'autoplay des navigateurs
            video.muted = true;
            video.defaultMuted = true;
            video.playsInline = true;
            video.setAttribute('muted', '');
            video.setAttribute('playsinline', '');

            var closed = false;
            function closePreloader() {
                if (closed) return;
                closed = true;

                // Réactiver le défilement et lancer l'animation des titres
                document.documentElement.classList.remove('overflow-hidden', 'nx-intro');
                document.body.classList.remove('overflow-hidden');

                // Effet de fondu de sortie
                overlay.style.opacity = '0';
                overlay.style.pointerEvents = 'none';

                setTimeout(function () {
                    if (overlay && overlay.parentNode) {
                        overlay.parentNode.removeChild(overlay);
                    }
                }, 700);
            }

            function startPlayback() {
                try {
                    video.currentTime = 0;
                } catch (e) {}
                
                var playPromise = video.play();
                if (playPromise !== undefined) {
                    playPromise.catch(function (error) {
                        console.warn("Autoplay restreint par le navigateur. Attente d'une interaction utilisateur :", error);
                        // Si le navigateur exige une interaction utilisateur
                        var handleInteraction = function () {
                            video.play().catch(function(){});
                            document.removeEventListener('click', handleInteraction);
                            document.removeEventListener('touchstart', handleInteraction);
                        };
                        document.addEventListener('click', handleInteraction, { once: true });
                        document.addEventListener('touchstart', handleInteraction, { once: true });
                    });
                }
            }

            // Démarrer la lecture dès que le script s'exécute
            startPlayback();

            // Si le flux n'était pas encore prêt, relancer à la première opportunité
            video.addEventListener('canplay', function () {
                if (video.paused) {
                    startPlayback();
                }
            });

            // À la fin de la vidéo, maintenir l'image du logo révélé pendant 800ms avant le fondu de sortie
            video.addEventListener('ended', function () {
                setTimeout(closePreloader, 800);
            });

            // En cas d'erreur de la vidéo, débloquer la page
            video.addEventListener('error', function () {
                closePreloader();
            });

            // Bouton Passer
            if (skip) {
                skip.addEventListener('click', closePreloader);
            }

            // Sécurité : fermeture automatique au bout de 6 secondes max
            setTimeout(closePreloader, 6000);
        })();
    </script>


    <!-- Navigation Header -->
    @include('pages.layouts.navbar')

    <!-- Main Page Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('pages.layouts.footer')

    <!-- Alpine.js / Custom Interactions Script -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('scripts')
</body>
</html>
