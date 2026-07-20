@extends('website.main')
@section('content')

<!-- InstanceBeginEditable name="slider" -->
		<!-- Breadcrumb Page Section -->
		<section class="section banner-page banner-page-about">
			<div class="hero-container">
				<div class="banner-page__container">
					<div class="banner-page__title">
						<h3>Contact Orthrex Life Care</h3>
						<p>Reach Out Today and Let’s Build Something Great Together.</p>
					</div>
					<div class="banner-page__intro">
						<p>We are committed to supporting surgeons, healthcare professionals, and our partners with innovative orthopaedic solutions and exceptional service.</p>
						<nav class="breadcrumb">
							<a href="{{ route('home') }}" class="breadcrumb-link">Home</a>
							<i class="breadcrumb-divider fa-solid fa-chevron-right"></i>
							<a href="{{ route('contact-us') }}" class="breadcrumb-link">Contact Us</a>
						</nav>
					</div>
				</div>
			</div>
		</section>
		<!-- Breadcrumb Page Section -->
		<!-- InstanceEndEditable -->
		
		<!-- InstanceBeginEditable name="matter" -->
		<!-- Contact Us Section -->
		<section class="contact-section">
			<div class="contact-grid">
				<div class="contact-card">
					<div class="contact-icon"><img src="assets/images/icons/location.svg" alt="Location"></div>
					<h3>Visit Our Office</h3>
					<p class="highlight">Orthrex Life Care</p>
					<p>{{ $data->main_building }}</p>
					<div class="line"></div>
				</div>

				<div class="contact-card">
					<div class="contact-icon"><img src="assets/images/icons/call.svg" alt="Call Us"></div>
					<h3>Call Us</h3>
					<p class="highlight">Sales</p>
					<p>{{$data->number}}</p>
					<div class="line"></div>
				</div>

				<div class="contact-card">
					<div class="contact-icon"><img src="assets/images/icons/email.svg" alt="Email Us"></div>
					<h3>Email Us</h3>
					<p class="highlight">General</p>
					<p>{{ $data->email }}</p>
					<div class="line"></div>
				</div>
			</div>
			
			<div class="pt-100">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d232.49957637349428!2d72.74431931609362!3d21.192428215882668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04d007ef9f415%3A0x21c24dfe509105f3!2sORTHREX%20LIFE%20CARE!5e0!3m2!1sen!2sin!4v1781087825837!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</section>
		<!-- Contact Us Section -->
		<!-- InstanceEndEditable -->





@endsection