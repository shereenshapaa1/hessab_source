@extends('website.layouts.app')
@section('content')
 
	<!-- Page Title -->
    <section class="page-title" style="background-image:url('{{asset('front/images/background/5.jpg')}}')">
        <div class="auto-container">
			<h2>تواصل معنا</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{url('/')}}">الرئيسية</a></li>
				<li>تواصل معنا</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
	
 
 
	
	
	

 <!-- Business One -->
	<section class="business-one style-five" style="background-image:url(images/background/pattern-39.png)">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<div class="d-flex justify-content-between align-items-center flex-wrap">
				
					<div class="right-box">
 					</div>
				</div>
			</div>
			
			<div class="row clearfix">
				<!-- Branches Column -->
				<div class="branches-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Business One Counter -->
					 
						<div class="map">
							<img src="https://hessab.net/public/images/background/map.png" alt="" />
							 
						</div>
					</div>
				</div>
				<!-- Form Column -->
				<div class="form-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="left-box">
						<div class="sec-title_title">ابقى على تواصل</div>
						<h2 class="sec-title_heading">نحن على اتصال دائم <br> لمساعدتك بشكل أفضل</h2>
					</div>
				 
							<!-- Business One Counter -->
						<h4>بيانات التواصل:</h4>
									<ul class="contact-list">
										<li><span class="icon fa fa-phone"></span> <a href="tel:{{ $setting->phone }}">	{{ $setting->phone }}	</a></li>
										<li><span class="icon fa fa-envelope"></span><a href="mailto: {{$setting->email}} " >{{$setting->email}}</a></li>
										<li><span class="icon fa fa-location "></span>{{$setting->address}} </li>
                                        <li>	<strong> مواعيد العمل: </strong> {{$setting->day_work}} :   <strong> {{$setting->time_work}}</strong>  </li>
                                        		
									</ul>
								 
					</div>
				</div>
			</div>
			
		 
		</div>
	</section>
	<!-- End Business One -->







	@endsection


	 
	
