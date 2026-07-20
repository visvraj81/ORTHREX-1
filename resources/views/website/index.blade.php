@extends('website.main')
@section('content')

<style>

	.carousel-indicators [data-bs-target] {
    /* width: 10px;
    height: 10px; */
    /* border-radius: 50%; */
    background-color: #Ba8523;
    /* opacity: 0.5;
    transition: all 0.3s ease; */
}

.carousel-indicators .active {
    background-color: #Ba8523;
    opacity: 1;
    /* width: 14px;
    height: 14px; */
}
</style>
<!-- InstanceBeginEditable name="slider" -->
<!-- Slider Home Section -->
<div id="carouselExampleAutoplaying" class="carousel slide res-pt" data-bs-ride="carousel" data-bs-interval="3000" data-bs-touch="false">#Ba8523


    {{-- Total slides count (for your reference / debugging) --}}
    {{-- Total Slides: {{ count($slider) }} --}}

    <!-- Indicators (dots) -->
    <div class="carousel-indicators">
        @foreach ($slider as $i)
            <button type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide-to="{{ $loop->index }}"
                class="{{ $loop->first ? 'active' : '' }}"
                @if($loop->first) aria-current="true" @endif
                aria-label="Slide {{ $loop->iteration }}"></button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @forelse ($slider as $i)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                @if ($i->type == 'image')
                    <img src="{{ asset($i->file) }}" class="d-block w-100" alt="Slider Image {{ $loop->iteration }}">
                @elseif ($i->type == 'video')
                    <video class="d-block w-100" autoplay muted loop playsinline>
                        <source src="{{ asset($i->file) }}" type="video/mp4">
                        {{ t('Your browser does not support the video tag.') }}
                    </video>
                @endif
            </div>
        @empty
            <div class="carousel-item active">
                <img src="{{ asset('assets/images/default-slider.jpg') }}" class="d-block w-100" alt="{{ t('No Slider Found') }}">
            </div>
        @endforelse
    </div>

    <!-- Prev / Next Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">{{ t('Previous') }}</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">{{ t('Next') }}</span>
    </button>
</div>
<!-- Slider Home Section -->
<!-- InstanceEndEditable -->

<!-- InstanceBeginEditable name="matter" -->
<!-- Trusted By Section -->
<section class="section work-process-banner">
    <div class="hero-container">
        <div class="work-process__container">
            <div class="case-studies__heading">
                <div class="sub-heading-container text-center">{{ t('TRUSTED BY SURGEONS. CHOOSEN FOR LIFE.') }}</div>
                <div class="sub-heading-divider-about"></div>
            </div>

            <div class="work-process__grid pt-5">
                <div class="work-process__item animation-box anim-fast anim-delay-none" data-animation="fade-down">
                    <div class="work-process__step-header"><img src="assets/images/icons/premium-quality.svg" alt=""></div>
                    <h5>{{ t('PREMIUM QUALITY') }} <br> {{ t('IMPLANTS') }}</h5>
                </div>

                <div class="work-process__item animation-box anim-normal anim-delay-sm" data-animation="fade-down">
                    <div class="work-process__step-header"><img src="assets/images/icons/precision-engineered.svg" alt=""></div>
                    <h5>{{ t('PRECISION') }} <br> {{ t('ENGINEERED') }}</h5>
                </div>

                <div class="work-process__item animation-box anim-normal anim-delay-md" data-animation="fade-down">
                    <div class="work-process__step-header"><img src="assets/images/icons/surgeon.svg" alt=""></div>
                    <h5>{{ t('TRUSTED BY 500+') }} <br> {{ t('SURGEONS') }}</h5>
                </div>

                <div class="work-process__item animation-box anim-slow anim-delay-md" data-animation="fade-down">
                    <div class="work-process__step-header"><img src="assets/images/icons/countries.svg" alt=""></div>
                    <h5>{{ t('PRESENCE IN 20+') }} <br> {{ t('COUNTRIES') }}</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trusted By Section -->

<!-- Product Section -->
<section class="expertise-section">
    <div class="expertise-left">
        <div class="case-studies__heading">
            <div class="sub-heading-container">{{ t('OUR PRODUCT EXPERTISE') }}</div>
            <div class="sub-heading-divider-product"></div>
        </div>

        <div class="product-grid">
            <div class="product-card">
                <img src="{{ asset('assets/images/home-products/lower-limb.png') }}" alt="{{ t('Lower Limb') }}">
                <p><a href="lower-limb.html">{{ t('Lower Limb') }}</a></p>
            </div>

            <div class="product-card">
                <img src="{{ asset('assets/images/home-products/spine-implants.png') }}" alt="{{ t('Spine Implants') }}">
                <p><a href="spine-implants.html">{{ t('Spine Implants') }}</a></p>
            </div>

            <div class="product-card">
                <img src="{{ asset('assets/images/home-products/bone-screw.png') }}" alt="{{ t('Bone Screw') }}">
                <p><a href="#">{{ t('Bone Screw') }}</a></p>
            </div>

            <div class="product-card">
                <img src="{{ asset('assets/images/home-products/external-fixator.png') }}" alt="{{ t('External Fixator') }}">
                <p><a href="#">{{ t('External Fixator') }}</a></p>
            </div>

            <div class="product-card">
                <img src="{{ asset('assets/images/home-products/hip-prosthesis.png') }}" alt="{{ t('Hip Prosthesis') }}">
                <p><a href="#">{{ t('Hip Prosthesis') }}</a></p>
            </div>
        </div>
        <a href="#" class="explore-btn">{{ t('EXPLORE ALL PRODUCTS') }}</a>
    </div>

    <!-- RIGHT SIDE -->
    <div class="mission-right">
        <div class="overlay"></div>
        <div class="mission-content">
            <div class="sub-heading-container text-white">{{ t('OUR MISSION') }}</div>
            <div class="sub-heading-divider-product-line"></div>
            <p>{{ t('To advance orthopedic care through innovation, precision, and a deep commitment to improving patient lives.') }}</p>
            <a href="#" class="learn-btn">{{ t('LEARN MORE') }}</a>
        </div>
    </div>
</section>
<!-- Product Section -->

<!-- Contact CTA Section -->
<section class="section contact-cta-banner">
    <div class="hero-container">
        <div class="contact-cta__container">
            <div class="d-flex flex-column flex-gap-2">
                <div class="sub-heading-container text-white text-center">{{ t('Partnering in Better Outcomes') }}</div>
                <p class="text-center">{{ t('We work closely with surgeons and healthcare professionals to shape the future of orthopaedic care.') }}</p>
            </div>
        </div>
    </div>
</section>
<!-- Contact CTA Section -->
<!-- InstanceEndEditable -->

@endsection