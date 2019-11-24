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
<form action="{{ route('acc.store') }}" method="POST" class="mt-3 w-100" id="create-form" enctype="multipart/form-data">

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
					<option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
					@endforeach

				</select>
			</div>
			<div class="form-group">
				<label for="tags">Tag</label>
				<select name="tags[]" id="tags" class="w-100 validate[required]" multiple="multiple">	
									
					@foreach($tag as $key => $value)
					<option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
					@endforeach
				</select>
			</div>
			{{-- <div class="form-group">
				<label>Publish date</label>
				<input type="checkbox" class="ml-3" checked="checked" name="publishPost">
			</div> --}}
			
			<button type="submit" class="btn btn-submit">OK</button>
		</div>
		<div class="col-md-9 col-lg-9 p-b-80">
			<div class="form-group">
				<label for="titlePost">Title</label>
				<input type="text" class="form-control" id="titlePost" name="titlePost" value="{{old('titlePost') }}" >
				

			</div>
			<div class="form-group">
				<label for="sapoPost">Sapo</label>
				<textarea class="form-control" id="sapoPost" name="sapoPost">{{old('sapoPost') }}</textarea>  
			</div>
			
			<div class="form-group">
				<label for="contentPost">Content</label>
				<textarea class="form-control" id="contentPost" name="contentPost" rows="10">{{old('contentPost') }}</textarea>  
			</div>
			<div class="form-group">
				<label for="avatarPost">Thumbnail</label>
				<div class="input-group">
					<span class="input-group-btn">
						<span class="btn btn-outline-secondary btn-file">
							Browse… <input type="file" id="thumbnail" name="thumbnail">
						</span>
					</span>
					<input type="text" class="form-control" readonly>
				</div>
				<img id='img-upload' src="" class="h-50" />
			</div>

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
	$("#create-form").validate({
		errorPlacement: function(label, element) {
			label.addClass('alert alert-danger my-3');

			label.insertAfter(element);
		},
    //Khai báo cáo rule
    rules: {
      // username là bắt buộc và có độ dài từ 6 - 20 kí tự
      "titlePost":{
      	required: true,
      	maxlength: 100,
      	minlength: 20	
      },
      "sapoPost":{
      	required: true,
      	maxlength: 500,
      	minlength: 50
      },
      "language":{
      	required: true,

      },
      "categories":{
      	required: true,

      },
      "contentPost":{
      	required: true,
      	minlength: 100
      },
      "thumbnail": {
      	required: true,
      	extension: "jpeg|bmp|png|jpg|gif"
      },
      "tags": {
      	required: true,

      },
      "categories": {
      	required: true,

      },






  },
      // Các thông báo lỗi tương ứng với mỗi rule
      messages: {
      	"titlePost":{
      		required: "Post must has title",
      		maxlength: "Too long, title must be less than 500 ",
      		minlength: "Title must be more than 20  charracter"
      	},
      	"sapoPost":{
      		required: "Post need some description",
      		maxlength: "Too long, description must be less than 500 ",
      		minlength: "description must be more than 50  charracter"
      	},
      	"language":{
      		required: "Post need language",

      	},
      	"categories":{
      		required: "You should chosse cate for the post",

      	},
      	"cke_contentPost":{
      		required: "Post need content!!",
      		minlength: "Your post is too short, post need to be at least 100 character"
      	},
      	"thumbnail": {
      		required: "Please chosse thumbnail picture in your computer",
      		extension: "The thumbnail must be a picture with extension like jpeg,bmp,png,jpg,gif "
      	},
      	"tags": {
      		required:  "Please chosse tag for your post, post can has multiple tag",

      	},
      	"categories": {
      		required: "Please chosse your category for your post, post only has 1 category",

      	},




      }
  });
</script>

@endpush
@endsection