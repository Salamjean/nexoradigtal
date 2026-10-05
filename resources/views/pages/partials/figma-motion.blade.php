{{--
    Shared Figma motion for the pages built from the 1886px "R" frames:
    - hero title letter reveal (fade + 14px rise, 0.65s expo-out; delays set inline, 0.16s stagger)
    - floating phone button pulse (35s loop on the home frame, 3.05s loop on the about frame)
    The hero element needs the "nxh-hero" class. Once the intro video overlay is gone the reveal plays
    (and replays every 35s) and a "nx:hero-start" event is dispatched on document for page-specific motion.
--}}
<style>
    .nxh-letter { display: inline-block; opacity: 0; transform: translateY(14px); }
    .nxh-hero.is-playing .nxh-letter { animation: nxh-letter-in 0.65s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    @keyframes nxh-letter-in { to { opacity: 1; transform: translateY(0); } }

    /* Double pulse (opacity 0.2 / scale 1.1) at the start of each loop */
    .nxh-phone-35 { animation: nxh-phone-35 35s linear infinite; }
    @keyframes nxh-phone-35 {
        0%, 2.286%, 4.571%, 100% { opacity: 1; transform: scale(1); animation-timing-function: ease-in-out; }
        1.143%, 3.429% { opacity: 0.2; transform: scale(1.1); animation-timing-function: ease-in-out; }
    }
    .nxh-phone-3 { animation: nxh-phone-3 3.05s linear infinite; }
    @keyframes nxh-phone-3 {
        0%, 26.23%, 52.459%, 100% { opacity: 1; transform: scale(1); animation-timing-function: ease-in-out; }
        13.115%, 39.344% { opacity: 0.2; transform: scale(1.1); animation-timing-function: ease-in-out; }
    }

    @media (prefers-reduced-motion: reduce) {
        .nxh-letter { opacity: 1; transform: none; }
        .nxh-hero.is-playing .nxh-letter, .nxh-phone-35, .nxh-phone-3 { animation: none; }
    }
</style>

@push('scripts')
    <script>
        (function () {
            var hero = document.querySelector('.nxh-hero');
            if (!hero) return;

            function playHero() {
                hero.classList.remove('is-playing');
                void hero.offsetWidth;
                hero.classList.add('is-playing');
            }

            function start() {
                playHero();
                setInterval(playHero, 35000);
                document.dispatchEvent(new CustomEvent('nx:hero-start'));
            }

            // Wait for the intro video overlay (first visit) to be gone so the animations are visible.
            // Start on DOMContentLoaded so page scripts pushed after this one can listen to "nx:hero-start".
            if (!document.getElementById('nx-intro')) {
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', start);
                } else {
                    setTimeout(start, 0);
                }
            } else {
                new MutationObserver(function (_, observer) {
                    if (!document.getElementById('nx-intro')) {
                        observer.disconnect();
                        start();
                    }
                }).observe(document.body, { childList: true });
            }
        })();
    </script>
@endpush
