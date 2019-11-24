@extends('core.layout')
@section('content')
<div class="col-md-10 col-lg-8">
	<div class="p-b-20">
		@php
		$firstCate=$homeContent[0];
		$post = $firstCate['post'];

		$firstPost = $post[0];

		$lastCate=end($homeContent);
		$postOfLastCate = $lastCate['post'];

		$firstPostOfLastCate = $postOfLastCate[0];
		@endphp
		<!-- Entertainment  -->
		<div class="p-b-20">
			<div class="how2 how2-cl1 flex-sb-c m-r-10 m-r-0-sr991">
				<h3 class="f1-m-2 cl12 tab01-title">

					{{ $firstCate['name'] }}
				</h3>


				<a href="{{ route('view.cate',['id'=>$firstCate['id'],'slug'=>$firstCate['slug']]) }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
					View all
					<i class="fs-12 m-l-5 fa fa-caret-right"></i>
				</a>
			</div>

			<div class="row p-t-35">
				<div class="col-sm-6 p-r-25 p-r-15-sr991">
					<!-- Item post -->	
					<div class="m-b-30">
						<a href="{{ route('view.detail',['slug'=>$firstPost['post_slug'],'id'=>$firstPost['post_id']]) }}" class="wrap-pic-w hov1 trans-03">
							<img src="{{URL::to('/') }}/upload/img/{{  $firstPost['thumbnail']  }}" alt="IMG">
						</a>

						<div class="p-t-20">
							<h5 class="p-b-5">
								<a href="{{ route('view.detail',['slug'=>$firstPost['post_slug'],'id'=>$firstPost['post_id']]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
									{!! $firstPost['title'] !!}
								</a>
							</h5>

							<span class="cl8">
								<a href="{{ route('view.author',['user_name'=>$firstPost['user_name']]) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
									By {{ $firstPost['author'] }}
								</a>

								<span class="f1-s-3 m-rl-3">
									-
								</span>

								<span class="f1-s-3">
									{{ $firstPost['publish_date'] }}
								</span>
							</span>
						</div>
					</div>
				</div>

				<div class="col-sm-6 p-r-25 p-r-15-sr991">
					@foreach($post as $key => $value)
					@if($key!=0)
					<div class="flex-wr-sb-s m-b-30">
						<a href="{{ route('view.detail',['slug'=>$value['post_slug'],'id'=>$value['post_id']]) }}" class="size-w-1 wrap-pic-w hov1 trans-03">
							<img src="{{ URL::to('/') }}/upload/img/{{  $value['thumbnail']   }}" alt="{{ $value['thumbnail'] }}">
						</a>

						<div class="size-w-2">
							<h5 class="p-b-5">
								<a href="{{ route('view.detail',['slug'=>$value['post_slug'],'id'=>$value['post_id']]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
									{{ $value['title'] }}
								</a>
							</h5>

							<span class="cl8">
								<a href="{{ route('view.author',['user_name'=>$value['user_name']]) }}" class="f1-s-6 cl8 hov-cl10 trans-03">
									By {{ $value['author'] }}
								</a>

								<span class="f1-s-3 m-rl-3">
									-
								</span>

								<span class="f1-s-3">
									{{ $value['publish_date'] }}
								</span>
							</span>
						</div>				
					</div>
					@endif
					@endforeach



				</div>
			</div>
		</div>

		<!-- Other -->
		<div class="row">
			<!-- Business -->
			@foreach($homeContent as $item)
			@if(!$loop->first && !$loop->last)
			<div class="col-sm-6 p-r-25 p-r-15-sr991 p-b-25">
				<div class="how2 how2-cl2 flex-sb-c m-b-35">
					<h3 class="f1-m-2 cl13 tab01-title">
						{{ $item['name'] }} 
					</h3>


					<a href="{{ route('view.cate',['id'=>$item['id'],'slug'=>$item['slug']]) }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
						View all
						<i class="fs-12 m-l-5 fa fa-caret-right"></i>
					</a>
				</div>
				@foreach($item['post'] as $post)
				@if($loop->first)
				<div class="m-b-30">
					<a href="{{ route('view.detail',['slug'=>$post['post_slug'],'id'=>$post['post_id']]) }}" class="wrap-pic-w hov1 trans-03">
						<img src="{{URL::to('/') }}/upload/img/{{  $post['thumbnail']  }}" alt="IMG">
					</a>

					<div class="p-t-20">
						<h5 class="p-b-5">
							<a href="{{ route('view.detail',['slug'=>$post['post_slug'],'id'=>$post['post_id']]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
								{{ $post['title'] }}
							</a>
						</h5>

						<span class="cl8">
							<a href="{{ route('view.author',['user_name'=>$post['user_name']]) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
								{{ $post['author'] }}
							</a>

							<span class="f1-s-3 m-rl-3">
								-
							</span>

							<span class="f1-s-3">
								{{ $post['publish_date'] }}
							</span>
						</span>
					</div>
				</div>

				@else
				<div class="flex-wr-sb-s m-b-30">
					<a href="{{ route('view.detail',['slug'=>$post['post_slug'],'id'=>$post['post_id']]) }}" class="size-w-1 wrap-pic-w hov1 trans-03">
						<img src="{{URL::to('/') }}/upload/img/{{  $post['thumbnail']  }}" alt="IMGDonec metus orci, malesuada et lectus vitae">
					</a>

					<div class="size-w-2">
						<h5 class="p-b-5">
							<a href="{{ route('view.detail',['slug'=>$post['post_slug'],'id'=>$post['post_id']]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
								{{ $post['title'] }}
							</a>
						</h5>

						<span class="cl8">
							<a href="{{ route('view.author',['user_name'=>$post['user_name']]) }}" class="f1-s-6 cl8 hov-cl10 trans-03">
								By {{ $post['author'] }}
							</a>

							<span class="f1-s-3 m-rl-3">
								-
							</span>

							<span class="f1-s-3">
								{{ $post['publish_date'] }}
							</span>
						</span>
					</div>
				</div>
				@endif
				@endforeach
				<!-- Main Item post -->	

				
			</div>
			@endif
			@endforeach
			<!-- Technology -->

		</div>

		<!-- Travel  -->
		<div class="p-b-25 p-r-10 p-r-0-sr991">
		
			<div class="how2 how2-cl1 flex-sb-c m-r-10 m-r-0-sr991">
				<h3 class="f1-m-2 cl12 tab01-title">

					{{ $lastCate['name'] }}
				</h3>


				<a href="{{ route('view.cate',['id'=>$lastCate['id'],'slug'=>$lastCate['slug']]) }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
					View all
					<i class="fs-12 m-l-5 fa fa-caret-right"></i>
				</a>
			</div>

			<div class="flex-wr-sb-s p-t-35">

				<div class="size-w-6 w-full-sr575">
					<!-- Item post -->	
					<div class="m-b-30">
						<a href="{{ route('view.detail',['slug'=>$firstPostOfLastCate['post_slug'],'id'=>$firstPostOfLastCate['post_id']]) }}" class="wrap-pic-w hov1 trans-03">
							<img src="{{ URL::to('/') }}/upload/img/{{  $firstPostOfLastCate['thumbnail']   }}" alt="IMG">
						</a>

						<div class="p-t-25">
							<h5 class="p-b-5">
								<a href="{{ route('view.cate',['id'=>$lastCate['id'],'slug'=>$lastCate['slug']]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
									{{ $firstPostOfLastCate['title'] }}
								</a>
							</h5>

							<span class="cl8">
								<a href="{{ route('view.author',['user_name'=>$firstPostOfLastCate['user_name']]) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
									By {{ $firstPostOfLastCate['author'] }}
								</a>

								<span class="f1-s-3 m-rl-3">
									-
								</span>

								<span class="f1-s-3">
									{{$firstPostOfLastCate['publish_date'] }}
								</span>
							</span>

							<p class="f1-s-1 cl6 p-t-18">
								
								{!! $firstPostOfLastCate['sapo'] !!}
							</p>
						</div>
					</div>
				</div>

				<div class="size-w-7 w-full-sr575">
					<!-- Item post -->
					@foreach($postOfLastCate as $key1 =>$value1)
					@if($key1!=0)	
					<div class="m-b-30">
						<a href="{{ route('view.detail',['slug'=>$value1['post_slug'],'id'=>$value1['post_id']]) }}" class="wrap-pic-w hov1 trans-03">
							<img src="{{ URL::to('/') }}/upload/img/{{  $value1['thumbnail']   }}" alt="IMG">
						</a>

						<div class="p-t-10">
							<h5 class="p-b-5">
								<a href="{{ route('view.detail',['slug'=>$value1['post_slug'],'id'=>$value1['post_id']]) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
									{{ $value1['title'] }}
								</a>
							</h5>

							<span class="cl8">
								<a href="{{ route('view.author',['user_name'=>$value1['user_name']]) }}" class="f1-s-6 cl8 hov-cl10 trans-03">
									By {{  $value1['author']  }}
								</a>

								<span class="f1-s-3 m-rl-3">
									-
								</span>

								<span class="f1-s-3">
									{{  $value1['publish_date']  }}
								</span>
							</span>
						</div>
					</div>
					@endif
					@endforeach

				</div>
			</div>
		</div>
	</div>
</div>

@endsection