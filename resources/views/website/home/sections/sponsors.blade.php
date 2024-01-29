

<!-- Steps One -->
<section class="steps-one" id="parnters">
		<div class="steps-one_pattern-layer"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title-two centered">
				<h2 class="sec-title-two_heading">شركاء النجاح </h2>
			</div>
			<div class="row clearfix">
				
				<div class="inner-container">
					<!-- Sponsors Carousel -->
					<ul class="sponsors-carousel owl-carousel owl-theme">
                    @if (!empty($result['clients']))
                    @foreach ($result['clients'] as $item)


						<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="{{ $item->image }}" alt="{{ $item->title }}"></a></figure></li>
				
                        @endforeach
            @endif
					</ul>
				</div>
				
			</div>
		 
			
		</div>
	</section>
	<!-- End Steps One -->
