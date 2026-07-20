@extends('website.main')
@section('content')

    <!-- InstanceBeginEditable name="slider" -->
    <!-- Breadcrumb Page Section -->
    <section class="section banner-page banner-page-about">
        <div class="hero-container">
            <div class="banner-page__container">
                <div class="banner-page__title">
                    <h3>{{ t($product->title ?? 'Product') }}</h3>
                    <p>{{ t($product->banner_subtitle) }}</p>
                </div>
                <div class="banner-page__intro">
                    <p>{{ t($product->banner_description) }}</p>
                    <nav class="breadcrumb">
                        <a href="{{ url('/') }}" class="breadcrumb-link">{{ t('Home') }}</a>
                        <i class="breadcrumb-divider fa-solid fa-chevron-right"></i>
                        <a href="{{ route('products-data', $product->category_id) }}" class="breadcrumb-link">
                            {{ t($product->category->title ?? 'Category') }}
                        </a>
                        <i class="breadcrumb-divider fa-solid fa-chevron-right"></i>
                        <span class="breadcrumb-link">{{ t($product->title ?? 'Product') }}</span>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Page Section -->
    <!-- InstanceEndEditable -->

    <!-- InstanceBeginEditable name="matter" -->
    <!-- Product Details Section -->
    <section class="section">
        <div class="hero-container">
            <div class="about__container">
                <div class="row">

                    <div class="col-md-5 animation-box anim-normal anim-delay-sm" data-animation="fade-right">

                        @if($product && $product->image)
                            <div class="product-image" style="background: #faf6f5; border: 1px solid #f2eae7; padding: 20px; display: flex; justify-content: center; align-items: center; height: 220px; margin-bottom: 25px; box-sizing: border-box; overflow: hidden;">
                                    <img src="{{ asset($product->image) }}" alt="{{ t($product->name) }}" style="max-width: 100%; max-height: 100%; object-fit: contain; width: auto; height: auto;">
                                </div>
                        @else
                            <img src="{{ asset('assets/images/lower-limb/nick0026.png') }}" class="img-fluid" alt="{{ t('Orthrex Life Care') }}">
                        @endif

                    </div>

                    <div class="col-md-7">
                        <div class="about__content">

                            <div class="case-studies__heading">
                                <div class="sub-heading-container text-start">
                                    {{ t($product->title ?? 'Product Details') }}
                                </div>
                                <div class="sub-heading-divider-product"></div>
                            </div>

                           <div class="summary-note-content">
    {!! $product->table_description !!}
</div>

<style>
    /* ===== Styled tables coming from CKEditor content ===== */
    .summary-note-content table {
        width: 100%;
        border-collapse: collapse;
        /* margin: 20px 0; */
        font-size: 15px;
    }

    .summary-note-content table th,
    .summary-note-content table td {
        border: 1px solid #dee2e6;
        padding: 12px 16px;
        text-align: left;
        vertical-align: middle;
    }

    .summary-note-content table th {
        background-color: #f8f9fa;
        font-weight: 700;
        color: #212529;
    }

    .summary-note-content table tr:hover td {
        background-color: #f8f9fa;
    }

    /* first row (#) column narrow rakhva mate, optional */
    .summary-note-content table th:first-child,
    .summary-note-content table td:first-child {
        width: 60px;
        font-weight: 600;
        text-align: center;
    }

    /* normal paragraph/bold text spacing thoda better dekhay tema mate */
    .summary-note-content p {
        margin-bottom: 10px;
        line-height: 1.6;
    }

    .summary-note-content strong,
    .summary-note-content b {
        font-weight: 700;
    }
</style>
                            {{-- <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ t('First') }}</th>
                                        <th scope="col">{{ t('Last') }}</th>
                                        <th scope="col">{{ t('Handle') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($product && $product->details->count() > 0)

                                        @foreach($product->details as $key => $detail)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $detail->first }}</td>
                                                <td>{{ $detail->last }}</td>
                                                <td>{{ $detail->handle }}</td>
                                            </tr>
                                        @endforeach

                                    @else

                                        <tr>
                                            <td colspan="4" class="text-center">{{ t('No details available.') }}</td>
                                        </tr>

                                    @endif

                                </tbody>
                            </table> --}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section -->
    <!-- InstanceEndEditable -->

@endsection