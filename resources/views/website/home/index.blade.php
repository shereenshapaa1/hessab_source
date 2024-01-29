@extends('website.layouts.app')
@section('content')
    <!-- Start of banner section ============================================= -->
    @include('website.home.sections.banner')
    <!-- End of banner section ============================================= -->

   

    @include('website.home.sections.about')

    @include('website.home.sections.services')

  





    <!-- --------------------------------------------------- -->

     
    <!-- End of Fun Fact section ============================================= -->

    <!-- Start of Sponsor section  ============================================= -->
    @include('website.home.sections.sponsors')

    <!-- End of Sponsor section ============================================= -->
    	 <!-- Start of Rating section  ============================================= -->
	 @include('website.home.sections.ratings')

<!-- End of Rating section ============================================= -->

 
    <!-- CTA One -->
	<section class="cta-one">
		<div class="auto-container">
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<div class="left-box">
					<h3 class="cta-one_heading">للاستفسارات يمكنك التواصل معنا  بكل سهوله </h3>
 				</div>
				<div class="right-box">
					<a class="btn-style-six theme-btn clearfix" href="{{url('contactUs')}}">
						<div class="btn-wrap">
							<span class="text-one">تواصل معنا</span>
							<span class="text-two"> تواصل معنا</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End CTA One -->

@endsection
