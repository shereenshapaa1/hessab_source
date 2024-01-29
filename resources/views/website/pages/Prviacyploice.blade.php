@extends('website.layouts.app')
@section('content')

	<!-- Page Title -->
    <section class="page-title" style="background-image:url('{{asset('front/images/background/5.jpg')}}')">
        <div class="auto-container">
			<h2> سياسية الصخوصية</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{url('/')}}">الرئيسية</a></li>
				<li> سياسية الخصوصية</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
    <section class="business-one style-five" style="background-image:url('{{asset('front/images/background/pattern-39.png)')}}')">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<div class="d-flex justify-content-between align-items-center flex-wrap">
					<div class="left-box">
						<div class="sec-title_title"> تطبيق الشروط و الأحكام</div>
						<h2 class="sec-title_heading">  <br> لمساعدتك بشكل أفضل</h2>
					</div>
					<div class="right-box">
 					</div>
				</div>
			</div>
			
			<div class="row clearfix">


                <div class="">
            
                 {!! $Prviacyploice->privacy_ar !!}
                </div>
            </div>
        </div>
    </section>
    
               
        
   
    @endsection
