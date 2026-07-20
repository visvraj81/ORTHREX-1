@extends('website.main')
@section('content')

    <!-- InstanceBeginEditable name="slider" -->
    <!-- Breadcrumb Page Section -->
    <section class="section banner-page banner-page-about">
        <div class="hero-container">
            <div class="banner-page__container">
                <div class="banner-page__title">
                    <h3>{{ $product->title ?? 'Product' }}</h3>
                    <p>{{ $product->banner_subtitle}}</p>
                </div>
                <div class="banner-page__intro">
                    <p>{{ $product->banner_description}}</p>
                    <nav class="breadcrumb">
                        <a href="{{ url('/') }}" class="breadcrumb-link">Home</a>
                        <i class="breadcrumb-divider fa-solid fa-chevron-right"></i>
                        <a href="{{ route('products-data', $product->category_id) }}" class="breadcrumb-link">
                            {{ $product->category->title ?? 'Category' }}
                        </a>
                        <i class="breadcrumb-divider fa-solid fa-chevron-right"></i>
                        <span class="breadcrumb-link">{{ $product->title ?? 'Product' }}</span>
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
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain; width: auto; height: auto;">
                                </div>
                        @else
                            <img src="{{ asset('assets/images/lower-limb/nick0026.png') }}" class="img-fluid" alt="Orthrex Life Care">
                        @endif

                    </div>

                    <div class="col-md-7">
                        <div class="about__content">

                            <div class="case-studies__heading">
                                <div class="sub-heading-container text-start">
                                    {{ $product->title ?? 'Product Details' }}
                                </div>
                                <div class="sub-heading-divider-product"></div>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
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
                                            <td colspan="4" class="text-center">No details available.</td>
                                        </tr>

                                    @endif

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section -->
    <!-- InstanceEndEditable -->

@endsection