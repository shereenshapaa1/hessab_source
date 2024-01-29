
<!--  -->
	<!-- Feature Two -->
	<section class="feature-two">
		<div class="feature-two_circle-layer"></div>
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Skill Column -->
				<div class="feature-two_skill-column col-lg-6 col-md-12 col-sm-12">
					<div class="feature-two_skill-inner">
						
						<!-- Sec Title -->
						<div class="sec-title-two">
							<div class="sec-title-two_title">شركة حساب للإستشارات المهنية</div>
 							<div class="sec-title-two_text">                         
                                   {!! $setting->about !!}
                            </div>
                        </div>

						
						 
					</div>
				</div>

				<!-- Blocks Column -->
				<div class="  col-lg-6 col-md-12 col-sm-12">
					<div class="feature-two_blocks-inner">
						<div class="feature-two_pattern-layer"></div>
						<div class="row clearfix">
                        @if (!empty($result['objectives']))
                          @foreach ($result['objectives'] as $item)
							<!-- Feature Block -->
							<div class="  col-lg-6 col-md-6 col-sm-12">
								<div class="feature-block_two-inner">
									<div class="feature-block_two-icon img120">
										<img src="{{ $item->image }}" />
									</div>
									<h5 class="feature-block_two-heading" >                               {{ $item->description }}
</h5>
									
								 
								</div>
							</div>
                            @endforeach
                            @endif
							
						
						
							
						
							
						</div>
					</div>
				</div>
				
				
				
			</div>
		</div>
	</section>
	<!-- End Feature Two -->
	