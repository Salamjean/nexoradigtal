@extends('pages.layouts.app')

@section('title', 'NEXORA DIGITAL SARL - Contact')

@section('content')

@php
    // Arbitrary font sizes only (named sizes like text-lg also force a line-height)
    $fieldText = 'text-[1.125rem] sm:text-[1.25rem] xl:text-[clamp(1.25rem,1.38vw,1.625rem)] font-medium leading-[1.21] text-white';
    $infoLabel = 'text-[0.875rem] sm:text-[1rem] xl:text-[clamp(1rem,1.22vw,1.4375rem)] leading-[1.21]';
    $infoValue = 'text-[1.125rem] xl:text-[clamp(1.25rem,1.7vw,2rem)]';

    $contactForms = [
        [
            'id' => 'renseignements',
            'prefix' => 'rg',
            'title' => 'Renseignements généraux',
            'bg' => 'bg-[#0158ff]/[0.085]',
            'fields' => [
                ['name' => 'name', 'label' => 'Votre nom', 'type' => 'text', 'required' => true, 'autocomplete' => 'name'],
                ['name' => 'email', 'label' => 'Adresse courriel', 'type' => 'email', 'required' => true, 'autocomplete' => 'email'],
                ['name' => 'phone', 'label' => 'Numéro de portable', 'type' => 'tel', 'autocomplete' => 'tel'],
                ['name' => 'subject', 'label' => 'Sujet du message', 'type' => 'text'],
                ['name' => 'message', 'label' => 'Votre message', 'type' => 'textarea'],
            ],
        ],
        [
            'id' => 'carrieres',
            'prefix' => 'cr',
            'title' => 'Opportunités de carrière',
            'bg' => 'bg-[#d9d9d9]/[0.23]',
            'fields' => [
                ['name' => 'name', 'label' => 'Votre nom', 'type' => 'text', 'required' => true, 'autocomplete' => 'name'],
                ['name' => 'email', 'label' => 'Adresse courriel', 'type' => 'email', 'required' => true, 'autocomplete' => 'email'],
                ['name' => 'phone', 'label' => 'Numéro de portable', 'type' => 'tel', 'autocomplete' => 'tel'],
                ['name' => 'subject', 'label' => 'Sujet du message', 'type' => 'text'],
                ['name' => 'skills', 'label' => 'Compétences commerciales', 'type' => 'text'],
                ['name' => 'experience', 'label' => 'Nombre d’années d’expérience', 'type' => 'number'],
                ['name' => 'cv', 'label' => 'Téléchargez votre CV et vos compétences ici', 'type' => 'file'],
                ['name' => 'message', 'label' => 'Votre message', 'type' => 'textarea'],
            ],
        ],
    ];
@endphp

