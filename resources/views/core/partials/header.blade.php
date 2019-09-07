

<div class="container-menu-desktop">
	<div class="topbar">
		<div class="content-topbar container h-100">
			<div class="left-topbar">
				<span class="left-topbar-item flex-wr-s-c">
					<span>
						Ha Noi, VN
					</span>

					<img class="m-b-1 m-rl-8" src="{{ asset('core/images/icons/icon-night.') }}png" alt="IMG">

					<span>
						HI 32° LO 36°
					</span>
				</span>

				<a href="#" class="left-topbar-item">
					About
				</a>

				<a href="#" class="left-topbar-item">
					Contact
				</a>
				
				



			</li>
		</div>

		<div class="right-topbar float-right">
			@if(!Session::get('user_name'))
			<a href="" class="left-topbar-item" data-toggle="modal" data-target="#loginModal">
				Login
			</a>
			@else
			<div class="dropdown drop-left">

				<a href="" class="left-topbar-item" data-toggle="dropdown">
					{{ Session::get('name') }} <i class="fas fa-caret-down" ></i>


				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{ asset('profile') }}">Info</a>
					<a class="dropdown-item" href="{{ url('log-out') }}">Logout</a>					
				</div>	
			</div>
			
			@endif
		</div>
	</div>
</div>

<!-- Header Mobile -->
<div class="wrap-header-mobile">
	<!-- Logo moblie -->		
	<div class="logo-mobile">
		<a href="index.html"><img src="{{ asset('core/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
	</div>

	<!-- Button show menu -->
	<div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
		<span class="hamburger-box">
			<span class="hamburger-inner"></span>
		</span>
	</div>
</div>

<!-- Menu Mobile -->
<div class="menu-mobile">
	<ul class="topbar-mobile">
		<li class="left-topbar">
			<span class="left-topbar-item flex-wr-s-c">
				<span>
					New York, NY
				</span>

				<img class="m-b-1 m-rl-8" src="{{ asset('core/images/icons/icon-night.') }}png" alt="IMG">

				<span>
					HI 58° LO 56°
				</span>
			</span>
		</li>

		<li class="left-topbar">
			<a href="#" class="left-topbar-item">
				About
			</a>

			<a href="#" class="left-topbar-item">
				Contact
			</a>

			<a href="#" class="left-topbar-item">
				Sign up
			</a>

			<a href="#" class="left-topbar-item">
				Log in
			</a>
		</li>

		<li class="right-topbar">
			<a href="#">
				<span class="fab fa-facebook-f"></span>
			</a>

			<a href="#">
				<span class="fab fa-twitter"></span>
			</a>

			<a href="#">
				<span class="fab fa-pinterest-p"></span>
			</a>

			<a href="#">
				<span class="fab fa-vimeo-v"></span>
			</a>

			<a href="#">
				<span class="fab fa-youtube"></span>
			</a>
		</li>
	</ul>

	<ul class="main-menu-m">
		<li>
			<a href="index.html">Home</a>
			<ul class="sub-menu-m">
				<li><a href="index.html">Homepage v1</a></li>
				<li><a href="home-02.html">Homepage v2</a></li>
				<li><a href="home-03.html">Homepage v3</a></li>
			</ul>

			<span class="arrow-main-menu-m">
				<i class="fa fa-angle-right" aria-hidden="true"></i>
			</span>
		</li>

		<li>
			<a href="category-01.html">News</a>
		</li>

		<li>
			<a href="category-02.html">Entertainment </a>
		</li>

		<li>
			<a href="category-01.html">Business</a>
		</li>

		<li>
			<a href="category-02.html">Travel</a>
		</li>

		<li>
			<a href="category-01.html">Life Style</a>
		</li>

		<li>
			<a href="category-02.html">Video</a>
		</li>

		<li>
			<a href="#">Features</a>
			<ul class="sub-menu-m">
				<li><a href="category-01.html">Category Page v1</a></li>
				<li><a href="category-02.html">Category Page v2</a></li>
				<li><a href="blog-grid.html">Blog Grid Sidebar</a></li>
				<li><a href="blog-list-01.html">Blog List Sidebar v1</a></li>
				<li><a href="blog-list-02.html">Blog List Sidebar v2</a></li>
				<li><a href="blog-detail-01.html">Blog Detail Sidebar</a></li>
				<li><a href="blog-detail-02.html">Blog Detail No Sidebar</a></li>
				<li><a href="about.html">About Us</a></li>
				<li><a href="contact.html">Contact Us</a></li>
			</ul>

			<span class="arrow-main-menu-m">
				<i class="fa fa-angle-right" aria-hidden="true"></i>
			</span>
		</li>
	</ul>
</div>

<!-- Logo -->
<div class="wrap-logo container">
	<!-- Logo desktop -->		
	<div class="logo">
		<a href="{{ asset('/') }}"><img src="{{ asset('core/images/icons/logo-01.png') }}" alt="LOGO"></a>
	</div>	


</div>	


