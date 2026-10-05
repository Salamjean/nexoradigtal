@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - Contactez-nous')

@section('content')

@php
    /*
     * Reproduces the Figma frame "Contactez l'équipe" (475:915), laid out at 1886px wide.
     * Desktop measurements use "u" units: --u = 1/1886 of the page width (see home.blade.php).
     *
     * Form fields are underlined rows; y = label top and line = underline top in the Figma frame
     * (line null = no underline in Figma), used to compute the gaps between rows.
     */
    $forms = [
        'renseignements' => [
            'title' => 'Renseignements généraux', 'top' => 1866, 'titleY' => 1989, 'pl' => 238, 'logo' => 100, 'pb' => 77, 'consent' => 47,
            'panel' => 'bg-[#0158ff]/[0.085]',
            'fields' => [
                ['name' => 'name', 'label' => 'Votre nom', 'required' => true, 'y' => 2132, 'line' => 2187],
                ['name' => 'email', 'label' => 'Adresse courriel', 'required' => true, 'type' => 'email', 'y' => 2250, 'line' => 2305],
                ['name' => 'phone', 'label' => 'Numéro de portable', 'type' => 'tel', 'y' => 2368, 'line' => 2423],
                ['name' => 'subject', 'label' => 'Sujet du message', 'y' => 2486, 'line' => 2541],
                ['name' => 'message', 'label' => 'Votre message', 'type' => 'textarea', 'y' => 2604, 'line' => 3069],
            ],
        ],
        'carrieres' => [
            'title' => 'Opportunités de carrière', 'top' => 3633, 'titleY' => 3777, 'pl' => 236, 'logo' => 94, 'pb' => 78, 'consent' => 48,
            'panel' => 'bg-[#d9d9d9]/[0.23]',
            'fields' => [
                ['name' => 'name', 'label' => 'Votre nom', 'required' => true, 'y' => 3898, 'line' => 3952],
                ['name' => 'email', 'label' => 'Adresse courriel', 'required' => true, 'type' => 'email', 'y' => 4017, 'line' => 4072],
                ['name' => 'phone', 'label' => 'Numéro de portable', 'type' => 'tel', 'y' => 4135, 'line' => 4190],
                ['name' => 'subject', 'label' => 'Sujet du message', 'y' => 4253, 'line' => 4307],
                ['name' => 'skills', 'label' => 'Compétences commerciales', 'y' => 4371, 'line' => null],
                ['name' => 'experience', 'label' => 'Nombre d’années d’expérience', 'y' => 4484, 'line' => 4538],
                ['name' => 'cv', 'label' => 'Téléchargez votre CV et vos compétences ici', 'type' => 'file', 'y' => 4601, 'line' => 4686],
                ['name' => 'message', 'label' => 'Votre message', 'type' => 'textarea', 'y' => 4789, 'line' => 5290],
            ],
        ],
    ];
    // Inter 26px text box height (line-height 1.21) and the 43.3px form title box height
    $textH = 31.46;
    $titleH = 52.4;
@endphp

@include('pages.partials.figma-motion')

