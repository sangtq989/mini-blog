@extends('core.layout')

@section('status')
@if (session('status'))


<div class="alert alert-success col-lg-12 col-md-12 p-l-10">
	{{ session('status') }}
</div>


@endif
@endsection

@section('content')
<style type="text/css">
	.blockquote {
		border-left: 4px solid #ccc;
		color: #a5a4a4;
		font-style: italic;
		margin: 30px 0 30px 15px;
		padding-left: 15px;
		font-size: 13px;
	}
</style>
<div class="col-md-3 col-lg-3 p-b-80">
	<div class="p-l-10 p-rl-0-sr991">
		<!-- Popular Posts -->
		<div class="col border bg-light">
			<div class="p-4">
				<div class="">
					<div class="author d-flex align-items-center w-100">										
						<img style="width: 100px; height: 100px; margin: auto;" class="img-fluid rounded-circle" src="{{ URL::to('/') }}/upload/UserAvatar/{{ $user['avatar'] }}">				
					</div>
				</div>		
				<div class="info">
					<div>
						<div class="text-center">
							<h4 class="f1-l-4 cl8 hov-cl10 trans-03">{{ $user['name'] }}</h4>
							<p class="cl8 hov-cl10 trans-03"><span>@</span>{{ $user['user_name'] }}</p>
						</div>
						<div class="text-center">
							<span class="f1-s-4 cl8 hov-cl10 trans-03"></span>
						</div>
						<div class="row">
							@if($user['bio']=='')
							<blockquote class="blockquote ">							
								Nothing here, it a dead silence
							</blockquote>
							@else
							<blockquote class="blockquote ">							
								{{ $user['bio'] }}
							</blockquote>
							@endif
						</div>
						


						<div class="row pt-2 mb-3" style="height: 53px">								
							<div class="col-sm-6 h-100 border-right text-center">
								<a href="" class="f1-m-4 cl8 hov-cl10 trans-03">
									<span>0</span>
									<p>follower</p>
								</a>
							</div>	

							<div class="col-sm-6 h-100 text-center">
								<a href="" class="f1-m-4 cl8 hov-cl10 trans-03">
									<span>0</span>
									<p>following</p>
								</a>
							</div>
						</div>
					</div>
					<div class="row mx-auto">
						<button class="mx-auto btn btn-danger w-100" data-toggle="modal" data-target="#editProfileModal">
							Edit
						</button>
					</div>
				</div>		

			</div>	
		</div>
		<div class="col border mt-2 bg-light">
			<ul class="main-menu no-before flex-column">
				<li class="mega-menu-item w-100 py-2 no-before d-inline-flex"><i class="fas fa-caret-right my-auto"></i><a href="" class="w-100">Profike</a></li>
				<li class="mega-menu-item w-100 py-2 no-before"><a href="{{ route('acc.create') }}">Add post</a></li>
				<li class="mega-menu-item w-100 py-2 no-before"><a href="">Follow</a></li>
			</ul>

		</div>
	</div>
</div>
<div class="col-md-9 col-lg-9 p-b-80">
	<div class="p-r-10 p-r-0-sr991">
		<div class="m-t--40 p-b-40">
			<!-- Item post -->

			@foreach($user_post as $key =>$value)
			<div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2 post-item-load">
				@if($value['status']==3)
									<a class="dropdown-item bg-success text-white">Pennding</a>
								@elseif($value['status']==0)
								<a class="dropdown-item bg-danger text-white ">Not aproved</a>
								
								@endif
				<a href="{{ route('view.detail',['slug'=>$value['slug'],'id'=>$value['id']]) }}" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
					<img src="{{ URL::to('/') }}/upload/img/{{ $value['thumbnail'] }}" alt="IMG">
				</a>

				<div class="size-w-9 w-full-sr575 m-b-25">
					<h5 class="p-b-12">
						<a href="{{ route('view.detail',['slug'=>$value['slug'],'id'=>$value['id']]) }}" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
							{{ $value['title'] }}
						</a>

					</h5>


					<div class="cl8 p-b-18 row">
						<div class="col-sm-8">
							<a href="{{ route('view.author',['user_name'=>$value['user_name']]) }}" class="f1-s-4 cl8 hov-cl10 trans-03">
								by {{ $value['name'] }}
							</a>

							<span class="f1-s-3 m-rl-3">
								-
							</span>

							<span class="f1-s-3">
								{{ $value['publish_date'] }}
							</span>
						</div>
						<div class="col-sm-4">	
							<div class="dropdown dropleft float-right">
								<button type="button" class="" data-toggle="dropdown">
									<i class="fas fa-list"></i>
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="{{ route('acc.edit',['slug'=>$value['slug'],'id'=>$value['id']]) }}">Edit</a>
									<a class="dropdown-item" data-toggle="modal" data-target="#confirmModal{{ $value['id'] }}">Delete</a>
								@if($value['status']==1)

									@if($value['status'] == 1)
									<a class="dropdown-item" href="{{ route('acc.off',['id'=>$value['id']]) }}">Turn off comment</a>
									@elseif($value['status']==2)
									<a class="dropdown-item" href="{{ route('acc.on',['id'=>$value['id']]) }}">Turn on comment</a>
									@endif
									@if($value['status'] == 1)
									<a class="dropdown-item bg-danger text-white " href="{{ route('acc.disable',['id'=>$value['id']]) }}">Disable post</a>
									
									@endif


								@elseif($value['status']==3)
									<a class="dropdown-item bg-success text-white">Pennding</a>
								@elseif($value['status']==0)
								<a class="dropdown-item bg-danger text-white ">Not aproved</a>
								@elseif($value['status'] == 4)
									<a class="dropdown-item bg-success text-white" href="{{ route('acc.enable',['id'=>$value['id']]) }}">Publish post</a>
								@endif

								</div>
							</div>					

						</div>				

					</div>

					<p class="f1-s-1 cl6 p-b-24">
						{{ $value['sapo'] }}
					</p>

					<a href="{{ route('view.detail',['slug'=>$value['slug'],'id'=>$value['id']]) }}" class="f1-s-1 cl9 hov-cl10 trans-03">
						Read More
						<i class="m-l-2 fas fa-long-arrow-alt-right"></i>
					</a>
				</div>
			</div>
			@endforeach


		</div>
		@if($user_post)
		<a href="" id="loadMore" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03">
			Load More
		</a>
		@else
		<a href="#" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03">
			Wow! such empty
		</a>
		@endif
	</div>
