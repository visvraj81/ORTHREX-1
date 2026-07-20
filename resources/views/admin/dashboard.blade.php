@extends('admin.common')
@section('title', 'Dashboard')
@section('content')

    <style>
        :root {
            --theme-color: #BA8523;
            --theme-color-light: #d9a53f;
            --theme-color-dark: #8f6519;
            --theme-color-soft: rgba(186, 133, 35, 0.10);
            --theme-color-softer: rgba(186, 133, 35, 0.06);
        }

        /* ---------- Welcome banner ---------- */
        .welcome-banner {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            padding: 28px 32px;
            margin-bottom: 28px;
            background: linear-gradient(120deg, var(--theme-color-dark) 0%, var(--theme-color) 55%, var(--theme-color-light) 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            opacity: 0;
            transform: translateY(-10px);
            animation: fadeSlideDown 0.5s ease forwards;
        }

        .welcome-banner::after {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.10);
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            bottom: -60px;
            right: 80px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
        }

        .welcome-banner__text {
            position: relative;
            z-index: 2;
        }

        .welcome-banner__text h5 {
            margin: 0 0 6px;
            font-weight: 700;
            font-size: 20px;
        }

        .welcome-banner__text p {
            margin: 0;
            font-size: 13.5px;
            opacity: 0.9;
        }

        .welcome-banner__icon {
            position: relative;
            z-index: 2;
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .welcome-banner__icon i {
            font-size: 28px;
            color: #fff;
        }

        @media (max-width: 575.98px) {
            .welcome-banner {
                padding: 20px;
            }

            .welcome-banner__text h5 {
                font-size: 17px;
            }
        }

        /* ---------- Page heading ---------- */
        .dashboard-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
            animation: fadeSlideDown 0.5s ease;
        }

        .dashboard-heading h4 {
            margin: 0;
            font-weight: 700;
            position: relative;
            padding-left: 14px;
        }

        .dashboard-heading h4::before {
            content: '';
            position: absolute;
            left: 0;
            top: 3px;
            bottom: 3px;
            width: 4px;
            border-radius: 4px;
            background: var(--theme-color);
        }

        .dashboard-subtext {
            font-size: 13px;
            color: #8a8d93;
        }

        /* ---------- Stat cards ---------- */
        .stat-card {
            width: 100%;
            height: 160px;
            border-radius: 16px;
            padding: 25px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease;
            color: #333;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(186, 133, 35, 0.18);
            background: #fff;
            cursor: pointer;
            opacity: 0;
            transform: translateY(16px);
            animation: fadeSlideUp 0.55s ease forwards;
        }

        .stat-card:nth-child(1) {
            animation-delay: .05s;
        }

        .stat-card:nth-child(2) {
            animation-delay: .15s;
        }

        .stat-card:nth-child(3) {
            animation-delay: .25s;
        }

        .stat-card:nth-child(4) {
            animation-delay: .35s;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 30px rgba(186, 133, 35, 0.18);
            border-color: var(--theme-color);
        }

        /* top accent line, sweeps in on hover */
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 4px;
            width: 0%;
            background: linear-gradient(90deg, var(--theme-color), var(--theme-color-light));
            transition: width .4s ease;
            z-index: 3;
        }

        .stat-card:hover::before {
            width: 100%;
        }

        .stat-card .icon-wrap {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: var(--theme-color-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
            z-index: 2;
            transition: transform .35s ease, background .35s ease;
        }

        .stat-card:hover .icon-wrap {
            transform: rotate(-6deg) scale(1.08);
            background: var(--theme-color);
        }

        .stat-card .icon-wrap img {
            width: 26px;
            height: 26px;
            object-fit: contain;
            transition: filter .35s ease;
        }

        .stat-card:hover .icon-wrap img {
            filter: brightness(0) invert(1);
        }

        .stat-card .title {
            font-size: 14px;
            color: #6c6f78;
            font-weight: 500;
            margin-bottom: 6px;
            z-index: 2;
        }

        .stat-card .value {
            font-size: 28px;
            font-weight: 800;
            z-index: 2;
            color: #2b2148;
            line-height: 1;
        }

        /* large ghost number in the background */
        .blurred-icon::after {
            content: attr(data-value);
            position: absolute;
            top: 50%;
            right: 6px;
            transform: translateY(-50%);
            font-size: 76px;
            font-weight: 900;
            color: var(--theme-color-softer);
            z-index: 1;
            transition: all 0.35s ease;
            user-select: none;
        }

        .stat-card:hover.blurred-icon::after {
            right: 14px;
            color: rgba(186, 133, 35, 0.18);
        }

        /* small trend badge (optional decorative element) */
        .stat-trend {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            background: var(--theme-color-soft);
            color: var(--theme-color-dark);
            z-index: 2;
        }

        /* ---------- Animations ---------- */
        @keyframes fadeSlideUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeSlideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ---------- Responsive tweaks ---------- */
        @media (max-width: 991.98px) {
            .stat-card {
                height: 150px;
                padding: 20px;
            }

            .stat-card .value {
                font-size: 24px;
            }
        }

        @media (max-width: 575.98px) {
            .stat-card {
                height: 140px;
                padding: 18px;
            }

            .blurred-icon::after {
                font-size: 56px;
            }

            .stat-card .icon-wrap {
                width: 44px;
                height: 44px;
                margin-bottom: 10px;
            }

            .stat-card .icon-wrap img {
                width: 22px;
                height: 22px;
            }

            .stat-card .value {
                font-size: 22px;
            }
        }

        .icon-wrap i {
            font-size: 24px;
            color: var(--theme-color);
            transition: color .35s ease;
        }

        .stat-card:hover .icon-wrap i {
            color: #fff;
        }
    </style>

    <div class="px-3 px-md-5 flex-grow-1 container-p-y mt-4">

        {{-- Welcome Admin Banner --}}
        <div class="welcome-banner">
            <div class="welcome-banner__text">
                @php
                    $hour = now()->format('H');
                    $greeting = $hour < 12 ? 'Good Morning' : ($hour < 17 ? 'Good Afternoon' : 'Good Evening');
                @endphp
                <h5 style="color: white;">{{ $greeting }}, {{ auth()->user()->name ?? 'Admin' }} 👋</h5>
                <p>Welcome back to the Orthrex admin panel. Here's what's happening today.</p>
            </div>
            <div class="welcome-banner__icon">
                <i class='bx bx-user-circle'></i>
            </div>
        </div>

        <!-- <div class="dashboard-heading">
            <div>
                <h4>Dashboard</h4>
                <div class="dashboard-subtext">Overview of your platform activity</div>
            </div>
        </div> -->

        <div class="row g-3 g-md-4">

            <!-- Category Card -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <a href="{{ route('category-list') }}" class="stat-card-link">
                    <div class="stat-card blurred-icon" data-value="{{ $categoryCount }}" data-count="{{ $categoryCount }}">
                        <div class="icon-wrap">
                            <i class='bx bx-category-alt'></i>
                        </div>
                        <div class="title">Total Category</div>
                        <div class="value counter" data-target="{{ $categoryCount }}">{{ $categoryCount }}</div>
                    </div>
                </a>
            </div>

            <!-- Product Card -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <a href="{{ route('product-list') }}" class="stat-card-link">
                    <div class="stat-card blurred-icon" data-value="{{ $productCount }}" data-count="{{ $productCount }}">
                        <div class="icon-wrap">
                            <i class='bx bx-package'></i>
                        </div>
                        <div class="title">Total Products</div>
                        <div class="value counter" data-target="{{ $productCount }}">{{ $productCount }}</div>
                    </div>
                </a>
            </div>

            <!-- Surgeon Corner Card -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <a href="{{ route('surgeon-corner-list') }}" class="stat-card-link">
                    <div class="stat-card blurred-icon" data-value="{{ $surgeonCornerCount }}"
                        data-count="{{ $surgeonCornerCount }}">
                        <div class="icon-wrap">
                            <i class='bx bx-user-check'></i>
                        </div>
                        <div class="title">Total Surgeon Corner</div>
                        <div class="value counter" data-target="{{ $surgeonCornerCount }}">{{ $surgeonCornerCount }}</div>
                    </div>
                </a>
            </div>

            <!-- Quality Card -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <a href="{{ route('quality-list') }}" class="stat-card-link">
                    <div class="stat-card blurred-icon" data-value="{{ $qualityCount }}" data-count="{{ $qualityCount }}">
                        <div class="icon-wrap">
                            <i class='bx bx-award'></i>
                        </div>
                        <div class="title">Total Quality</div>
                        <div class="value counter" data-target="{{ $qualityCount }}">{{ $qualityCount }}</div>
                    </div>
                </a>
            </div>

            <!-- Home Slider Card -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <a href="{{ route('slider-list') }}" class="stat-card-link">
                    <div class="stat-card blurred-icon" data-value="{{ $sliderCount }}" data-count="{{ $sliderCount }}">
                        <div class="icon-wrap">
                            <i class='bx bx-images'></i>
                        </div>
                        <div class="title">Total Home Slider</div>
                        <div class="value counter" data-target="{{ $sliderCount }}">{{ $sliderCount }}</div>
                    </div>
                </a>
            </div>

        </div>

    </div>

    <script>
        // Animated count-up for the stat values (0 -> target).
        // Works automatically with whatever number Laravel prints inside data-target.
        document.addEventListener('DOMContentLoaded', function () {

            const counters = document.querySelectorAll('.counter');

            counters.forEach(function (counter) {

                const target = parseInt(counter.getAttribute('data-target'), 10) || 0;
                const duration = 900; // ms
                const startTime = performance.now();

                function tick(now) {

                    const progress = Math.min((now - startTime) / duration, 1);
                    const current = Math.floor(progress * target);

                    counter.textContent = current;

                    if (progress < 1) {
                        requestAnimationFrame(tick);
                    } else {
                        counter.textContent = target;
                    }

                }

                requestAnimationFrame(tick);

            });

        });
    </script>

@endsection