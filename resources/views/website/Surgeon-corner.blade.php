@extends('website.main')
@section('content')

    <!-- InstanceBeginEditable name="slider" -->
    <!-- Breadcrumb Page Section -->
    <section class="section banner-page banner-page-about">
        <div class="hero-container">
            <div class="banner-page__container">
                <div class="banner-page__title">
                    <h3>{{ t('Surgeon Corner') }}</h3>
                    <p>{{ t('Insights, Support and Resources Built for Surgeons.') }}</p>
                </div>
                <div class="banner-page__intro">
                    <p>{{ t('A dedicated space where surgeons share real experiences and rate their journey with Orthrex Life Care.') }}
                    </p>
                    <nav class="breadcrumb">
                        <a href="{{ route('home') }}" class="breadcrumb-link">{{ t('Home') }}</a>
                        <i class="breadcrumb-divider fa-solid fa-chevron-right"></i>
                        <a href="{{ route('Surgeon-corner') }}" class="breadcrumb-link">{{ t('Surgeon Corner') }}</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Page Section -->
    <!-- InstanceEndEditable -->

    <!-- InstanceBeginEditable name="matter" -->
    <!-- Ratings & Reviews Section -->
    <section class="rr-section">
        <div class="rr-container">

            <h2 class="rr-heading">{{ t('Ratings & Reviews') }}</h2>

            <div class="rr-summary">

                <!-- Overall score -->
                <div class="rr-score">
                    <div class="rr-score__value">
                        <span class="rr-score__num">{{ $avgRating }}</span><span class="rr-score__den">/5</span>
                    </div>
                    <div class="rr-score__stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="{{ $i <= round($avgRating) ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                        @endfor
                        <i class="fa-regular fa-circle-question rr-score__info"
                            title="{{ t('Based on verified surgeon reviews') }}"></i>
                    </div>
                    <p class="rr-score__count">{{ $totalRatings }} {{ t('Ratings') }}</p>
                </div>

                <div class="rr-divider"></div>

                <!-- Star breakdown -->
                <div class="rr-breakdown">
                    @for ($star = 5; $star >= 1; $star--)
                        @php $count = $breakdown[$star] ?? 0; @endphp
                        <div class="rr-breakdown__row">
                            <span class="rr-breakdown__label">{{ $star }} {{ t('star') }}</span>
                            <div class="rr-bar">
                                <div class="rr-bar__fill"
                                    style="width: {{ $maxBreakdownCount ? ($count / $maxBreakdownCount * 100) : 0 }}%;">
                                </div>
                            </div>
                            <span class="rr-breakdown__count">{{ $count }}</span>
                        </div>
                    @endfor
                </div>

                <div class="rr-divider"></div>

                <!-- User satisfaction -->
                <div class="rr-satisfaction">
                    <h4><i class="fa-solid fa-thumbs-up"></i> {{ t('User Satisfaction') }}</h4>
                    @foreach ($satisfaction as $label => $percent)
                        <div class="rr-satisfaction__row">
                            <span class="rr-satisfaction__label">{{ t($label) }}</span>
                            <div class="rr-bar rr-bar--dark">
                                <div class="rr-bar__fill" style="width: {{ $percent }}%;"></div>
                            </div>
                            <span class="rr-satisfaction__percent">{{ $percent }}%</span>
                        </div>
                    @endforeach
                </div>

            </div>

            <!-- Review list -->
            <div class="rr-list" style="margin-top: 40px;">

                @forelse ($reviews as $review)
                    <div class="rr-card">
                        <div class="rr-card__head">
                            <div class="rr-avatar">{{ strtoupper(substr($review->name, 0, 1)) }}</div>
                            <div>
                                <p class="rr-card__name">{{ $review->name }} <span class="rr-card__sep">|</span> <span
                                        class="rr-card__location">{{ $review->location }}</span></p>
                            </div>
                        </div>
                        <div class="rr-card__stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="{{ $i <= $review->rating ? 'fa-solid' : 'fa-regular' }} fa-star"></i>
                            @endfor
                        </div>
                        <p class="rr-card__meta">{{ \Carbon\Carbon::parse($review->review_date)->format('d-M-y') }}
                            <span class="rr-card__sep">|</span> {{ t('Product Name') }} :
                            {{ $review->product->title ?? 'N/A' }}
                        </p>
                        <div class="rr-card__tags">
                            @if ($review->response)
                                <span class="rr-tag">{{ t('Response') }} <i class="fa-solid fa-thumbs-up"></i></span>
                            @endif
                            @if ($review->quality)
                                <span class="rr-tag">{{ t('Quality') }} <i class="fa-solid fa-thumbs-up"></i></span>
                            @endif
                            @if ($review->delivery)
                                <span class="rr-tag">{{ t('Delivery') }} <i class="fa-solid fa-thumbs-up"></i></span>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center">{{ t('No reviews yet.') }}</p>
                @endforelse

            </div>

        </div>
    </section>
    <!-- Ratings & Reviews Section -->

    <style>
        .rr-section {
            padding: 60px 0;
            background: #fff;
        }

        .rr-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .rr-heading {
            font-size: 26px;
            font-weight: 700;
            color: #1b2a3d;
            margin-bottom: 30px;
        }

        .rr-summary {
            display: flex;
            align-items: stretch;
            gap: 30px;
            flex-wrap: wrap;
        }

        .rr-divider {
            width: 1px;
            background: #e3e6ea;
            align-self: stretch;
        }

        /* Score */
        .rr-score {
            flex: 0 0 190px;
            text-align: center;
        }

        .rr-score__value {
            font-size: 40px;
            font-weight: 800;
            color: #1b2a3d;
            line-height: 1;
        }

        .rr-score__den {
            font-size: 18px;
            font-weight: 500;
            color: #8a95a3;
        }

        .rr-score__stars {
            margin: 10px 0;
            color: #f2b632;
            font-size: 16px;
        }

        .rr-score__stars .fa-regular {
            color: #d8dde3;
        }

        .rr-score__info {
            color: #b7bfc8;
            font-size: 13px;
            margin-left: 4px;
        }

        .rr-score__count {
            color: #8a95a3;
            font-size: 14px;
            margin: 0;
        }

        /* Breakdown */
        .rr-breakdown {
            flex: 1 1 280px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 8px;
        }

        .rr-breakdown__row {
            display: grid;
            grid-template-columns: 50px 1fr 24px;
            align-items: center;
            gap: 12px;
        }

        .rr-breakdown__label {
            font-size: 13px;
            color: #4a5568;
            white-space: nowrap;
        }

        .rr-breakdown__count {
            font-size: 13px;
            color: #4a5568;
            text-align: right;
        }

        .rr-bar {
            height: 6px;
            background: #e3e6ea;
            border-radius: 4px;
            overflow: hidden;
        }

        .rr-bar__fill {
            height: 100%;
            background: #5c6673;
            border-radius: 4px;
        }

        .rr-bar--dark .rr-bar__fill {
            background: #5c6673;
        }

        /* Satisfaction */
        .rr-satisfaction {
            flex: 1 1 260px;
        }

        .rr-satisfaction h4 {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 700;
            color: #1b2a3d;
            margin-bottom: 14px;
        }

        .rr-satisfaction h4 i {
            color: #2e9e5b;
        }

        .rr-satisfaction__row {
            display: grid;
            grid-template-columns: 80px 1fr 44px;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .rr-satisfaction__label {
            font-size: 13px;
            color: #4a5568;
        }

        .rr-satisfaction__percent {
            font-size: 13px;
            color: #4a5568;
            text-align: right;
        }

        /* Sort */
        .rr-sort {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 40px 0 20px;
        }

        .rr-sort label {
            color: #8a95a3;
            font-size: 14px;
        }

        .rr-sort__select {
            border: 1px solid #d8dde3;
            border-radius: 6px;
            padding: 8px 14px;
            font-size: 14px;
            color: #4a5568;
            background: #fff;
        }

        /* Review cards */
        .rr-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .rr-card {
            border: 1px solid #e3e6ea;
            border-radius: 10px;
            padding: 20px 24px;
        }

        .rr-card__head {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .rr-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #1a6b63;
            color: #fff;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .rr-card__name {
            margin: 0;
            font-weight: 700;
            color: #1b2a3d;
            font-size: 15px;
        }

        .rr-card__location {
            font-weight: 600;
            color: #3a4a63;
        }

        .rr-card__sep {
            color: #c2c9d1;
            margin: 0 4px;
        }

        .rr-card__stars {
            color: #f2b632;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .rr-card__meta {
            color: #8a95a3;
            font-size: 13px;
            margin: 0 0 12px;
        }

        .rr-card__tags {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .rr-tag {
            font-weight: 700;
            color: #1b2a3d;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .rr-tag i {
            color: #2e9e5b;
        }

        @media (max-width: 768px) {
            .rr-summary {
                flex-direction: column;
            }

            .rr-divider {
                width: 100%;
                height: 1px;
            }

            .rr-satisfaction__row,
            .rr-breakdown__row {
                grid-template-columns: 70px 1fr 40px;
            }
        }
    </style>
    <!-- InstanceEndEditable -->

@endsection