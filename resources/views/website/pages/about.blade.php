
@extends('website.layouts.app')
@section('content')
<style>
    .feature-two {
        padding-top:20px;
     
        
    }
    .textpadding{
        padding:25px;
    }
   .reliability .owl-carousel .owl-item img{
        height: 400px !important;
         width: 400px !important;
    }
   .reliability .owl-carousel .owl-stage-outer{
       min-height: 400px !important;
    }
  .reliability  .owl-nav {
      display:none !important;
  }
</style>
	<!-- Page Title -->
    <section class="page-title" style="background-image:url('{{asset('front/images/background/5.jpg')}}')">
        <div class="auto-container">
			<h2>عن الشركة</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{url('/')}}">الرئيسية</a></li>
				<li>عن الشركة</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
 
 
 <section class="feature-two " style="background-image:url({{asset('front/images/background/pattern-38.jpg')}})">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 textpadding">
                 	<!-- Sec Title -->
					<div class="sec-title-two">
						<div class="sec-title-two_title">شركة حساب للتقييم</div>
						 <div class="sec-title-two_text">  
							 {!! $setting->about !!}

						</div>
						 
					</div>
             </div>
             
					
              <div class="col-lg-6 " style="padding-top:20px">
                  <img src="{{asset('front/images/ev.jpg')}}"/>
              </div>
         </div>
     </div>
 </section>
  
 <section class="feature-two " >
     <div class="container">
         <div class="row">
              <div class="col-lg-6  ">
                  <img src="{{asset('front/images/mission.jpg')}}"/>
              </div>
             <div class="col-lg-6  textpadding">
                 	<!-- Sec Title -->
					<div class="sec-title-two">
						<div class="sec-title-two_title">رؤيتنا  </div>
						 <div class="sec-title-two_text">  
							{!! $result['ourseen']->description !!}

						</div>
						 
					</div>
             </div>
             
					
             
         </div>
     </div>
 </section>
   
 <section class="feature-two " style="background-image:url({{asset('front/images/background/pattern-38.jpg')}})">
     <div class="container">
         <div class="row">
           
             <div class="col-lg-6  textpadding">
                 	<!-- Sec Title -->
					<div class="sec-title-two">
						<div class="sec-title-two_title">رسالتنا  </div>
						 <div class="sec-title-two_text">  
						{!! $result['OurMassage']->description !!}

						</div>
						 
					</div>
             </div>
             
			   <div class="col-lg-6  ">
                  <img src="{{asset('front/images/a.jpg')}}"/>
              </div>		
             
         </div>
     </div>
 </section>
 <section class="feature-two ">
     <div class="container">
         <div class="row">
           	   <div class="col-lg-6  ">
                  <img src="{{ $result['standards'][0]->image }}"/>
              </div>		
             
             <div class="col-lg-6  textpadding">
                 	<!-- Sec Title -->
					<div class="sec-title-two">
						<div class="sec-title-two_title">{{$result['standards'][0]->title}}  </div>
						 <div class="sec-title-two_text">  
						{!! $result['standards'][0]->description !!}

						</div>
						 
					</div>
             </div>
             
		
         </div>
     </div>
 </section>

  <section class="feature-two " style="background-image:url({{asset('front/images/background/pattern-38.jpg')}})">
     <div class="container">
         <div class="row">
              <div class="col-lg-6 textpadding ">
                 	<!-- Sec Title -->
					<div class="sec-title-two">
						<div class="sec-title-two_title">{{ $result['reliability'][0]->title }}  </div>
						 <div class="sec-title-two_text">  
						{!! $result['reliability'][0]->description  !!}	

						</div>
						 
					</div>
             </div>
           	   <div class="col-lg-6  reliability">
           	       
                <div class="single-item-carousel owl-carousel owl-theme ">
    				@foreach(explode('|',$result['reliability'][0]->image) as $image)
    			
                                               
    					<!-- Slide -->
    					<div class="slide">
    						<div class="slider-two_image-layer"   >
    						  <img src="{{ asset($image) }}" />
    						</div>
    					</div>
    					@endforeach
    				</div>
    				
              </div>		
             
            
             
		
         </div>
     </div>
 </section>


 





 
 

	

		
				
			

 
	 

	<!-- Counter One -->
	<section class="counter-one" style="background-image:url(images/background/pattern-4.png)">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Counter One Block -->
				<div class="counter-one_block col-lg-4 col-md-6 col-sm-12">
					<div class="counter-one_block-inner">
						<div class="counter-one_counter"><span class="odometer" data-count="{{$result['counters'][0]->counter}}"></span> +</div>
						<div class="counter-one_title">{{$result['counters'][0]->title}}</div>
					</div>
				</div>
				
				<!-- Counter One Block -->
				<div class="counter-one_block col-lg-4 col-md-6 col-sm-12">
					<div class="counter-one_block-inner">
						<div class="counter-one_counter"><span class="odometer" data-count="{{$result['counters'][1]->counter}}"></span> +</div>
						<div class="counter-one_title">{{$result['counters'][1]->title}}</div>
					</div>
				</div>
				
				<!-- Counter One Block -->
				<div class="counter-one_block col-lg-4 col-md-6 col-sm-12">
					<div class="counter-one_block-inner">
						<div class="counter-one_counter"><span class="odometer" data-count="{{$result['counters'][2]->counter}}"></span> +</div>
						<div class="counter-one_title">{{$result['counters'][2]->title}}	</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Counter One -->

	
<!-- Start of Sponsor section  ============================================= -->
<section class="clients-two style-two">
		<div class="auto-container">
			<!-- Sponsors Carousel -->  
			<ul class="sponsors-carousel owl-carousel owl-theme">
			@if (!empty($result['clients']))
                    @foreach ($result['clients'] as $item)


						<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="{{ $item->image }}" alt="{{ $item->title }}"></a></figure></li>
				
                        @endforeach
            @endif
			
			</ul>
		</div>
	</section>
<!-- End of Sponsor section ============================================= -->
	
@endsection
