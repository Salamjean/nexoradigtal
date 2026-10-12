<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Administration') · {{ Site::get('company_name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/fonts/eurostile.css') }}" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                fontFamily: { sans: ['"Inter"', 'ui-sans-serif', 'system-ui', 'sans-serif'], eurostile: ['"Eurostile Extended"', 'sans-serif'] },
                colors: { brand: { DEFAULT: '#0158ff', dark: '#0045cc', ink: '#00050f', navy: '#000d26' } },
            } },
        }
    </script>
    <style>[x-cloak] { display: none !important; }</style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen bg-[#f3f5fa] font-sans text-slate-800 antialiased">

@hasSection('guest')
    @yield('guest')
@else
    @php
        $nav = [
            ['route' => 'admin.dashboard', 'match' => 'admin.dashboard', 'label' => 'Tableau de bord', 'icon' => 'M3 12l9-9 9 9M5 10v10h5v-6h4v6h5V10'],
            ['route' => 'admin.settings.edit', 'match' => 'admin.settings.*', 'label' => 'Entreprise', 'icon' => 'M4 21V5a2 2 0 012-2h8a2 2 0 012 2v16M16 9h2a2 2 0 012 2v10M8 7h4M8 11h4M8 15h4M3 21h18'],
            ['route' => 'admin.services.index', 'match' => 'admin.services.*', 'label' => 'Services', 'icon' => 'M4 5h16v4H4zM4 11h7v8H4zM14 11h6v8h-6z'],
            ['route' => 'admin.projects.index', 'match' => 'admin.projects.*', 'label' => 'Projets', 'icon' => 'M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z'],
            ['route' => 'admin.team.index', 'match' => 'admin.team.*', 'label' => 'Équipe', 'icon' => 'M16 19v-1a4 4 0 00-4-4H7a4 4 0 00-4 4v1M9.5 10a3.5 3.5 0 100-7 3.5 3.5 0 000 7zM21 19v-1a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75'],
            ['route' => 'admin.messages.index', 'match' => 'admin.messages.*', 'label' => 'Messages', 'icon' => 'M4 6h16v12H4zM4 7l8 6 8-6', 'badge' => \App\Models\ContactMessage::query()->whereNull('read_at')->count()],
            ['route' => 'admin.account.edit', 'match' => 'admin.account.*', 'label' => 'Mon compte', 'icon' => 'M12 12a4 4 0 100-8 4 4 0 000 8zM4 21a8 8 0 0116 0'],
        ];
    @endphp

    <div x-data="{ menu: false }" class="min-h-screen lg:flex">
        <!-- Sidebar -->
        <aside :class="menu ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-40 flex w-72 flex-col bg-brand-ink text-white transition-transform duration-300 lg:sticky lg:top-0 lg:h-screen lg:translate-x-0">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-6 py-6 border-b border-white/10">
                <img src="{{ asset('assets/img/figma_nav_logo.svg') }}" alt="" class="h-10 w-auto">
                <span>
                    <span class="block font-eurostile font-bold text-sm tracking-wide">NEXORA</span>
                    <span class="block text-xs text-white/50">Administration du site</span>
                </span>
            </a>
            <nav class="flex-1 overflow-y-auto px-3 py-5 space-y-1 text-sm font-medium">
                @foreach ($nav as $item)
                    @php $active = request()->routeIs($item['match']); @endphp
                    <a href="{{ route($item['route']) }}" @if ($active) aria-current="page" @endif
                        class="flex items-center gap-3 rounded-xl px-4 py-3 transition-colors {{ $active ? 'bg-brand text-white' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
                        <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="{{ $item['icon'] }}"/></svg>
                        <span class="flex-1">{{ $item['label'] }}</span>
                        @if (! empty($item['badge']))
                            <span class="rounded-full bg-white px-2 py-0.5 text-xs font-semibold text-brand">{{ $item['badge'] }}</span>
                        @endif
                    </a>
                @endforeach
            </nav>
            <div class="border-t border-white/10 p-4 space-y-2">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-center gap-2 rounded-xl border border-white/15 px-4 py-2.5 text-sm text-white/80 hover:bg-white/5">
                    Voir le site
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M14 4h6v6M20 4l-9 9M19 14v5a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1h5"/></svg>
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full rounded-xl px-4 py-2.5 text-sm text-white/60 hover:bg-white/5 hover:text-white">Se déconnecter</button>
                </form>
            </div>
        </aside>
        <div x-show="menu" x-cloak @click="menu = false" class="fixed inset-0 z-30 bg-black/40 lg:hidden"></div>

        <!-- Main -->
        <div class="flex-1 min-w-0">
            <header class="sticky top-0 z-20 flex items-center gap-4 border-b border-slate-200 bg-white/90 px-5 py-4 backdrop-blur lg:px-10">
                <button type="button" @click="menu = true" class="rounded-lg p-2 text-slate-600 hover:bg-slate-100 lg:hidden" aria-label="Ouvrir le menu">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h1 class="flex-1 truncate text-lg font-semibold text-slate-900">@yield('heading')</h1>
                <span class="hidden text-sm text-slate-500 sm:block">{{ auth()->user()->name }}</span>
            </header>

            <main class="px-5 py-8 lg:px-10">
                @if (session('status'))
                    <div class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800" role="status">
                        <svg class="mt-0.5 h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 13l4 4L19 7"/></svg>
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                        Certains champs sont à corriger : voir les messages en rouge ci-dessous.
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
@endif

</body>
</html>
