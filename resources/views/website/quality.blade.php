@extends('website.main')
@section('content')

    <!-- InstanceBeginEditable name="slider" -->
    <!-- Breadcrumb Page Section -->
    <section class="section banner-page banner-page-about">
        <div class="hero-container">
            <div class="banner-page__container">
                <div class="banner-page__title">
                    <h3>{{ t('Quality') }}</h3>
                    <p>{{ t('Our Commitment to Excellence and Standards.') }}</p>
                </div>
                <div class="banner-page__intro">
                    <p>{{ t('Explore our quality certifications and standards that reflect our dedication to safe, reliable orthopaedic solutions.') }}
                    </p>
                    <nav class="breadcrumb">
                        <a href="{{ route('home') }}" class="breadcrumb-link">{{ t('Home') }}</a>
                        <i class="breadcrumb-divider fa-solid fa-chevron-right"></i>
                        <a href="{{ route('quality') }}" class="breadcrumb-link">{{ t('Quality') }}</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Page Section -->
    <!-- InstanceEndEditable -->

    <!-- InstanceBeginEditable name="matter" -->
    <!-- Quality Section -->
    <section class="quality-section">
        <div class="quality-container">

            <!-- <h2 class="quality-heading">{{ t('Quality Certifications') }}</h2>  -->

            <div class="quality-grid">

                @forelse ($qualities as $item)
                    @if ($item->pdf)
                        <a href="{{ asset($item->pdf) }}" target="_blank" class="quality-card">
                            <div class="quality-card__img-wrap">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" loading="lazy">
                            </div>

                        </a>
                    @else
                        <div class="quality-card quality-card--no-link">
                            <div class="quality-card__img-wrap">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" loading="lazy">
                            </div>

                        </div>
                    @endif
                @empty
                    <p class="text-center">{{ t('No quality certifications available yet.') }}</p>
                @endforelse

            </div>

        </div>
    </section>
    <!-- Quality Section -->

    <style>
        .quality-section {
            padding: 60px 0;
            background: #fff;
        }

        .quality-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .quality-heading {
            font-size: 26px;
            font-weight: 700;
            color: #1b2a3d;
            margin-bottom: 30px;
        }

        .quality-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .quality-card {
            display: block;
            border: 1px solid #e3e6ea;
            border-radius: 10px;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            transition: box-shadow 0.2s ease, transform 0.2s ease;
            cursor: pointer;
        }

        .quality-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transform: translateY(-3px);
        }

        .quality-card--no-link {
            cursor: default;
        }

        .quality-card--no-link:hover {
            box-shadow: none;
            transform: none;
        }

        .quality-card__img-wrap {
            width: 100%;
            aspect-ratio: 210 / 297;
            overflow: hidden;
            background: #f5f6f8;
        }

        .quality-card__img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .quality-card__title {
            margin: 0;
            padding: 14px 16px;
            font-size: 15px;
            font-weight: 600;
            color: #1b2a3d;
            text-align: center;
        }

        @media (max-width: 992px) {
            .quality-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .quality-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <!-- InstanceEndEditable -->

@endsection