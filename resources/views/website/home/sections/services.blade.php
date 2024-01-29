


 <!-- Business Three -->
 <section class="business-three">
		<div class="business-three_pattern-layer"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title-two centered">
				<h2 class="sec-title-two_heading" style="color: #fff;">خدماتنا المميزة</h2>
			</div>
			<div class="row clearfix">

            @if (!empty($result['services']))
                 @foreach ($result['services'] as $item)
					
				<!-- Service Block One -->
				<div class="service-block_one col-lg-4 col-md-6 col-sm-12">
					<div class="service-block_one-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<img src="{{ $item->image }}" alt="" />
						<h5 class="service-block_one-heading"> {{ $item->title }}</h5>
						<div class="service-block_one-text">{!! $item->description !!}</div>
						<a class="btn-style-two theme-btn btn-item" href="{{url('services/'.$item->id.'')}}">
                                          المزيد
									</a>
						<!--div class="service-block_one-overlay" >
							<div class="service-block_one-overlay-inner">
								<div class="upper-box">
								</div>
								<div class="service-block_one-text-two"></div>
								<!-- Button Box -->
								<!--div class="service-block_one-button">
									<a class="btn-style-two theme-btn btn-item" href="#">
										<div class="btn-wrap">
											<span class="text-one">طلب تقييم <i class="fa-solid fa-arrow-right fa-fw"></i></span>
											<span class="text-two">طلب تقييم <i class="fa-solid fa-arrow-right fa-fw"></i></span>
										</div>
									</a>
								</div>
							</div >
						</div-->
					</div>
				</div>
				

				
				<!-- Service Block One -->
                @endforeach
                @endif
				
				
			</div>
		</div>
       
	</section>
	
	<!-- End Business Three -->
