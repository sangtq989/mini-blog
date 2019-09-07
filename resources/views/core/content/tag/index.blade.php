@extends('core.layout')
@section('breadcrumb')

@endsection
@section('content')
<div class="col-md-10 col-lg-8 p-b-80">
					<div class="p-r-10 p-r-0-sr991">
						<div class="m-t--40 p-b-40">
							@foreach($post as $item)
							<!-- Item post -->
							<div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
								<a href="{{route('view.detail',['slug'=>$item['post_slug'],'id'=>$item['post_id']]) }}" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
									<img src="{{ URL::to('/') }}/upload/img/{{ $item['thumbnail'] }}" alt="IMG">
								</a>

								<div class="size-w-9 w-full-sr575 m-b-25">
									<h5 class="p-b-12">
										<a href="blog-detail-02.html" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
											{{ $item['title'] }}
										</a>
									</h5>

									<div class="cl8 p-b-18">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $item['author'] }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											{{ $item['publish_date'] }}
										</span>
									</div>

									<p class="f1-s-1 cl6 p-b-24">
										{{ $item['sapo'] }}
									</p>

									<a href="{{route('view.detail',['slug'=>$item['post_slug'],'id'=>$item['post_id']]) }}" class="f1-s-1 cl9 hov-cl10 trans-03">
										Read More
										<i class="m-l-2 fas fa-long-arrow-alt-right"></i>
									</a>
								</div>
							</div>
							@endforeach
							
						</div>

						<a href="#" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03">
							Load More
						</a>
					</div>
				</div>

@endsection