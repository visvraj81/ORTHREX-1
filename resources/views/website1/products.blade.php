@extends('website.main')
@section('content')

<!-- InstanceBeginEditable name="slider" -->
        <!-- Breadcrumb Page Section -->
        <section class="section banner-page banner-page-about">
            <div class="hero-container">
                <div class="banner-page__container">
                    <div class="banner-page__title">
                        <h3>{{ $category->title }}</h3>
                        <p>{{ $category->banner_subtitle ?? "Advanced Solutions for Lower Limb Reconstruction.

" }}</p>
                    </div>
                    <div class="banner-page__intro">
                        <p>{{ $category->banner_description?? "Explore our comprehensive range of Lower Limb implants, precision-engineered to deliver strength, stability, and reliable performance for advanced orthopaedic procedures." }}</p>
                        <nav class="breadcrumb">
                            <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
                            <i class="breadcrumb-divider fa-solid fa-chevron-right"></i>
                            <a href="#" class="breadcrumb-link">{{ $category->title }}</a>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Page Section -->
        <!-- InstanceEndEditable -->
        
        <!-- InstanceBeginEditable name="matter" -->
        <!-- About Us Section -->
        <section class="product-section">
            <div class="hero-container">
				@if(count($products) > 0)
                <div class="work-process__container">
                    <div class="case-studies__heading">
                        <div class="sub-heading-container text-center">{{ $category->section_title }}</div>
                        <div class="sub-heading-divider-about"></div>
                        <p class="text-center">{{ $category->section_description }}</p>
                    </div>
                </div>
				@endif

                <div class="product-grid-page">
                     
                    @if(count($products) > 0)
                        @foreach($products as $product)
                            <div class="product-card-inner">
                                <div class="product-image" style="background: #faf6f5; border: 1px solid #f2eae7; padding: 20px; display: flex; justify-content: center; align-items: center; height: 220px; margin-bottom: 25px; box-sizing: border-box; overflow: hidden;">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain; width: auto; height: auto;">
                                </div>
                                <h3 style="font-family: 'Inter', sans-serif; font-size: 20px; font-weight: 700; color: #1c1c1c; text-transform: uppercase; margin: 0 0 15px 0; line-height: 1.3; letter-spacing: 0.3px;">
                                    <a href="{{ route('products-details', ['id' => $product->id]) }}" style="color: #1c1c1c; text-decoration: none; display: block;">{{ $product->title }}</a>
                                </h3>
                                <a href="{{ route('products-details', ['id' => $product->id]) }}">View Details</a>
                            </div>
                        @endforeach
                    @else
                        <!-- Perfectly Centered No Product State Box -->
                        <div style="grid-column: 1 / -1; display: flex; justify-content: center; align-items: center; width: 100%; padding: 60px 20px;">
                            <div style="font-family: sans-serif; text-align: center; max-width: 500px; background: transparent;">
                                
                                <!-- Clean Centered Box Illustration -->
                                <div style="display: flex; justify-content: center; margin-bottom: 20px;">
                                    <svg width="180" height="180" viewBox="0 0 24 24" fill="none" stroke="#b3b3b3" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                                        <path d="m3.3 7 8.7 5 8.7-5"/>
                                        <path d="M12 22V12"/>
                                    </svg>
                                </div>

                                <!-- Perfect Typography -->
                                <h2 style="font-size: 26px; color: #111; margin-bottom: 12px; font-weight: 700;">No Product Found</h2>
                                <p style="font-size: 15px; color: #666; margin: 0 auto; line-height: 1.6;">
                                    We couldn't find any orthopedic products at the moment.<br>
                                    Please check back later or explore other categories.
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </section>
        <!-- About Us Section -->
        <!-- InstanceEndEditable -->

@endsection