<!-- Figma frame fill is #0158FF at 6% over black -->
<div class="bg-[#00050f] font-inter text-white">

    <!-- ============================================================ -->
    <!-- HERO - Contactez l'equipe -->
    <!-- ============================================================ -->
    <section class="relative overflow-hidden px-4 sm:px-6 lg:px-9 pt-56 lg:pt-72 2xl:pt-[22rem] pb-14 lg:pb-[107px]">

        <!-- Decorative brand mark "n" (top-left) -->
        <img src="{{ asset('assets/img/figma_contact_hero_mark.svg') }}" alt="" aria-hidden="true"
            class="pointer-events-none select-none absolute top-0 -left-[9.25%] w-[37.5%] max-w-[708px] opacity-30">

        <div class="relative z-10 mx-auto max-w-[1822px]">
            <h1 class="text-center text-white nx-display text-[clamp(1.25rem,5.9vw,7.1875rem)] uppercase leading-[0.9] tracking-[-0.02em] whitespace-nowrap select-none">
                {{-- Letters on one line: whitespace between inline-block spans would render as extra spaces --}}
                @foreach (mb_str_split('CONTACTEZ L’EQUIPE') as $i => $char)<span class="nx-letter" style="animation-delay: {{ $i * 0.025 }}s">{{ $char === ' ' ? "\u{00A0}" : $char }}</span>@endforeach
            </h1>
            <div class="mt-3 mx-auto w-28 h-px bg-[#0158ff]"></div>
            <p class="mt-2.5 mx-auto max-w-[800px] text-center font-montserrat text-[1rem] sm:text-[1.125rem] xl:text-[1.25rem] leading-[1.6] text-[#666]">
                Depuis une décennie, NEXORA DIGITAL SARL accompagne les leaders africains dans leur quête d'excellence technologique.
            </p>

            <!-- Jump links to the two forms -->
            <div class="mt-12 lg:mt-24 2xl:mt-[127px] flex flex-col sm:flex-row flex-wrap gap-4 sm:gap-5">
                <a href="#renseignements" class="inline-flex items-center h-16 lg:h-[82px] sm:w-[377px] rounded-full border border-white px-7 lg:px-9 text-lg lg:text-[23px] font-medium text-white hover:bg-white hover:text-[#00050f] transition-colors duration-300">
                    Renseignements généraux
                </a>
                <a href="#carrieres" class="inline-flex items-center h-16 lg:h-[82px] sm:w-[377px] rounded-full border border-white px-7 lg:px-9 text-lg lg:text-[23px] font-medium text-white hover:bg-white hover:text-[#00050f] transition-colors duration-300">
                    Opportunités de carrière
                </a>
            </div>

            <!-- Cookie / Privacy floating icon button -->
            <button type="button" aria-label="Gestion des cookies" class="mt-12 lg:mt-[97px] -ml-3 block rounded-full transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('assets/img/figma_contact_cookie.svg') }}" alt="">
            </button>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- COORDONNEES + CARTE -->
    <!-- ============================================================ -->
    <section class="px-4 sm:px-6 lg:px-9">
        <div class="mx-auto max-w-[1822px] bg-white rounded-[28px] lg:rounded-[37px] overflow-hidden flex flex-col lg:flex-row text-black font-medium">

            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-[46fr_54fr] gap-x-8 gap-y-10 px-6 sm:px-10 py-10 sm:py-12 xl:pl-[min(4.3vw,81px)] xl:pr-[min(3vw,56px)] xl:pt-[min(5vw,95px)] xl:pb-[min(4.9vw,92px)]">
                <!-- Adresse -->
                <div>
                    <h2 class="{{ $infoLabel }}">Adresse</h2>
                    <address class="mt-4 xl:mt-6 not-italic {{ $infoValue }} leading-[1.4]">
                        2ème étage<br>
                        Immeuble NEXORA Center<br>
                        Boulevard de la Paix<br>
                        Zone du Plateau<br>
                        Abidjan<br>
                        Côte d'Ivoire<br>
                        01 BP 1234
                    </address>
                    <img src="{{ asset('assets/img/figma_contact_address_dot.svg') }}" alt="" aria-hidden="true" class="mt-6 w-16 h-16 xl:w-[91px] xl:h-[91px]">
                </div>

                <!-- Email / Carrieres / Telephone -->
                <div class="{{ $infoLabel }}">
                    <h2>Adresse email</h2>
                    <a href="mailto:contact@nexora-digital.com" class="mt-2 xl:mt-[clamp(0.75rem,1.6vw,1.875rem)] block {{ $infoValue }} leading-[1.21] [overflow-wrap:anywhere] hover:text-[#0158ff] transition-colors">contact@nexora-digital.com</a>

                    <h2 class="mt-6 xl:mt-[clamp(1rem,1.27vw,1.5rem)]">Carrières</h2>
                    <a href="mailto:recrutement@nexora-digital.com" class="mt-2 xl:mt-[clamp(0.75rem,1.6vw,1.875rem)] block {{ $infoValue }} leading-[1.21] [overflow-wrap:anywhere] hover:text-[#0158ff] transition-colors">recrutement@nexora-digital.com</a>

                    <h2 class="mt-6 xl:mt-[clamp(1rem,1.27vw,1.5rem)]">Numéro de téléphone</h2>
                    <a href="tel:+2252722400000" class="mt-2 xl:mt-[clamp(0.75rem,1.6vw,1.875rem)] block {{ $infoValue }} leading-[1.21] hover:text-[#0158ff] transition-colors">+225 27 22 40 00 00</a>
                </div>
            </div>

            <!-- Map: object-position matches the pin overlay so it stays on the marker at any crop -->
            <div class="relative h-72 sm:h-96 lg:h-auto lg:w-[33.5%] lg:aspect-[610/666] shrink-0">
                <img src="{{ asset('assets/img/figma_contact_map.png') }}" alt="Localisation de NEXORA DIGITAL SARL à Abidjan" class="absolute inset-0 w-full h-full object-cover object-[48.06%_39.2%]">
                <span class="absolute left-[48.06%] top-[39.2%]" aria-hidden="true">
                    <img src="{{ asset('assets/img/figma_contact_map_pin_n.svg') }}" alt="" class="block">
                    <img src="{{ asset('assets/img/figma_contact_map_pin_flag.svg') }}" alt="" class="absolute left-0 top-0">
                </span>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- FORMULAIRES - Renseignements generaux / Opportunites de carriere -->
    <!-- ============================================================ -->
    @foreach ($contactForms as $form)
        <section id="{{ $form['id'] }}" class="scroll-mt-36 px-4 sm:px-6 lg:px-9 mt-28 lg:mt-[203px]">
            <div class="relative mx-auto max-w-[1822px] rounded-[28px] lg:rounded-[36px] {{ $form['bg'] }} px-5 sm:px-10 pt-[70px] lg:pt-[123px] pb-12 lg:pb-[77px]">

                <!-- Brand mark overlapping the card top -->
                <div class="absolute left-1/2 -translate-x-1/2 -top-[51px] lg:-top-[100px] w-20 lg:w-[156px] aspect-[156/187]" aria-hidden="true">
                    <img src="{{ asset('assets/img/figma_contact_form_n.svg') }}" alt="" class="absolute inset-0 w-full h-full">
                    <img src="{{ asset('assets/img/figma_contact_form_flag.svg') }}" alt="" class="absolute -left-px top-0 w-1/4">
                </div>

                <h2 class="text-center text-[1.5rem] sm:text-[1.875rem] xl:text-[clamp(2rem,2.3vw,2.7rem)] leading-[1.21] font-medium text-white">{{ $form['title'] }}</h2>

                <form method="POST" x-data="{ fileName: '' }" @submit.prevent class="mx-auto max-w-[1344px]">
                    @csrf

                    <div class="mt-12 lg:mt-[90px] space-y-10 lg:space-y-[61px]">
                        @foreach ($form['fields'] as $field)
                            @php $fieldId = $form['prefix'].'-'.$field['name']; @endphp

                            @if ($field['type'] === 'file')
                                <label for="{{ $fieldId }}" class="flex cursor-pointer items-center justify-between gap-4 border-b-2 border-[#d9d9d9] pb-4 lg:pb-[26px] transition-colors hover:border-white focus-within:border-[#0158ff]">
                                    <span class="min-w-0 truncate {{ $fieldText }}" data-placeholder="{{ $field['label'] }}" x-text="fileName || $el.dataset.placeholder">{{ $field['label'] }}</span>
                                    <img src="{{ asset('assets/img/figma_contact_upload.svg') }}" alt="" class="shrink-0">
                                    <input id="{{ $fieldId }}" type="file" name="{{ $field['name'] }}" accept=".pdf,.doc,.docx" class="sr-only"
                                        @change="fileName = $event.target.files.length ? $event.target.files[0].name : ''">
                                </label>
                            @else
                                <div class="relative">
                                    @if ($field['type'] === 'textarea')
                                        <textarea id="{{ $fieldId }}" name="{{ $field['name'] }}" placeholder=" "
                                            class="peer block w-full h-60 lg:h-[465px] resize-none appearance-none rounded-none border-0 border-b-2 border-[#d9d9d9] bg-transparent p-0 pb-4 outline-none transition-colors focus:border-[#0158ff] {{ $fieldText }}"></textarea>
                                    @else
                                        <input id="{{ $fieldId }}" type="{{ $field['type'] }}" name="{{ $field['name'] }}" placeholder=" "
                                            @if (!empty($field['required'])) required @endif
                                            @if (!empty($field['autocomplete'])) autocomplete="{{ $field['autocomplete'] }}" @endif
                                            @if ($field['type'] === 'number') min="0" @endif
                                            class="peer block w-full appearance-none rounded-none border-0 border-b-2 border-[#d9d9d9] bg-transparent p-0 pb-4 lg:pb-6 outline-none transition-colors focus:border-[#0158ff] {{ $fieldText }}">
                                    @endif
                                    <label for="{{ $fieldId }}" class="pointer-events-none absolute left-0 top-0 origin-left transition-transform duration-300 peer-focus:-translate-y-[120%] peer-focus:scale-75 peer-[:not(:placeholder-shown)]:-translate-y-[120%] peer-[:not(:placeholder-shown)]:scale-75 {{ $fieldText }}">
                                        {{ $field['label'] }}@if (!empty($field['required']))<span class="ml-2.5" aria-hidden="true">*</span>@endif
                                    </label>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <label class="mt-12 lg:mt-[55px] block sm:pl-6 text-[1rem] sm:text-[1.125rem] xl:text-[clamp(1.125rem,1.38vw,1.625rem)] font-medium leading-[1.54] text-white">
                        <input type="checkbox" name="consent" required
                            class="inline-block h-[21px] w-[21px] cursor-pointer appearance-none rounded-[2px] bg-[#d9d9d9] align-[-0.15em] transition checked:bg-[#0158ff] checked:shadow-[inset_0_0_0_4px_#d9d9d9] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#0158ff]">
                        En soumettant ce formulaire, vous acceptez notre Politique de confidentialité et consentez à la collecte et à l'utilisation de vos données personnelles afin de répondre à votre demande. Nous respectons votre vie privée et ne partagerons pas vos informations avec des tiers sans votre consentement.
                    </label>

                    <div class="mt-8 lg:mt-[29px] flex justify-center">
                        <button type="submit" class="group inline-flex h-16 lg:h-20 items-center gap-5 rounded-full border border-white/50 pl-7 lg:pl-9 pr-2 lg:pr-2.5 text-base lg:text-[21px] font-medium text-white transition-colors duration-300 hover:border-white hover:bg-white/10">
                            Soumettre votre message
                            <span class="relative flex h-12 w-12 lg:h-[62px] lg:w-[62px] shrink-0 items-center justify-center transition-transform duration-300 group-hover:translate-x-0.5">
                                <img src="{{ asset('assets/img/figma_contact_submit_circle.svg') }}" alt="" class="absolute inset-0 w-full h-full">
                                <img src="{{ asset('assets/img/figma_contact_submit_arrow.svg') }}" alt="" class="relative">
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    @endforeach

</div>
@endsection
