
	<!-- Footer -->

		<div class="bg2 p-t-40 p-b-25">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<a href="index.html">
								<img class="lazy" class="max-s-full" src="{{ asset('core/images/icons/logo-02.png') }}" alt="LOGO">
							</a>
						</div>

						<div>
							<p class="f1-s-1 cl11 p-b-16">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor magna eget elit efficitur, at accumsan sem placerat. Nulla tellus libero, mattis nec molestie at, facilisis ut turpis. Vestibulum dolor metus, tincidunt eget odio
							</p>

							<p class="f1-s-1 cl11 p-b-16">
								Any questions? Call us on +84 032 897 9593
							</p>

							<div class="p-t-15">
								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-facebook-f"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-twitter"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-pinterest-p"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-vimeo-v"></span>
								</a>

								<a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-youtube"></span>
								</a>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Popular Posts
							</h5>
						</div>

						<ul>
							<?php $i=1;?>
							@foreach($info['popular'] as $key => $item)
							<li class="flex-wr-sb-s p-b-20">
								<a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img class="lazy" src="{{ URL::to('/') }}/upload/img/{{ $item['thumbnail'] }}" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
											{{ $item['title'] }}
										</a>
									</h6>

									<span class="f1-s-3 cl6">
										{{ $item['publish_date'] }}
									</span>
								</div>
							</li>
							 @if($i++ == 3) 
							 	@break;
							 @endif
							@endforeach

						</ul>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Category
							</h5>
						</div>

						<ul class="m-t--12">
							
							@foreach($info['cateContent'] as $item)
							@php
								$i=count($item['post'])
							@endphp
							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="{{ route('view.cate',['id'=>$item['id'],'slug'=>$item['slug']]) }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									{{$item['name']}} ({{$i}})
								</a>
							</li>
							
							@endforeach

						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="bg11">
			<div class="container size-h-4 flex-c-c p-tb-15">
				<span class="f1-s-1 cl0 txt-center">
					Copyright © 2018 

					<a href="facebook.com/sangtq969" class="f1-s-1 cl10 hov-link1">Sang Pham.</a>

					All rights reserved.
				</span>
			</div>
		</div>


