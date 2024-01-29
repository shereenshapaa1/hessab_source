
@extends('website.layouts.app')
@section('content')

	<!-- Page Title -->
    <section class="page-title" style="background-image:url('{{asset('front/images/background/5.jpg')}}')">
        <div class="auto-container">
			<h2>عن الشركة</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{url('/')}}">الرئيسية</a></li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->


<section class="feature-two">
	<div class="feature-two_circle-layer" style="background-image:url('{{ asset('front/images/background/pattern-8.png')}}')"></div>
	<div class="auto-container">
		<div class="row clearfix">
			<!-- Skill Column -->
			<div class="feature-two_skill-column col-lg-5 col-md-12 col-sm-12">
				<div class="feature-two_skill-inner">
					<center>
					<!-- Sec Title -->
					<div class="sec-title-two">
						<div class="sec-title-two_title">شركة حساب للتقييم</div>
						 <div class="sec-title-two_text">  
						  شكرا لشتراكك فى نشرة الأخبار 
						  				<li><a href="{{url('/')}}">الرجوع للرئسية</a></li>


						</div>
						 
					</div>
					</center>
					
					 
				</div>
			</div>
		
			
			
		</div>
	</div>
</section>




	

	
@endsection