<!--  -->
<div class="wrap-main-nav">
	<div class="main-nav">
		<!-- Menu desktop -->
		<nav class="menu-desktop">
			<a class="logo-stick" href="index.html">
				<img src="{{ asset('core/images/icons/logo-01.png') }}" alt="LOGO">
			</a>

			<ul class="main-menu">
				@foreach($info['cate'] as $item)
				<li class="mega-menu-item">
					<a href="category-01.html">{{ $item['name'] }}</a>

					<div class="sub-mega-menu">
						<div class="nav flex-column nav-pills" role="tablist">
							@foreach($item['subChilds'] as $subMenu)
								@if($loop->first)
								<a class="nav-link active" data-toggle="pill" href="#{{ $subMenu['slug'] }}" role="tab">{{ $subMenu['name'] }}</a>
								@else
								<a class="nav-link" data-toggle="pill" href="#{{ $subMenu['slug'] }}" role="tab">{{ $subMenu['name'] }}</a>
								@endif
							@endforeach
						</div>

						<div class="tab-content">
							@foreach($item['subChilds'] as $subMenu)
							@if($loop->first)
							<div class="tab-pane active" id="{{ $subMenu['slug'] }}" role="tabpanel">
								<div class="row">
									@foreach($info['cateContent'] as $content)
									@if($content['name'] == $subMenu['name'])
										@foreach($content['post'] as $detail)
										<div class="col-3">
											<!-- Item post -->	
											<div>
												<a href="{{route('view.detail',['slug'=>$detail['post_slug'],'id'=>$detail['post_id']])}}" class="wrap-pic-w hov1 trans-03">
													<img src="{{URL::to('/') }}/upload/img/{{ $detail['thumbnail'] }}" alt="IMG">
												</a>

												<div class="p-t-10">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															{{ $detail['title'] }}
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															{{ $detail['cate_name'] }}
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															{{ $detail['publish_date'] }}
														</span>
													</span>
												</div>
											</div>
										</div>
										@endforeach
									@endif
									@endforeach
									
								</div>
							</div>
							@else
							<div class="tab-pane" id="{{ $subMenu['slug'] }}" role="tabpanel">
								<div class="row">
									@foreach($info['cateContent'] as $content)
									@if($content['name'] == $subMenu['name'])
										@foreach($content['post'] as $detail)
										<div class="col-3">
											<!-- Item post -->	
											<div>
												<a href="{{route('view.detail',['slug'=>$detail['post_slug'],'id'=>$detail['post_id']])}}" class="wrap-pic-w hov1 trans-03">
													<img src="{{URL::to('/') }}/upload/img/{{ $detail['thumbnail'] }}" alt="IMG">
												</a>

												<div class="p-t-10">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															{{ $detail['title'] }}
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															{{ $detail['cate_name'] }}
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															{{ $detail['publish_date'] }}
														</span>
													</span>
												</div>
											</div>
										</div>
										@endforeach
									@endif
									@endforeach
									
								</div>
							</div>
							@endif

							
							@endforeach
						</div>
					</div>
				</li>
				@endforeach


			</ul>
		</nav>
	</div>
</div>	
</div>


{{--modal login --}}
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">		
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3>Login</h3>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<form class="form" role="form" autocomplete="off" id="formLogin" action="{{ url('handle-login') }}" method="POST">
					@csrf

					<div class="form-group">
						<a href="{{ route('core.register') }}" class="float-right">New user?</a>
						<label for="usename">Username</label>
						<input type="text" class="form-control form-control-lg" name="username" id="username" required="">						
						<div class="invalid-feedback">Oops, you missed this one.</div>

					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control form-control-lg" name="password" id="password" required="">
						<div class="invalid-feedback">Password too !!</div>
										

					</div>
										
					<p class="invisible text-danger p-l-10" id="incorrect">Password or username is incorrect</p>	
		
					

					<div class="custom-control pl-2">
						<input type="checkbox" class="m-auto" id="rememberMe">
						<label class="custom-control-label p-l-4" for="rememberMe">Remember me on this computer</label>
					</div>
					<div class="form-group py-4">
						<button class="btn btn-outline-secondary btn-lg" data-dismiss="modal" aria-hidden="true">Cancel</button>
						<button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>		
@push('script')

<script type="text/javascript">
	$('.list>a:first-child').addClass('active');
</script>
<script type="text/javascript">
	$("#btnLogin").hover(function(event) {

    //Fetch form to apply custom Bootstrap validation
    var form = $("#formLogin")

    if (form[0].checkValidity() === false) {
    	event.preventDefault();
    	event.stopPropagation();
    	form.addClass('was-validated');


    }else{
    	$('.invalid-feedback').addClass('invisible');
    	$('#wrong').removeClass('invisible');	
    }
    
    
});
</script>
<script type="text/javascript">
 
    $(document).ready(function() {
 
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#loginModal").validate({
            rules: {
                username: "required",
                password: "required",
                
            },
            messages: {
                username: "Vui lòng nhập họ",
                username: "Vui lòng nhập tên",
               
            }
        });
    });
    </script>
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)        
<script>
	$(function() {
		$('#loginModal').modal('show');
		$('#incorrect').removeClass('invisible');

	});
</script>
 
@endif

@endpush