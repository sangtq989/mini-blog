@extends('core.layout')
@section('content')


<div class="col-md-10 col-lg-8 p-b-30">
	<div class="p-r-10 p-r-0-sr991">
		<!-- Blog Detail -->
		<div class="p-b-70">
			{{-- 	 --}}
			<a href="{{ route('view.cate',['id'=>$detail->categories_id,'slug'=>$detail->cate_slug]) }}" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
				{{ $detail->cate_name }}
			</a>

			<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
				{!!  $detail->title !!}
			</h3>
			

			<div class="flex-wr-s-s p-b-30">
				<span class="f1-s-3 cl8 m-r-15">
					<a href="{{ route('view.author',['user_name'=>$detail->user_name]) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
						by {{ $detail->name }}
					</a>

					<span class="m-rl-3">-</span>

					<span>
						{{ $detail->publish_date }}
					</span>
				</span>

				<span class="f1-s-3 cl8 m-r-15">
					5239 Views
				</span>

				<a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
					0 Comment
				</a>
			</div>
			<h5 class="f1-s-7 p-b-12 cl3">
				{!!  $detail->sapo !!}
			</h5>
			<div class="wrap-pic-max-w p-b-30">
				<img src="{{ URL::to('/') }}/upload/img/{{ $detail->thumbnail }}" alt="IMG">
			</div>

			<p>
				{!! $detail->content !!}
			</p>

			<!-- Tag -->
			<div class="flex-s-s p-t-12 p-b-15">
				<span class="f1-s-12 cl5 m-r-8">
					Tags:
				</span>

				<div class="flex-wr-s-s size-w-0">
					@foreach($tag as $item)
					<a href="{{ route('view.tag',['slug'=>$item['slug_tag'],'id'=>$item['tag_id']]) }}" class="f1-s-12 cl8 hov-link1 m-r-15">
						{{ $item['name_tag'] }}
					</a>
					@endforeach									

				</div>
			</div>

			<!-- Share -->
			<div class="flex-s-s">
				<span class="f1-s-12 cl5 p-t-1 m-r-15">
					Share:
				</span>

				<div class="flex-wr-s-s size-w-0">
					<a  href="https://www.facebook.com/sharer/sharer.php?u=http://localhost:8000/detail/{{$detail->slug}}/{{$detail->id}}" target="_blank" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
						<i class="fab fa-facebook-f m-r-7"></i>
						Facebook
					</a>

					<a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
						<i class="fab fa-twitter m-r-7"></i>
						Twitter
					</a>

					<a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
						<i class="fab fa-google-plus-g m-r-7"></i>
						Google+
					</a>

					<a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
						<i class="fab fa-pinterest-p m-r-7"></i>
						Pinterest
					</a>
				</div>
			</div>
		</div>

		<!-- Leave a comment -->


		
	</div>
	@include('core.partials.comment')
</div>

<!-- Sidebar -->



@endsection