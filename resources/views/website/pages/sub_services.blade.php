
@extends('website.layouts.app')
@section('content')
	<!-- Page Title -->
    <section class="page-title" style="background-image:url('{{asset('front/images/background/5.jpg')}}')">
        <div class="auto-container">
			<h2>الخدمات</h2>
			<ul class="bread-crumb clearfix">
			<li><a href="{{url('/')}}">الرئيسية</a></li>
				<li>الخدمات</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->


 <!-- Business Three -->
 <section class="business-three">
		<div class="business-three_pattern-layer"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title-two centered">
				<h2 class="sec-title-two_heading" style="color: #fff;"> {{$service->title}}</h2>
			</div>
			<div class="row clearfix">

            @if (!empty($sub_services))
                 @foreach ($sub_services as $item)
					
				<!-- Service Block One -->
				<div class="service-block_one col-lg-4 col-md-6 col-sm-12">
					<div class="service-block_one-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<img src="{{ asset($item->image)}}" alt="" />
						<h5 class="service-block_one-heading"> {{ $item->title }}</h5>
						<div class="service-block_one-text">{!! $item->description !!}</div>
							
						
					</div>
				</div>
				

				
				<!-- Service Block One -->
                @endforeach
                @endif
				
				
			</div>
		</div>
       
	</section>
	
	<!-- End Business Three -->
	
	
 
	@endsection
