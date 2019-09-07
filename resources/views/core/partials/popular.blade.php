
<div class="">
	<div class="how2 how2-cl4 flex-s-c">
		<h3 class="f1-m-2 cl3 tab01-title">
			Most Popular
		</h3>
	</div>

	<ul class="p-t-35">
		@foreach($info['popular'] as $key => $item)
		<li class="flex-wr-sb-s p-b-22">
			<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
				{{ $key }}
			</div>

			<a href="{{route('view.detail',['slug'=>$item['slug'],'id'=>$item['id']])}}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
				{{ $item['title'] }}
			</a>
		</li>
		@endforeach

	</ul>
</div>	