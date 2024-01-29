 
	    @if (count($result['Rating'])!=0)
	<!-- Testimonial Five -->
	<section class="testimonial-seven">
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Title Column -->
				<div class="testimonial-seven_title-column col-lg-12 col-md-12 col-sm-12 text-center">
					<div class="testimonial-seven_title-inner">
						<div class="sec-title-three style-two">
							<h2 class="sec-title-three_heading">بعض من أراء العملاء </h2>
						 
						</div>
					 
					</div>
				</div>
				<!-- Carousel Column -->
				<div class="testimonial-seven_carousel-column col-lg-6 col-md-12 col-sm-12 offset-md-3">
					<div class="testimonial-seven_carousel-inner">
						<div class="testimonial-carousel owl-carousel owl-theme">

						   
                    @foreach ($result['Rating'] as $item)
							<!-- Slide -->
							<div class="slide">
								<!-- Testimonial Six -->
								<div class="testimonial-six">
									<div class="testimonial-six_inner">
										<div class="testimonial-six_text"> {!! $item->commit !!}</div>
										<div class="testimonial-six_author">
											<div class="testimonial-six_author-image">
												<img src="{{ asset($item->image) }}" alt="" />
											</div>
										{{ $item->name }}
											<span>{{ $item->Position }}</span>
										</div>
										<span class="testimonial-six_quote-icon fa-solid fa-quote-right fa-fw"></span>
									</div>
								</div>

								 
							</div>
    @endforeach
            
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endif
	<!-- End Testimonial Five -->
