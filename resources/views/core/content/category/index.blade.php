@extends('core.layout')
@section('content')
<div class="col-md-10 col-lg-8 p-b-80">
	<div class="row p-b-50">
		<h5 class="f1-m-2 cl3 tab01-title">Category</h5>
	</div>
	<div class="row">
		@foreach($posts as $item)
		<div class="col-sm-6 p-r-25 p-r-15-sr991 post-item-load">
			<!-- Item latest -->	
			<div class="m-b-45">
				<a href="{{ route('view.detail',['slug'=>$item['post_slug'],'id'=>$item['post_id']]) }}" class="wrap-pic-w hov1 trans-03">
					<img src="{{ URL::to('/') }}/upload/img/{{ $item['thumbnail'] }}" alt="IMG">
				</a>

				<div class="p-t-16">
					<h5 class="p-b-5">
						<a href="{{ route('view.detail',['slug'=>$item['post_slug'],'id'=>$item['post_id']]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
							{{ $item['title'] }}
						</a>
					</h5>

					<span class="cl8">
						<a href="{{ route('view.author',['user_name'=>$item['user_name']]) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
							by {{ $item['author'] }}
						</a>

						<span class="f1-s-3 m-rl-3">
							-
						</span>

						<span class="f1-s-3">
							{{ $item['publish_date'] }}
						</span>
					</span>
				</div>
			</div>
		</div>
		@endforeach

	</div>

	<!-- Pagination -->
	<a href="#" id="loadMore" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03">
							Load More
						</a>
</div>
@endsection