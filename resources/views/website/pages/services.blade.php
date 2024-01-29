
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


	@include('website.home.sections.services')

	
	
 
	@endsection
