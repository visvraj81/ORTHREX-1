<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Orthrex Life Care - Manufacturer of Orthopaedic Solutions</title>
    <meta name="description" content="Orthrex Life Care - Manufacturer of Orthopaedic Solutions" />
    <meta name="keywords" content="Orthrex Life Care - Manufacturer of Orthopaedic Solutions" />
    <meta property="og:title" content="Orthrex Life Care - Manufacturer of Orthopaedic Solutions">
    <meta property="og:description" content="Orthrex Life Care - Manufacturer of Orthopaedic Solutions">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icons/7.2.3/css/flag-icons.min.css">

    <style>
        .lang-switcher {
            position: relative;
            display: inline-block;
            margin-left: 15px;
        }

        .lang-switcher__btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 7px 12px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            color: #222;
        }

        .lang-switcher__btn:hover {
            border-color: #bbb;
            background: #f9f9f9;
        }

        .lang-switcher__btn .fi {
            font-size: 18px;
            border-radius: 3px;
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.3);
        }

        .lang-switcher__arrow {
            font-size: 10px;
            margin-left: 2px;
            transition: transform 0.2s ease;
        }

        .lang-switcher.active .lang-switcher__arrow {
            transform: rotate(180deg);
        }

        /* Dropdown - forced scrollbar so ALL languages remain reachable */
        .lang-switcher__menu {
            display: none;
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            min-width: 240px;
            max-height: 320px;
            overflow-y: auto !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            z-index: 99999 !important;
            padding: 6px;
        }

        .lang-switcher__menu::-webkit-scrollbar {
            width: 6px;
        }

        .lang-switcher__menu::-webkit-scrollbar-thumb {
            background: #cfcfcf;
            border-radius: 6px;
        }

        .lang-switcher.active .lang-switcher__menu {
            display: block !important;
        }

        .lang-switcher__item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 6px;
            text-decoration: none;
            color: #333;
            font-size: 14px;
            transition: background 0.15s ease;
        }

        .lang-switcher__item:hover {
            background: #f2f2f2;
            color: #000;
        }

        .lang-switcher__item.is-selected {
            background: #eef3ff;
            font-weight: 600;
        }

        .lang-switcher__item .fi {
            font-size: 18px;
            border-radius: 3px;
            flex-shrink: 0;
        }

        /* Optional search box at top of dropdown */
        .lang-switcher__search {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #e5e5e5;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 6px;
            outline: none;
        }

        .lang-switcher__item.is-hidden {
            display: none !important;
        }

        /* Responsive - Mobile */
        @media (max-width: 991px) {
            .lang-switcher {
                margin-left: 0;
                margin-right: 10px;
            }

            .lang-switcher__btn {
                padding: 6px 9px;
                font-size: 13px;
            }

            .lang-switcher__menu {
                right: 0;
                left: auto;
                min-width: 210px;
            }
        }

        @media (max-width: 480px) {
            .lang-switcher__btn span.lang-switcher__label {
                display: none;
            }

            .lang-switcher__btn {
                padding: 6px 8px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="header-container">
            <div class="hero-container">
                <nav class="navbar navbar-expand-lg">
                    <div class="navbar-nav-container">
                        <div class="image-container navbar-logo-container">
                            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/orthrex-logo.png') }}" alt="Orthrex Life Care"
                                    class="img-fluid">
                            </a>
                        </div>
                        <div class="nav-link-container">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav mx-auto">
                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ route('home') }}">{{ t('Home') }}</a></li>

                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ route('about-us') }}">{{ t('About Us') }}</a></li>

                                    @php
                                        $categories = App\Models\Category::all();
                                    @endphp

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ t('Products') }} <i class="fa-solid fa-chevron-down"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            @foreach ($categories as $category)
                                                @php
                                                    $productCount = App\Models\Product::where(
                                                        'category_id',
                                                        $category->id,
                                                    )->count();
                                                @endphp
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('products-data', $category->id) }}">
                                                        {{ t($category->title) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="nav-item"><a class="nav-link" href="#">{{ t('Quality') }}</a>
                                    </li>

                                    <li class="nav-item"><a class="nav-link"
                                            href="#">{{ t('Surgeon Corner') }}</a></li>

                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ route('contact-us') }}">{{ t('Contact Us') }}</a></li>
                                </ul>
                            </div>
                        </div>

                        @php
                            // Full expanded language list
                            $langList = [
                                'en' => ['name' => 'English', 'flag' => 'us'],
                                'gu' => ['name' => 'ગુજરાતી (Gujarati)', 'flag' => 'in'],
                                'hi' => ['name' => 'हिन्दी (Hindi)', 'flag' => 'in'],
                                'mr' => ['name' => 'મરાઠી (Marathi)', 'flag' => 'in'],
                                'pa' => ['name' => 'ਪੰਜਾਬੀ (Punjabi)', 'flag' => 'in'],
                                'bn' => ['name' => 'বাংলা (Bengali)', 'flag' => 'bd'],
                                'ta' => ['name' => 'தமிழ் (Tamil)', 'flag' => 'in'],
                                'te' => ['name' => 'తెలుగు (Telugu)', 'flag' => 'in'],
                                'kn' => ['name' => 'ಕನ್ನಡ (Kannada)', 'flag' => 'in'],
                                'ml' => ['name' => 'മലയാളം (Malayalam)', 'flag' => 'in'],
                                'or' => ['name' => 'ଓଡ଼ିଆ (Odia)', 'flag' => 'in'],
                                'as' => ['name' => 'অসমীয়া (Assamese)', 'flag' => 'in'],
                                'ur' => ['name' => 'اُردُو (Urdu)', 'flag' => 'pk'],
                                'sd' => ['name' => 'سنڌي (Sindhi)', 'flag' => 'pk'],
                                'ne' => ['name' => 'नेपाली (Nepali)', 'flag' => 'np'],
                                'si' => ['name' => 'සිංහල (Sinhala)', 'flag' => 'lk'],
                                'es' => ['name' => 'Español (Spanish)', 'flag' => 'es'],
                                'fr' => ['name' => 'Français (French)', 'flag' => 'fr'],
                                'de' => ['name' => 'Deutsch (German)', 'flag' => 'de'],
                                'it' => ['name' => 'Italiano (Italian)', 'flag' => 'it'],
                                'pt' => ['name' => 'Português (Portuguese)', 'flag' => 'pt'],
                                'nl' => ['name' => 'Nederlands (Dutch)', 'flag' => 'nl'],
                                'sv' => ['name' => 'Svenska (Swedish)', 'flag' => 'se'],
                                'no' => ['name' => 'Norsk (Norwegian)', 'flag' => 'no'],
                                'da' => ['name' => 'Dansk (Danish)', 'flag' => 'dk'],
                                'fi' => ['name' => 'Suomi (Finnish)', 'flag' => 'fi'],
                                'pl' => ['name' => 'Polski (Polish)', 'flag' => 'pl'],
                                'cs' => ['name' => 'Čeština (Czech)', 'flag' => 'cz'],
                                'sk' => ['name' => 'Slovenčina (Slovak)', 'flag' => 'sk'],
                                'hu' => ['name' => 'Magyar (Hungarian)', 'flag' => 'hu'],
                                'ro' => ['name' => 'Română (Romanian)', 'flag' => 'ro'],
                                'bg' => ['name' => 'Български (Bulgarian)', 'flag' => 'bg'],
                                'el' => ['name' => 'Ελληνικά (Greek)', 'flag' => 'gr'],
                                'uk' => ['name' => 'Українська (Ukrainian)', 'flag' => 'ua'],
                                'ru' => ['name' => 'Русский (Russian)', 'flag' => 'ru'],
                                'tr' => ['name' => 'Türkçe (Turkish)', 'flag' => 'tr'],
                                'he' => ['name' => 'עברית (Hebrew)', 'flag' => 'il'],
                                'ar' => ['name' => 'العربية (Arabic)', 'flag' => 'ae'],
                                'fa' => ['name' => 'فارسی (Persian)', 'flag' => 'ir'],
                                'zh' => ['name' => '中文 (Chinese)', 'flag' => 'cn'],
                                'ja' => ['name' => '日本語 (Japanese)', 'flag' => 'jp'],
                                'ko' => ['name' => '한국어 (Korean)', 'flag' => 'kr'],
                                'vi' => ['name' => 'Tiếng Việt (Vietnamese)', 'flag' => 'vn'],
                                'th' => ['name' => 'ไทย (Thai)', 'flag' => 'th'],
                                'id' => ['name' => 'Bahasa Indonesia', 'flag' => 'id'],
                                'ms' => ['name' => 'Bahasa Melayu (Malay)', 'flag' => 'my'],
                                'tl' => ['name' => 'Filipino (Tagalog)', 'flag' => 'ph'],
                                'km' => ['name' => 'ខ្មែរ (Khmer)', 'flag' => 'kh'],
                                'lo' => ['name' => 'ລາວ (Lao)', 'flag' => 'la'],
                                'my' => ['name' => 'မြန်မာ (Burmese)', 'flag' => 'mm'],
                                'sw' => ['name' => 'Kiswahili (Swahili)', 'flag' => 'ke'],
                                'am' => ['name' => 'አማርኛ (Amharic)', 'flag' => 'et'],
                                'af' => ['name' => 'Afrikaans', 'flag' => 'za'],
                            ];

                            $currentLocale = session('site_locale', 'en');
                            $currentLang = $langList[$currentLocale] ?? $langList['en'];
                        @endphp

                        <div class="lang-switcher" id="langSwitcher">
                            <button type="button" class="lang-switcher__btn" id="langSwitcherBtn">
                                <span class="fi fi-{{ $currentLang['flag'] }}"></span>
                                <span class="lang-switcher__label">{{ $currentLang['name'] }}</span>
                                <span class="lang-switcher__arrow">▼</span>
                            </button>

                            <div class="lang-switcher__menu" id="langSwitcherMenu">
                                <input type="text" class="lang-switcher__search" id="langSwitcherSearch"
                                    placeholder="{{ t('Search language...') }}">

                                @foreach ($langList as $code => $lang)
                                    <a href="{{ url('/lang/' . $code) }}"
                                       class="lang-switcher__item {{ $code === $currentLocale ? 'is-selected' : '' }}"
                                       data-lang-name="{{ strtolower($lang['name']) }}">
                                        <span class="fi fi-{{ $lang['flag'] }}"></span>
                                        <span>{{ $lang['name'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <button class="nav-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa-solid fa-bars-staggered"></i>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <aside>
        <div class="sidebar-overlay"></div>
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="image-container sidebar-logo">
                    <img src="{{ asset('assets/images/orthrex-logo-white.png') }}" alt="Orthrex Life Care">
                </div>
                <button class="sidebar-close-btn"><span>X</span></button>
            </div>

            <ul class="sidebar-menu">
                <li><a href="{{ route('home') }}">{{ t('Home') }}</a></li>

                <li><a href="{{ route('about-us') }}">{{ t('About Us') }}</a></li>

                <li class="sidebar-dropdown">
                    <div class="dropdown-header"><a href="#">{{ t('Products') }}</a><button
                            class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button></div>
                    @php
                        $categories = App\Models\Category::all();
                    @endphp

                    <ul class="sidebar-dropdown-menu">
                        @foreach ($categories as $category)
                            @php
                                $productCount = App\Models\Product::where('category_id', $category->id)->count();
                            @endphp

                            <li><a href="{{ route('products-data', $category->id) }}">{{ t($category->title) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="#">{{ t('Quality') }}</a></li>

                <li><a href="#">{{ t('Surgeon Corner') }}</a></li>

                <li><a href="{{ route('contact-us') }}">{{ t('Contact Us') }}</a></li>
            </ul>
        </div>
    </aside>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer-banner">
            <div class="hero-container">
                <div class="footer__container">
                    <div class="footer__col footer__col--quick-links">
                        <h5>{{ t('Quick Links') }}</h5>
                        <ul class="footer__list">
                            <li><a href="{{ route('home') }}" class="footer__link-text">{{ t('Home') }}</a></li>
                            <li><a href="{{ route('about-us') }}" class="footer__link-text">{{ t('About Us') }}</a>
                            </li>
                            <li><a href="{{ route('products-data', 1) }}"
                                    class="footer__link-text">{{ t('Products') }}</a></li>
                            <li><a href="#" class="footer__link-text">{{ t('Quality') }}</a></li>
                            <li><a href="#" class="footer__link-text">{{ t('Surgeon Corner') }}</a></li>
                            <li><a href="{{ route('contact-us') }}"
                                    class="footer__link-text">{{ t('Contact Us') }}</a></li>
                        </ul>
                    </div>

                    @php
                        $categories = App\Models\Category::all();
                    @endphp

                    <div class="footer__col footer__col--useful-links">
                        <h5>{{ t('Products') }}</h5>

                        <ul class="footer__list">
                            @foreach ($categories as $category)
                                @php
                                    $productCount = App\Models\Product::where('category_id', $category->id)->count();
                                @endphp

                                <li>
                                    <a href="{{ route('products-data', $category->id) }}" class="footer__link-text">
                                        {{ t($category->title) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    @php
                        $contact = \App\Models\Contact::first();
                    @endphp
                    <div class="footer__col footer__col--newsletter">
                        <h5>{{ t('Contact Us') }}</h5>
                        <div class="footer__social-media">
                            <img src="{{ asset('assets/images/icons/footer-location.svg') }}" alt="Location">
                            <span>{{ $contact->main_building }}</span>
                        </div>
                        <div class="footer__social-media">
                            <img src="{{ asset('assets/images/icons/footer-call.svg') }}" alt="Call">
                            <span>{{ $contact->number }}</span>
                        </div>
                        <div class="footer__social-media">
                            <img src="{{ asset('assets/images/icons/footer-call.svg') }}" alt="Email">
                            <span>{{ $contact->email }}</span>
                        </div>
                    </div>

                    <div class="footer__col footer__col--intro">
                        <h5>{{ t('Locate Us') }}</h5>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d232.49957637349428!2d72.74431931609362!3d21.192428215882668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04d007ef9f415%3A0x21c24dfe509105f3!2sORTHREX%20LIFE%20CARE!5e0!3m2!1sen!2sin!4v1781087825837!5m2!1sen!2sin"
                            width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="footer__col footer__col-copyright">
                        <p class="m-0">{{ t('© 2026. All Rights Reserved By Orthrex Life Care.') }}</p>
                        <p class="m-0">{{ t('Designed & Developed By :') }} <a
                                href="https://www.desirationhub.com" target="_blank">Desiration Hub</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/video-embedded.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-script.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const switcher = document.getElementById('langSwitcher');
            const btn = document.getElementById('langSwitcherBtn');
            const search = document.getElementById('langSwitcherSearch');

            if (btn && switcher) {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    switcher.classList.toggle('active');
                    if (switcher.classList.contains('active') && search) {
                        setTimeout(() => search.focus(), 50);
                    }
                });
            }

            // Click outside closes the dropdown
            document.addEventListener('click', function(e) {
                if (switcher && !switcher.contains(e.target)) {
                    switcher.classList.remove('active');
                }
            });

            // Live filter of the language list
            if (search) {
                search.addEventListener('click', function(e) {
                    e.stopPropagation();
                });

                search.addEventListener('input', function() {
                    const query = search.value.trim().toLowerCase();
                    const items = document.querySelectorAll('#langSwitcherMenu .lang-switcher__item');
                    items.forEach(function(item) {
                        const name = item.getAttribute('data-lang-name') || '';
                        if (name.indexOf(query) !== -1) {
                            item.classList.remove('is-hidden');
                        } else {
                            item.classList.add('is-hidden');
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>