<!-- Page background = Figma frame fill (#0158FF at 6%) over black -->
<div class="[container-type:inline-size] [--u:calc(100cqw/1886)] bg-[#00050f] font-inter text-white overflow-hidden">

    <!-- ============================================================ -->
    <!-- HERO -->
    <!-- ============================================================ -->
    @include('pages.partials.page-hero', [
        'title' => 'CONTACTEZ L’EQUIPE',
        'video' => null,
        'titleX' => 31,
        'pills' => [
            ['label' => 'Renseignements généraux', 'href' => '#renseignements'],
            ['label' => 'Opportunités de carrière', 'href' => '#carrieres'],
        ],
    ])

    <!-- ============================================================ -->
    <!-- COORDONNEES + CARTE -->
    <!-- ============================================================ -->
    <section class="px-4 sm:px-6 pt-6 lg:px-0 lg:pl-[calc(37*var(--u))] lg:pt-[calc(88*var(--u))]">
        <div class="overflow-hidden rounded-3xl bg-white text-black font-medium flex flex-col lg:flex-row lg:w-[calc(1819*var(--u))] lg:h-[calc(666*var(--u))] lg:rounded-[calc(37*var(--u))]">
            <div class="flex flex-col gap-10 p-6 sm:p-10 sm:flex-row lg:gap-0 lg:p-0 lg:w-[calc(1212*var(--u))] lg:shrink-0 lg:pt-[calc(95*var(--u))]">
                <div class="lg:ml-[calc(81*var(--u))] lg:w-[calc(524*var(--u))]">
                    <p class="leading-[1.21] text-base lg:text-[max(12px,calc(23*var(--u)))]">Adresse</p>
                    <address class="not-italic mt-3 leading-[1.406] text-xl lg:mt-[calc(26*var(--u))] lg:-ml-px lg:text-[max(14px,calc(32*var(--u)))]">
                        2ème étage<br>Immeuble NEXORA Center<br>Boulevard de la Paix<br>Zone du Plateau<br>Abidjan<br>Côte d'Ivoire<br>01 BP 1234
                    </address>
                    <a href="https://www.google.com/maps/search/?api=1&query=Boulevard+de+la+Paix+Plateau+Abidjan" target="_blank" rel="noopener"
                        aria-label="Voir l'adresse sur Google Maps"
                        class="mt-5 block w-16 h-16 rounded-full bg-[#0158ff] transition-transform duration-300 hover:scale-105 lg:mt-[calc(19*var(--u))] lg:-ml-[calc(3.5*var(--u))] lg:w-[calc(91*var(--u))] lg:h-[calc(91*var(--u))]"></a>
                </div>
                <dl class="leading-[1.21]">
                    <dt class="leading-[1.21] text-base lg:text-[max(12px,calc(23*var(--u)))]">Adresse email</dt>
                    <dd class="leading-[1.21] mt-2 text-xl lg:mt-[calc(32.2*var(--u))] lg:text-[max(14px,calc(32*var(--u)))]"><a href="mailto:contact@nexora-digital.com" class="transition-colors hover:text-[#0158ff]">contact@nexora-digital.com</a></dd>
                    <dt class="leading-[1.21] mt-5 text-base lg:mt-[calc(24.3*var(--u))] lg:ml-[calc(3*var(--u))] lg:text-[max(12px,calc(23*var(--u)))]">Carrières</dt>
                    <dd class="leading-[1.21] mt-2 text-xl lg:mt-[calc(33.2*var(--u))] lg:ml-[calc(3*var(--u))] lg:text-[max(14px,calc(32*var(--u)))]"><a href="mailto:recrutement@nexora-digital.com" class="transition-colors hover:text-[#0158ff]">recrutement@nexora-digital.com</a></dd>
                    <dt class="leading-[1.21] mt-5 text-base lg:mt-[calc(26.3*var(--u))] lg:ml-[calc(3*var(--u))] lg:text-[max(12px,calc(23*var(--u)))]">Numéro de téléphone</dt>
                    <dd class="leading-[1.21] mt-2 text-xl lg:mt-[calc(31.2*var(--u))] lg:ml-[calc(3*var(--u))] lg:text-[max(14px,calc(32*var(--u)))]"><a href="tel:+2252722400000" class="transition-colors hover:text-[#0158ff]">+225 27 22 40 00 00</a></dd>
                </dl>
            </div>
            <!-- Map with the NEXORA "n" marker -->
            <div class="relative w-full aspect-[610/666] lg:aspect-auto lg:w-[calc(610*var(--u))] lg:h-full">
                <img src="{{ asset('assets/img/figma_contact_map.jpg') }}" alt="Plan d'accès : NEXORA, Abidjan" class="absolute inset-0 w-full h-full object-cover">
                <img src="{{ asset('assets/img/figma_contact_map_n.svg') }}" alt="" aria-hidden="true" class="absolute left-[46.23%] top-[39.19%] w-[2.3%] h-auto">
                <img src="{{ asset('assets/img/figma_contact_map_flag.svg') }}" alt="" aria-hidden="true" class="absolute left-[46.23%] top-[39.19%] w-[0.66%] h-auto">
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- FORMS: Renseignements généraux / Opportunités de carrière -->
    <!-- ============================================================ -->
    @foreach ($forms as $type => $form)
        @php
            $errors_ = $errors->getBag($type);
            $sent = session('contact_sent') === $type;
            $prevBottom = $form['titleY'] + $titleH;
        @endphp
        <section id="{{ $type }}" class="scroll-mt-28 px-4 sm:px-6 pt-28 lg:px-0 lg:pl-[calc(37*var(--u))] lg:scroll-mt-[calc(130*var(--u))] {{ $loop->first ? 'lg:pt-[calc(203*var(--u))]' : 'lg:pt-[calc(207*var(--u))]' }} {{ $loop->last ? 'pb-16 lg:pb-[calc(100*var(--u))]' : '' }}">
            <div class="relative rounded-3xl {{ $form['panel'] }} px-5 pt-16 pb-10 sm:px-10 lg:w-[calc(1822*var(--u))] lg:rounded-[calc(36*var(--u))] lg:pl-[calc(var(--pl)*var(--u))] lg:pr-0 lg:pt-[calc(var(--pt)*var(--u))] lg:pb-[calc(var(--pb)*var(--u))]"
                style="--pl: {{ $form['pl'] }}; --pt: {{ $form['titleY'] - $form['top'] }}; --pb: {{ $form['pb'] }}; --logo: {{ $form['logo'] }}">
                <!-- Brand "n" overlapping the top of the panel -->
                <span class="pointer-events-none absolute left-1/2 -top-20 w-16 -translate-x-1/2 lg:translate-x-0 lg:left-[calc(838*var(--u))] lg:-top-[calc(var(--logo)*var(--u))] lg:w-[calc(156*var(--u))]" aria-hidden="true">
                    <img src="{{ asset('assets/img/figma_contact_mark.svg') }}" alt="" class="block w-full h-auto">
                    <img src="{{ asset('assets/img/figma_contact_mark_flag.svg') }}" alt="" class="absolute -left-px top-0 w-[25%] h-auto">
                </span>

                <h2 class="text-center font-medium leading-[1.21] text-2xl lg:-ml-[calc(var(--pl)*var(--u))] lg:text-[max(20px,calc(43.3*var(--u)))]">{{ $form['title'] }}</h2>

                <form method="POST" action="{{ route('contact.send') }}" @if ($type === 'carrieres') enctype="multipart/form-data" @endif
                    class="lg:w-[calc(1344*var(--u))]" x-data="{ file: '' }">
                    @csrf
                    <input type="hidden" name="type" value="{{ $type }}">

                    @foreach ($form['fields'] as $field)
                        @php
                            $kind = $field['type'] ?? 'text';
                            $line = $field['line'] ?? ($field['y'] + 54);
                            $mt = round($field['y'] - $prevBottom, 1);
                            $pb = round($line - $field['y'] - $textH, 1);
                            $prevBottom = $line + 2;
                            $placeholder = $field['label'] . (($field['required'] ?? false) ? ' *' : '');
                            $id = $type . '-' . $field['name'];
                        @endphp
                        <div class="mt-8 lg:mt-[calc(var(--mt)*var(--u))]" style="--mt: {{ $mt }}; --pb: {{ $pb }}; --h: {{ $line - $field['y'] }}">
                            <label for="{{ $id }}" class="sr-only">{{ $placeholder }}</label>
                            @if ($kind === 'textarea')
                                <textarea id="{{ $id }}" name="{{ $field['name'] }}" placeholder="{{ $placeholder }}" @required($field['required'] ?? false)
                                    class="block w-full h-56 resize-none bg-transparent border-b-2 border-[#d9d9d9] font-medium text-white placeholder:text-white leading-[1.21] text-lg outline-none transition-colors focus:border-[#0158ff] lg:h-[calc(var(--h)*var(--u))] lg:text-[max(14px,calc(26*var(--u)))]">{{ session('contact_form') === $type ? old('message') : '' }}</textarea>
                            @elseif ($kind === 'file')
                                <label for="{{ $id }}" class="flex cursor-pointer items-center justify-between gap-4 border-b-2 border-[#d9d9d9] pb-4 font-medium leading-[1.21] text-lg transition-colors hover:border-[#0158ff] lg:pb-[calc(var(--pb)*var(--u))] lg:text-[max(14px,calc(26*var(--u)))]">
                                    <span x-text="file || @js($field['label'])">{{ $field['label'] }}</span>
                                    <img src="{{ asset('assets/img/figma_contact_download.svg') }}" alt="" class="shrink-0 w-10 -my-2 lg:w-[calc(59*var(--u))] lg:-my-[calc(14*var(--u))] lg:-mr-[calc(7*var(--u))]">
                                </label>
                                <input id="{{ $id }}" type="file" name="cv" accept=".pdf,.doc,.docx" class="sr-only" @change="file = $event.target.files[0]?.name || ''">
                            @else
                                <input id="{{ $id }}" type="{{ $kind }}" name="{{ $field['name'] }}" placeholder="{{ $placeholder }}" @required($field['required'] ?? false)
                                    value="{{ session('contact_form') === $type ? old($field['name']) : '' }}"
                                    class="block w-full bg-transparent border-b-2 {{ $field['line'] ? 'border-[#d9d9d9]' : 'border-transparent' }} pb-4 font-medium text-white placeholder:text-white leading-[1.21] text-lg outline-none transition-colors focus:border-[#0158ff] lg:pb-[calc(var(--pb)*var(--u))] lg:text-[max(14px,calc(26*var(--u)))]">
                            @endif
                            @if ($errors_->has($field['name']))
                                <p class="mt-2 text-sm text-[#ff6b6b]">{{ $errors_->first($field['name']) }}</p>
                            @endif
                        </div>
                    @endforeach

                    <!-- Consent -->
                    <label style="--consent: {{ $form['consent'] }}" class="mt-8 block font-medium leading-[1.538] text-base lg:mt-[calc(var(--consent)*var(--u))] lg:ml-[calc(25*var(--u))] lg:w-[calc(1317*var(--u))] lg:text-[max(13px,calc(26*var(--u)))]">
                        <input type="checkbox" name="consent" value="1" required
                            class="appearance-none inline-block align-[-0.1em] w-4 h-4 mr-2 rounded-[2px] bg-[#d9d9d9] cursor-pointer transition-colors checked:bg-[#0158ff] checked:shadow-[inset_0_0_0_3px_#d9d9d9] lg:w-[calc(21*var(--u))] lg:h-[calc(21*var(--u))] lg:mr-[calc(7*var(--u))]">En soumettant ce formulaire, vous acceptez notre Politique de confidentialité et consentez à la collecte <br class="hidden lg:inline">et à l'utilisation de vos données personnelles afin de répondre à votre demande. Nous respectons votre <br class="hidden lg:inline">vie privée et ne partagerons pas vos informations avec des tiers sans votre consentement.
                    </label>
                    @if ($errors_->has('consent'))
                        <p class="mt-2 text-sm text-[#ff6b6b] lg:ml-[calc(25*var(--u))]">{{ $errors_->first('consent') }}</p>
                    @endif

                    @if ($sent)
                        <p class="mt-6 text-center font-medium text-[#4ade80] lg:mt-[calc(20*var(--u))] lg:text-[max(13px,calc(20*var(--u)))]" role="status">Merci ! Votre message a bien été envoyé, notre équipe vous répondra rapidement.</p>
                    @endif

                    <div class="mt-8 flex justify-center lg:mt-[calc(33*var(--u))]">
                        <button type="submit"
                            class="inline-flex items-center justify-between gap-4 h-14 rounded-full border border-white/50 pl-6 pr-1.5 font-medium text-[15px] whitespace-nowrap transition-shadow duration-300 hover:shadow-[0_0_20px_4px_rgba(1,88,255,0.45)] lg:h-[calc(80*var(--u))] lg:min-w-[calc(387*var(--u))] lg:pl-[calc(36*var(--u))] lg:pr-[calc(9*var(--u))] lg:text-[max(12px,calc(21*var(--u)))]">
                            Soumettre votre message
                            <span class="flex shrink-0 items-center justify-center w-11 h-11 rounded-full bg-[#0158ff] lg:w-[calc(62*var(--u))] lg:h-[calc(62*var(--u))]">
                                <img src="{{ asset('assets/img/figma_home_btn_flag.svg') }}" alt="" class="w-4 h-auto rotate-[73.96deg] lg:w-[calc(22*var(--u))]">
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    @endforeach
</div>

@endsection
