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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:wght@700;800;900&family=Montserrat:wght@300;400;500;600;700&family=Big+Shoulders+Display:wght@700;900&family=Michroma&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/fonts/monument.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/eurostile.css') }}" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/monument-extended" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/eurostile-extended" rel="stylesheet">

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
                            heading: ['"Monument Extended"', '"Eurostile Extended"', '"Eurostile Extended Local"', '"Michroma"', '"Poppins"', 'sans-serif'],
                            montserrat: ['"Montserrat"', 'sans-serif'],
                            stat: ['"Big Shoulders Display"', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
        <style>
            .font-heading {
                font-family: 'Monument Extended', 'Eurostile Extended', 'Michroma', 'Poppins', sans-serif !important;
            }
            @keyframes nx-letter-type {
                0% {
                    opacity: 0;
                    transform: translateY(28px) scale(0.65);
                    filter: blur(10px);
                }
                60% {
                    opacity: 1;
                    transform: translateY(-3px) scale(1.06);
                    filter: blur(0px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                    filter: blur(0px);
                }
            }
            .nx-letter {
                display: inline-block;
                opacity: 0;
                animation: nx-letter-type 0.45s cubic-bezier(0.215, 0.61, 0.355, 1) forwards;
                will-change: transform, opacity, filter;
            }
            @media (prefers-reduced-motion: reduce) {
                .nx-letter {
                    animation: none !important;
                    opacity: 1 !important;
                }
            }
        </style>
    @endif
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased selection:bg-blue-600 selection:text-white min-h-screen flex flex-col overflow-x-hidden">

    <!-- Intro loading screen (plays once per browser session) -->
    <div id="nx-intro" class="fixed inset-0 z-[9999] bg-[#0d0d0d] flex items-center justify-center">
        <video id="nx-intro-video" src="{{ asset('assets/video/nexora-logo-reveal.mp4') }}" autoplay muted playsinline class="absolute inset-0 w-full h-full object-cover"></video>
        <button id="nx-intro-skip" type="button" class="absolute bottom-8 right-8 text-white/50 hover:text-white text-sm font-medium transition">
            Passer &rarr;
        </button>
    </div>
    <script>
        (function () {
            var overlay = document.getElementById('nx-intro');
            if (sessionStorage.getItem('nx_intro_seen')) {
                overlay.remove();
                return;
            }
            document.documentElement.style.overflow = 'hidden';
            var video = document.getElementById('nx-intro-video');
            var skip = document.getElementById('nx-intro-skip');
            var closed = false;
            function closeIntro() {
                if (closed) return;
                closed = true;
                sessionStorage.setItem('nx_intro_seen', '1');
                document.documentElement.style.overflow = '';
                overlay.style.transition = 'opacity 0.5s ease';
                overlay.style.opacity = '0';
                setTimeout(function () { overlay.remove(); }, 500);
            }
            video.addEventListener('ended', closeIntro);
            video.addEventListener('error', closeIntro);
            skip.addEventListener('click', closeIntro);
            setTimeout(closeIntro, 6000);
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

    <!-- Fixed Floating Action Buttons (Cookie & Call) - Enlarged & Aligned on bottom-6 horizontal line -->
    <div class="fixed bottom-6 left-4 sm:left-8 z-50">
        <button type="button" aria-label="Gestion des cookies" class="w-13 h-13 sm:w-14 sm:h-14 rounded-full bg-blue-600 hover:bg-blue-500 text-white flex items-center justify-center shadow-xl shadow-blue-600/40 transition-all duration-300 hover:scale-110 focus:outline-none">
            <i class="fa-solid fa-cookie-bite text-lg sm:text-xl"></i>
        </button>
    </div>

    <div class="fixed bottom-6 right-4 sm:right-8 z-50">
        <a href="tel:+2250171755000" aria-label="Appelez-nous" class="w-13 h-13 sm:w-14 sm:h-14 rounded-full bg-blue-600 hover:bg-blue-500 text-white flex items-center justify-center shadow-xl shadow-blue-600/40 transition-all duration-300 hover:scale-110 flex">
            <i class="fa-solid fa-phone text-lg sm:text-xl"></i>
        </a>
    </div>

</body>

</html>