</div>
</div>
@foreach($user_post as $key =>$value)
<div class="modal" id="confirmModal{{ $value['id'] }}" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true" data-backdrop="false">
	<div class="vertical-alignment-helper">
		<div class="modal-dialog modal-sm vertical-align-center">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close_modal_info"><span aria-hidden="true">&times;</span></button>
					<div id="confirmContent" style="font-weight: normal;">Are you sure to delete this post</div>
				</div>
				<div class="modal-footer text-center" id="footer_modal">
					<form action="{{ route('acc.delete', ['id' => $value['id']]) }}" method="post">
						<input class="btn btn-default" type="submit" value="Delete" />
						<input type="hidden" name="userId" value="{{ Session::get('id') }}">

						@method('delete')
						@csrf
					</form>
					<button type="button" class="btn btn-secondary btn_no_confirm" data-dismiss="modal" aria-label="Close">No</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach


	<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-hidden="true">		
		<div class="modal-dialog row" role="document">
			<div class="modal-content col-md-9 m-auto">
				
				<div class="modal-header">

					<h3>Edit</h3>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<form class="form" role="form" autocomplete="off" id="formLogin" action="{{ route('acc.profile',['user_name' => $user['user_name']]) }}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="">
							<div class="author d-flex align-items-center">									
								<div id="image" class="m-auto p-b-20">
									<img id="img-upload" style="width: 100px; height: 100px; margin: auto;" class="img-fluid rounded-circle" src="{{ URL::to('/') }}/upload/UserAvatar/{{ $user['avatar'] }}"/>						

								</div>


							</div>
							<span class="input-group-btn">
								<span class="btn btn-outline-secondary btn-file m-auto">
									Browse… <input type="file" id="avatar" name="avatar">
								</span>
							</span>
							<input type="hidden" id="file_name"/>				
						</div>	
						<div class="info p-t-20">
							<div>
								<div class="text-center">
									<h4 class="f1-l-4 cl8 hov-cl10 trans-03 click" value="{{ $user['name'] }}">{{ $user['name'] }}</h4>
									<h4 class="f1-l-4 cl8 hov-cl10 trans-03"><span>@</span>{{ $user['user_name'] }}</h4>
								</div>
								<div class="text-center">
									<span class="f1-s-4 cl8 hov-cl10 trans-03">admin</span>
								</div>
								<div class="text-center">
									<textarea type="text" class="form-control m-auto" rows="5" id="bio" name="bio" placeholder="Wow! Such empty">{{ $user['bio'] }}</textarea>
								</div>

							</div>				
						</div>		


						<div class="form-group py-4">
							<button class="btn btn-outline-secondary btn-lg" data-dismiss="modal" aria-hidden="true">Cancel</button>
							<button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Update!</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>	
	@push('script')
	<script type="text/javascript">
		$('.click').click(function(){
			$( this ).replaceWith( '<input type="text" class="form-control form-control-lg w-50 m-auto" name="name" id="name" required="">');
		})


	</script>
	<script type="text/javascript">
		$(document).ready( function() {
			$(document).on('change', '.btn-file :file', function() {
				var input = $(this),
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				input.trigger('fileselect', [label]);
			});

		// $('.btn-file :file').on('fileselect', function(event, label) {

		//     var input = $(this).parents('.input-group').find(':text'),
		//         log = label;

		//     if( input.length ) {
		//         input.val(log);
		//     } else {
		//         if( log ) alert(log);
		//     }

		// });
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#img-upload').attr('src', e.target.result);

				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#avatar").change(function(){
			readURL(this);
		}); 	
	});
</script>
@endpush
@endsection