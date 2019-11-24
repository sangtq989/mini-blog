<div class="container">
			<div class="row m-rl--1">
				<div class="col-md-6 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url({{URL::to('/') }}/upload/img/{{  $feature[0]['thumbnail']  }});">
						<a href="{{route('view.detail',['slug'=>$feature[0]['slug'],'id'=>$feature[0]['id']])}}" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
								{{ $feature[0]['cate_name'] }}
							</a>

							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="blog-detail-01.html" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
									{{ $feature[0]['title'] }}
								</a>
							</h3>

							<span class="how1-child2">
								<span class="f1-s-4 cl11">
									{{ $feature[0]['author_name'] }}
								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
									{{ $feature[0]['publish_date'] }}
								</span>
							</span>
						</div>
					</div>
				</div>

				<div class="col-md-6 p-rl-1">
					<div class="row m-rl--1">
						<div class="col-12 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url({{URL::to('/') }}/upload/img/{{  $feature[1]['thumbnail']  }});">
								<a href="{{ route('view.detail',['slug'=>$feature[1]['slug'],'id'=>$feature[1]['id']]) }}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-24">
									<a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $feature[1]['cate_name'] }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="blog-detail-01.html" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
											{{ $feature[1]['title'] }}
										</a>
									</h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url({{URL::to('/') }}/upload/img/{{  $feature[2]['thumbnail']  }});">
								<a href="{{ route('view.detail',['slug'=>$feature[2]['slug'],'id'=>$feature[3]['id']]) }}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{ $feature[2]['cate_name']}}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="blog-detail-01.html" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{  $feature[2]['title'] }}
										</a>
									</h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url({{URL::to('/') }}/upload/img/{{  $feature[3]['thumbnail']  }});">
								<a href="{{ route('view.detail',['slug'=>$feature[3]['slug'],'id'=>$feature[3]['id']]) }}" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="#" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										{{  $feature[3]['cate_name'] }}
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="blog-detail-01.html" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
											{{  $feature[3]['title'] }}
										</a>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>