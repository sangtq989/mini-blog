<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home 01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('core/images/icons/favicon.png') }}"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('core/vendor/bootstrap/css/bootstrap.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('core/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('core/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="{{ asset('core/vendor/animate/animate.css') }}">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('core/vendor/css-hamburgers/hamburgers.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('core/vendor/animsition/css/animsition.min.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('core/css/util.min.css') }}">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('core/css/main.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('core/css/profile-pic.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('core/css/comment.css') }}">
	@stack('style')
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		@include('core.partials.header')
	</header>


	<!-- Headline -->
	
	@if($info['isHome']=='view.home')
		<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
				<span class="text-uppercase cl2 p-r-8">
					Trending Now:
				</span>

				<span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Interest rate angst trips up US equity bull market
					</span>
					
					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Designer fashion show kicks off Variety Week
					</span>

					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Microsoft quisque at ipsum vel orci eleifend ultrices
					</span>
				</span>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	</div>
	@else
	{{-- Breadcrumb --}}
	<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				@php

					$string =str_replace(url('/'), '', url()->current());
					$str_arr = explode ("/", $string);  
				@endphp
				
				@foreach($str_arr as $key => $items)
				<span class="breadcrumb-item f1-s-3 cl9">
					{{ $items }}
				</span>
				@endforeach
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	</div>
	@endif

	<!-- Feature post -->
	<section class="bg0">
		@if($info['isHome']=='view.home')
		@include('core.partials.feature-post')
		@endif
	</section>

	<!-- Post -->
	<section class="bg0">
		<div class="container">
			<div class="row justify-content-center p-l-25">
				@yield('status')
			</div>
			<div class="row justify-content-center p-t-50">
				{{-- Content --}}
				
				@yield('content')
				{{-- 	{{ Route::currentRouteName() }} --}}

				{{-- {{ $routeName = \Request::route()->getName() }} --}}
				{{-- Side bar --}}
				@php
				$routeName = \Request::route()->getName();
					//echo $routeName;
				$value = starts_with($routeName, 'view.');					
				@endphp
				
				@if($value == 1)
				<div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!--Most popular  -->
						@include('core.partials.popular')					
						
						<!-- Video -->
						<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-35">
								<h3 class="f1-m-2 cl3 tab01-title">
									Featured Video
								</h3>
							</div>

							<div>
								<div class="wrap-pic-w pos-relative">
									<img class="lazy" src="{{ asset('core/images/video-01.jpg') }}" alt="IMG">

									<button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">
										<span class="fab fa-youtube"></span>
									</button>
								</div>

								<div class="p-tb-16 p-rl-25 bg3">
									<h5 class="p-b-5">
										<a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">
											Music lorem ipsum dolor sit amet consectetur 
										</a>
									</h5>

									<span class="cl15">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
											by John Alvarado
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 18
										</span>
									</span>
								</div>
							</div>	
						</div>
						
						
						<!-- Tag -->
						@include('core.partials.tag')
					</div>
				</div>
				@endif
				
			</div>
		</div>
	</section>	
	<footer>
		@include('core.partials.footer')
	</footer>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>

	<!-- modal login -->	


	

	<!--===============================================================================================-->	
	<script src="{{ asset('core/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('core/vendor/animsition/js/animsition.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('core/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('core/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('core/js/main.js') }}"></script>

	<!--===============================================================================================-->
	<script src="{{ asset('core/js/jquery.lazy.js') }}"></script>
	<script src="{{ asset('core/js/comment.js') }}"></script>
	
	<!--===============================================================================================-->
	<script src="{{ asset('core/js/profile-pic.js') }}"></script>
	<script src="{{ asset('core/js/jquery.validate.js') }}"></script>
	<script src="{{ asset('core/js/additional-methods.js') }}"></script>
	{{-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> --}}
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

	
	<!--===============================================================================================-->

	@stack('script')


</body>
</html>