
@extends('website.layouts.app')
@section('content')

	<!-- Page Title -->
    <section class="page-title" style="background-image:url('{{asset('front/images/background/5.jpg')}}')">
        <div class="auto-container">
			<h2>عن الشركة</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{url('/')}}">الرئيسية</a></li>
				<li>المدونة</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
	<section class="feature-two">

	
	<!-- Team Three -->
	<!-- <section class="news-seven" style="background-image:url(images/background/pattern-5.png)"> -->
	<section class="news-seven" style="background-image:url('{{ asset('front/images/background/pattern-5.png')}}')">

		<div class="auto-container">
			<!-- Sec Title -->
			<!-- <div class="sec-title">
				<div class="d-flex justify-content-between align-items-center flex-wrap">
					<div class="left-box">
						<div class="sec-title_title">Completed projects</div>
						<h2 class="sec-title_heading">You can check our projects <br> as inspirations.</h2>
					</div>
					<div class="right-box">
						<div class="sec-title_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod <br> temporincididunt ut labore et dolore magna aliqua. Quis suspendisse <br> ultrices onsectetur adipiscing.</div>
					</div>
				</div>
			</div> -->
			
			<div class="row clearfix">
			
				<!-- News Block -->
				<div class="news-block col-lg-12 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="blog-detail.html"><img src="{{asset($Articale->image)}}" alt="" /></a>
						</div>
						<div class="lower-content">
							<!-- <div class="post-date">12 <span>Oct/20</span></div> -->
							@php $year=$Articale->created_at->year; @endphp
							<div class="post-date">{{substr( $year, -2)}} <span>{{$Articale->created_at->format('F')}}/{{$Articale->created_at->day}}</span></div>
							
							
							<ul class="post-meta">
								<li>{{$Articale->user->name}}</li>
								<!-- <li>0 Comments</li> -->
							</ul>
							<div class="content">
								<h4><a href="blog-detail.html">{{$Articale->title}}</a></h4>
								<div class="text">{{$Articale->sub_title}}</div>
								<div>{!! $Articale->description !!}</div>
							</div>
						</div>
					</div>
				</div>
				
			


				
				
		

		</div>
	</section>
	<!-- End Feature One -->

	<!-- CTA One -->
	<!-- <section class="cta-one">
		<div class="auto-container">
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<div class="left-box">
					<h3 class="cta-one_heading">Looking for the Best Business Consulting?</h3>
					<div class="cta-one_text">As a app web crawler expert, We will help to organize.</div>
				</div>
				<div class="right-box">
					<a class="cta-one_btn theme-btn" href="contact.html">Get a quote</a>
				</div>
			</div>
		</div>
	</section> -->
	<!-- End CTA One -->
@endsection
	
	