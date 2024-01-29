


<!-- Main Slider -->
<section class="slider-two">

		<div class="single-item-carousel owl-carousel owl-theme">
		@foreach($sliders as $slider)

			<!-- Slide -->
			<div class="slide">
				<div class="slider-two_image-layer" style="background-image:url({{$slider->imagePath('image') != '' ? $slider->imagePath('image') : asset('/img/banner/banner.png') }})"></div>
				
				
				<div class="auto-container">
					
					<!-- Content Column -->
					<div class="slider-two-content">
						<div class="slider-two_inner">
							<div class="slider-two_title">رواد التقييم بالمملكة</div>
							<h1 class="slider-two_heading">  {!! $slider->title !!} </h1>
 							<!-- Button Box -->
						 
						</div>
					</div>
					
				</div>
			</div>

			@endforeach

			
			 
		</div>
	</section>
	<!-- End Main Slider -->