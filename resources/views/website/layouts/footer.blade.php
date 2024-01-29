 <!-- Footer -->
<style>
.main-footer .email-box .form-group input[type="text"], .main-footer .email-box .form-group input[type="email"] {
    color:black;
}
</style>
 <footer class="main-footer style-two" style="background-image:url('{{ asset('front/images/background/pattern-11.png')}}')">
		<div class="auto-container">
			<!-- Widgets Section -->
			<div class="widgets-section">
				<div class="row clearfix">
				    
				   	<div class="big-column col-lg-12 col-md-12 col-sm-12">
						<div class="row clearfix">
						    	<div class="footer-column col-lg-3 col-md-6 col-sm-12">
								<div class="footer-widget logo-widget">
									<div class="logo">
										<a href="index.html"><img src="{{ asset('front/images/logo-3.png')}}" alt="" /></a>
									</div>
									<div class="text">{{$setting->footer}}</div>
							 
											
								</div>
							</div>
									<!-- Footer Column -->
							<div class="footer-column col-lg-3 col-md-6 col-sm-12">
								<div class="footer-widget newsletter-widget">
									<h4>النشرة الإخبارية</h4>
									<div class="text">اشترك في النشرة الإخبارية لدينا للحصول على آخر التحديثات والأخبار</div>
									
									<!-- Email Box -->
									<div class="email-box">
										<form method="post" action="{{url('newsletter')}}">
										    							@csrf

											<div class="form-group">
												<input type="email" name="email" value="" placeholder="البريد الالكتروني" required>
												<button type="submit"><span class="icon fa-solid fa-paper-plane fa-fw"></span></button>
											</div>
										</form>
									</div>
									
									<!-- Social Box -->
									<ul class="social-box">
									    <li><a href="{{$setting->facebook}}" class="fa-brands fa-facebook-f fa-fw"></a></li>
								<li><a href="{{ $setting->twitter }}" class="fa-brands fa-twitter fa-fw"></a></li>
								<li><a href="{{$setting->linkedIn}}" class="fa-brands fa-linkedin fa-fw"></a></li>
								<li><a href="{{ $setting->instagram  }}" class="fa-solid fa-instagram  fa-fw"></a></li>
									
									</ul>
									<!-- End Social Box -->
									
								</div>
							</div>
							


							 	<div class="footer-column col-lg-3 col-md-6 col-sm-12">
								<div class="footer-widget logo-widget">
								 	<h4>روابط للمساعدة</h4>
								 
									<a href="{{url('/')}}" >الرئيسية </a><br><br>
							     	<a href="{{url('about')}}" >عن الشركة</a><br><br>
							     										 <a href="{{url('blog')}}" > المدونة</a><br><br>

									<a href="{{url('/Real_estate_evaluation')}}"> تقييم عقارى</a><br><br>
									<a href="{{url('/Instrumental_evaluation')}}">تقييم الألات و معدات </a><br>
									<a href="{{ url('/Order_Tracking') }}"> تتبع طلبك</a><br>
										 <a href="{{ url('/pp')}}">  سياسية الخصوصية</a>	
								</div>
							</div>
							   	<div class="footer-column col-lg-3 col-md-6 col-sm-12">
								<div class="footer-widget contact-widget">
									<h4>بيانات التواصل:</h4>
									<ul class="contact-list">
										<li><span class="icon fa fa-phone"></span> 		{{ $setting->phone }}					 </li>
										<li><span class="icon fa fa-location "></span> {{$setting->address}}</li>
									</ul>
									<div class="timing">
										<strong> مواعيد العمل: </strong>
									{{$setting->day_work}}:
							<strong>{{$setting->time_work}}</strong>
									</div>
								</div>
							</div>  
						 </div>
				    </div>
				    
				    
 
				 
			 
					
				</div>
			</div>
			
			<div class="footer-bottom">
				<div class="copyright">جميع الحقوق محفوظة لـ شركة حساب 2023 ©
</div>
			</div>
			
		</div>
	</footer>
	<!-- Footer -->
	
	<!-- Search Popup -->
	<div class="search-popup">
		<div class="color-layer"></div>
		<button class="close-search"><span class="fas fa-times fa-fw"></span></button>
		<form method="post" action="blog.html">
			<div class="form-group">
				<input type="search" name="search-field" value="" placeholder="Search Here" required="">
				<button type="submit"><i class="flaticon-search"></i></button>
			</div>
		</form>
	</div>
	<!-- End Search Popup -->
	
</div>
<!-- End PageWrapper -->
 @if ( Session::has('message'))
 <div style="display:show" class="modal fade" id="add-money1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">تم الأشتراك فى النشرة الإخبارية بنجاح</h4>
            </div>
               
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fas fa-long-arrow-up fa-fw"></span></div>

<script src="{{ asset('front/js/jquery.js')}}"></script>
<script src="{{ asset('front/js/appear.js')}}"></script>
<script src="{{ asset('front/js/owl.js')}}"></script>
<script src="{{ asset('front/js/wow.js')}}"></script>
<script src="{{ asset('front/js/odometer.js')}}"></script>
<script src="{{ asset('front/js/mixitup.js')}}"></script>
<script src="{{ asset('front/js/knob.js')}}"></script>
<script src="{{ asset('front/js/popper.min.js')}}"></script>
<script src="{{ asset('front/js/parallax-scroll.js')}}"></script>
<script src="{{ asset('front/js/parallax.min.js')}}"></script>
<script src="{{ asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('front/js/tilt.jquery.min.js')}}"></script>
<script src="{{ asset('front/js/magnific-popup.min.js')}}"></script>



<script src="{{ asset('front/js/script.js')}}"></script>
<script>
    var msg = '{{Session::get('message')}}';
    var exist = '{{Session::has('message')}}';
    if(exist){
      alert(msg);
    }
</script>

@yield('js')


<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->