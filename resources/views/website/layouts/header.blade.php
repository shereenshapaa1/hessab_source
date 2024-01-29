<!-- Main Header -->
     <header class="main-header">
    	
		<!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
				<div class="inner-container d-flex justify-content-between align-items-center flex-wrap">
					<!-- Logo Box -->
					<div class="logo"><a href="{{ route('website.home') }}"><img src="{{ asset($setting->logo_white) }}" alt="" title=""></a></div>
					
					<!-- Upper Right -->
					<div class="upper-right d-flex align-items-center flex-wrap">
						<!-- Info Box -->
						<div class="upper-column info-box">
							<a class="icon-box flaticon-phone-call" href="tel:{{ $setting->phone }}"></a>
						   <a   style="left:50px;top:0px" class="icon-box" href="https://api.whatsapp.com/send/?phone={{ $setting->phone }}">
						       <img src="{{ asset('front/images/whatsapp.png') }}"/>
						   </a>
 							اتصل بنا :
							<strong><a  href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></strong>
						</div>
						<!-- Info Box -->
					 
						<!-- Info Box -->
						<!--div class="upper-column info-box">
							<div class="icon-box flaticon-pin"></div>
							{{$setting->address}}						
							 
						</div --!>
						<!-- Info Box -->
						<div class="upper-column info-box">
							<!-- Social Box -->
							<ul class="header-social_box">
							    @if($setting->facebook !=NULL)
								<li><a href="{{$setting->facebook}}" class="fa-brands fa-facebook-f fa-fw"></a></li>
								@endif
					            @if($setting->twitter !=NULL)

								<li><a href="{{ $setting->twitter }}" class="fa-brands fa-twitter fa-fw"></a></li>
								@endif
								@if($setting->linkedIn !=NULL)

								<li><a href="{{$setting->linkedIn}}" class="fa-brands fa-linkedin fa-fw"></a></li>
								@endif
							    @if($setting->instagram !=NULL)

								<li><a href="{{ $setting->instagram  }}" class="fa-solid fa-instagram  fa-fw"></a></li>
								@endif
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
        <!-- Header Lower -->
        <div class="header-lower">
            
			<div class="auto-container">
				<div class="inner-container">
					
					<div class="nav-outer d-flex justify-content-between align-items-center flex-wrap">
						
						<!-- Main Menu -->
						<nav class="main-menu show navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							
							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li><a href="{{url('/')}}">الرئيسية</a>
									</li>
									<li ><a href="{{url('/about')}}">عن الشركة</a>
									</li>
									<li class="dropdown" ><a href="{{url('/services')}}">خدماتنا </a>
									    <ul>
									        	<li>
									   	<a href="{{url('/Real_estate_evaluation')}}"> تقييم عقارى</a> 
 							 
									    </li>
									    <li>
									       	<a href="{{url('/Instrumental_evaluation')}}">تقييم الألات و معدات </a> 
									    </li>
									    </ul>
									</li>
								
 									
									 <li><a href="{{url('/#parnters')}}">شركاء النجاح </a></li>
									 									 <li><a href="{{url('/blog')}}"> المدونة</a></li>

									 
									<li><a href="{{url('/contactUs')}}">أتصل بنا </a></li>
								    <li><a href="{{ url('/Order_Tracking')}}"> تتبع طلبك</a></li>
								     
									

								</ul>
							</div>
							
						</nav>
						<!-- Main Menu End-->
						
					 
						
						<!-- Mobile Navigation Toggler -->
						<div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>
						
					</div>
					
				</div>
				
			</div>
        </div>
        <!-- End Header Lower -->
        
		 
		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon fas fa-window-close fa-fw"></span></div>
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{url('/')}}"><img src="{{ asset($setting->logo_white) }}" alt="" title=""></a></div>
				<!-- Search -->
				 
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div>
		<!-- End Mobile Menu -->
	
    </header>
    <!-- End Main Header -->
