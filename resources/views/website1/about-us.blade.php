@extends('website.main')
@section('content')


    <!-- InstanceBeginEditable name="slider" -->
		<!-- Breadcrumb Page Section -->
		<section class="section banner-page banner-page-about">
			<div class="hero-container">
				<div class="banner-page__container">
					<div class="banner-page__title">
						<h3>{{ t('About Orthrex Life Care') }}</h3>
						<p>{{ t('Engineering Better Outcomes. Empowering Lives.') }}</p>
					</div>
					<div class="banner-page__intro">
						<p>{{ t('Orthrex Life Care is a trusted leader in orthopaedic innovation, delivering high-quality implant solutions that help surgeons restore mobility and improve patient outcomes.') }}</p>
						<nav class="breadcrumb">
							<a href="index.html" class="breadcrumb-link">{{ t('Home') }}</a>
							<i class="breadcrumb-divider fa-solid fa-chevron-right"></i>
							<a href="about-us.html" class="breadcrumb-link">{{ t('About Us') }}</a>
						</nav>
					</div>
				</div>
			</div>
		</section>
		<!-- Breadcrumb Page Section -->
		<!-- InstanceEndEditable -->
		
		<!-- InstanceBeginEditable name="matter" -->
		<!-- About Us Section -->
		<section class="section">
            <div class="hero-container">
                <div class="about__container">
                    <div class="about__intro">
						<div class="row">
							<div class="col-md-5 animation-box anim-normal anim-delay-sm" data-animation="fade-right">
								<img src="assets/images/about-us/orthrex-factory.jpg" class="img-fluid" alt="{{ t('Orthrex Life Care') }}">
							</div>
							<div class="col-md-7">
								<div class="about__content">
									<div class="case-studies__heading">
										<div class="sub-heading-container text-start">{{ t('OUR STORY') }}</div>
										<div class="sub-heading-divider-product"></div>
									</div>
									<p>{{ t('Founded with a vision to redefine orthopedic care. Orthrex Life Care combines innovation, precision, and a deep commitment to quality. Our implants are engineered to meet international standards and trusted by surgeons in over 20+ countries.') }}</p>

									<div class="about-work-process__grid pt-5">
										<div class="about-work-process__item animation-box anim-fast anim-delay-none" data-animation="fade-down">
											<div class="about-work-process__step-header">
												<img src="assets/images/icons/expertise.svg" alt="{{ t('Years of Expertise') }}">
											</div>
											<h4>20+</h4>
											<h5>{{ t('Years of Expertise') }}</h5>
										</div>

										<div class="about-work-process__item animation-box anim-normal anim-delay-sm" data-animation="fade-down">
											<div class="about-work-process__step-header">
												<img src="assets/images/icons/surgeon-2.svg" alt="{{ t('Trusted Surgeons') }}">
											</div>
											<h4>500+</h4>
											<h5>{{ t('Trusted Surgeons') }}</h5>
										</div>

										<div class="about-work-process__item animation-box anim-normal anim-delay-md" data-animation="fade-down">
											<div class="about-work-process__step-header">
												<img src="assets/images/icons/globally.svg" alt="{{ t('Countries Served') }}">
											</div>
											<h4>20+</h4>
											<h5>{{ t('Countries Served') }}</h5>
										</div>

										<div class="about-work-process__item animation-box anim-slow anim-delay-md" data-animation="fade-down">
											<div class="about-work-process__step-header">
												<img src="assets/images/icons/certified.svg" alt="{{ t('Quality Standards') }}">
											</div>
											<h4>{{ t('Certified') }}</h4>
											<h5>{{ t('Quality Standards') }}</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </section>
		<!-- About Us Section -->
		
		<!-- Mission-Vision Section -->
		<section class="mission-values">
			<div class="hero-container">
				<div class="row">
					<div class="col-md-7">
						<div class="case-studies__heading pb-5">
							<div class="sub-heading-container text-start">{{ t('OUR MISSION') }}</div>
							<div class="sub-heading-divider-mission"></div>
							<p>{{ t('To advance orthopaedic care through innovation, precision engineering, and uncompromising quality by delivering reliable implant solutions that empower surgeons and improve patient outcomes worldwide.') }}</p>
						</div>

						<div class="case-studies__heading">
							<div class="sub-heading-container text-start">{{ t('OUR VISION') }}</div>
							<div class="sub-heading-divider-vision"></div>
							<p>{{ t('To be a globally trusted leader in orthopaedic healthcare by delivering innovative, precision-engineered implant solutions that enhance mobility, improve lives, and set new standards of excellence in patient care.') }}</p>
						</div>
					</div>
					
					<div class="col-md-5">
						<div class="values-box">
							<div class="case-studies__heading">
								<div class="sub-heading-container text-start">{{ t('OUR JOURNEY') }}</div>
								<div class="sub-heading-divider-journey"></div>
							</div>

							<div class="value-item">
								<img src="assets/images/icons/flag.svg" alt="{{ t('Founded with a vision to elevate') }}">
								<div><p>{{ t('Founded with a vision to elevate orthopedic care through innovation and quality.') }}</p></div>
							</div>

							<div class="value-item">
								<img src="assets/images/icons/setting.svg" alt="{{ t('Investing in advanced manufacturing') }}">
								<div><p>{{ t('Investing in advanced manufacturing and international quality standards.') }}</p></div>
							</div>

							<div class="value-item">
								<img src="assets/images/icons/packaging.svg" alt="{{ t('Expanding our product portfolio') }}">
								<div><p>{{ t('Expanding our product portfolio to support a wide range of surgical needs.') }}</p></div>
							</div>

							<div class="value-item">
								<img src="assets/images/icons/journey-globe.svg" alt="{{ t('Partner of choice for surgeons') }}">
								<div><p>{{ t('Today, a partner of choice for surgeons across 20+ countries.') }}</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Mission-Vision Section -->
		<!-- InstanceEndEditable -->



@endsection