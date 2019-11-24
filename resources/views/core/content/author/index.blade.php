@extends('core.layout')

@section('content')
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
			Post of {{ $author['name'] }}
		</h2>
	</div>
	<div class="col-md-10 col-lg-8 p-b-80">
					<div class="row">
						@foreach($post as $item)
						<div class="col-sm-6 p-r-25 p-r-15-sr991 post-item-load">
							<!-- Item latest -->	
							<div class="m-b-45">
								<a href="{{ route('view.detail',['slug'=>$item['slug'],'id'=>$item['id']]) }}" class="wrap-pic-w hov1 trans-03">
									<img src="{{ URL::to('/') }}/upload/img/{{ $item['thumbnail'] }}" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="{{ route('view.detail',['slug'=>$item['slug'],'id'=>$item['id']]) }}" class="f1-m-3 cl2 hov-cl10 trans-03">
											{{ $item['title'] }}
										</a>
									</h5>

									<span class="cl8">
										<a href="{{ route('view.cate',['id'=>$item['cate_id'],'slug'=>$item['cate_slug']]) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
											{{ $item['cate_name'] }}
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