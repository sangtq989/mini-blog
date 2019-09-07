@extends('core.layout')
@push('style')
<link href="{{ asset('core/css/multiple-select.css') }}" rel="stylesheet">
@endpush

@push('script')



<script src="{{ asset('core/js/multiple-select.js') }}"></script>
<script type="text/javascript">


	CKEDITOR.replace('contentPost' ,{
		height: 500
	});
</script>	
@endpush
@section('content')
<form action="{{ route('acc.update') }}" method="POST" id="update-form" class="mt-3 w-100" enctype="multipart/form-data">
	@if ($errors->any())
	<div class="alert alert-danger my-3">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	@csrf
	<div class="row">
		<div class="col-md-3 col-lg-3 p-b-80">
			<div class="form-group">
				<label for="language">Language</label>
				<select class="form-control" name="language" id="language">
					<option value="0">English</option>
					<option value="1">Tieng viet</option>
				</select>
			</div>
			<div class="form-group">
				<label for="categories">Danh muc</label>
				<select class="form-control" name="categories" id="categories">
					<option>---Choose categories</option>
					@foreach($cate as $key => $value)
					<option value="{{ $value['id'] }}" {{ $old['categories_id'] == $value['id'] ? 'selected=selected' : '' }}>{{ $value['name'] }}</option>
					@endforeach

				</select>
			</div>
			<div class="form-group">
				<label for="tags">Tag</label>
				<select name="tags[]" id="tags" class="w-100" multiple="multiple">					
					@foreach($tag as $key => $value)
					<option value="{{ $value['id'] }}" >{{ $value['name'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Publish date</label>
				<input type="checkbox" class="ml-3" checked="checked" name="publishPost">
			</div>

			<button type="submit" id="submit" class="btn btn-primary">Update</button>
			
		</div>
		<div class="col-md-9 col-lg-9 p-b-80">
			<div class="form-group">
				<label for="titlePost">Title</label>
				<input type="text" class="form-control" id="titlePost" name="titlePost" value="{{ $old['title'] }}" >
			</div>
			<div class="form-group">
				<label for="sapoPost">Sapo</label>
				<textarea class="form-control" id="sapoPost" name="sapoPost" >{!!  $old['sapo']  !!}</textarea>  
			</div>
			
			<div class="form-group">
				<label for="contentPost">Content</label>
				<textarea class="form-control" id="contentPost" name="contentPost" rows="10">{{ $old['content'] }}</textarea>  
			</div>
			<div class="form-group">
				<label for="avatarPost">Thumbnail</label>
				<div class="input-group">
					<span class="input-group-btn">
						<span class="btn btn-outline-secondary btn-file">
							Browse… <input type="file" id="thumbnail" name="thumbnail">
						</span>
					</span>
					<input type="text" class="form-control" value="" readonly>
				</div>
				<img id='img-upload' src="{{ URL::to('/') }}/upload/img/{{ $old['thumbnail'] }}" class="h-50" />
			</div>
			<input type="hidden" name="id" value="{{ $old{'post_id'} }}">

		</div>
	</div>
	
</form>



@push('script')
<script type="text/javascript">
	$(document).ready( function() {
		$(document).on('change', '.btn-file :file', function() {
			var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {

			var input = $(this).parents('.input-group').find(':text'),
			log = label;

			if( input.length ) {
				input.val(log);
			} else {
				if( log ) alert(log);
			}

		});
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#img-upload').attr('src', e.target.result);

				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#thumbnail").change(function(){
			readURL(this);
		}); 	
	});
</script>
<script type="text/javascript">
	$(function() {
		$('#tags').multipleSelect()
	})
</script>
<script type="text/javascript">
	$('document').ready(function(){
		if ($('#thumbnail').get(0).files.length === 0) {
			$('#submit').addClass('disabled')
			
		}
		else{
			$('#submit').removeClass('disabled')
			
		}	
	})
	$('#update-form').submit(function(){
		if ($('#thumbnail').get(0).files.length === 0) {
			//$('#submit').addClass('disabled')
			alert("Please choosen another thumbnail before update.");
			return false;
		}	
	})
	
	
	
</script>

@endpush
@endsection