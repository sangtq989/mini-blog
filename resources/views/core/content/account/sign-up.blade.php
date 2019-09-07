
<link rel="stylesheet" type="text/css" href="{{ asset('core/vendor/bootstrap/css/bootstrap4.min.css') }}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('core/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css') }}">

<!------ Include the above in your HEAD tag ---------->



<style type="text/css">
    .divider-text {
        position: relative;
        text-align: center;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .divider-text span {
        padding: 7px;
        font-size: 12px;
        position: relative;   
        z-index: 2;
    }
    .divider-text:after {
        content: "";
        position: absolute;
        width: 100%;
        border-bottom: 1px solid #ddd;
        top: 55%;
        left: 0;
        z-index: 1;
    }
    .warning{
        position: relative;
        padding: .5rem 0.75rem;
        /* margin-bottom: 1rem; */
        border: 1px solid transparent;
        border-radius: .25rem;
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

</style>

<div class="container ">
    <br>
    <div class="row m-auto"><a href="{{ route('view.home') }}"><img src="{{ asset('core/images/icons/logo-01.png') }}"></a></div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <br>
            <form action="{{ route('core.store') }}" method="post" id="register">
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
                <div class="card bg-light">
                    <article class="card-body mx-auto" style="max-width: 400px;">
                     <p class="text-center">Wellcome to our site, Join us to find useful information required to improve your skills. Please fill your info into the form below to continue. </a></p>
                     <h4 class="card-title mt-3 text-center">Create Account</h4>
                     <p class="text-center">Get started with your free account</p>

                     <form>
                        <div class="form-group input-group w-100">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="name" id="name" class="form-control" placeholder="Full name" type="text" value="{{ old('name') }}">
                        </div> <!-- form-group// -->
                        <div class="form-group input-group w-100">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" id="email" class="form-control" placeholder="Email address" type="email" value="{{ old('email') }}">
                        </div> <!-- form-group// -->
                        <div class="form-group input-group w-100">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-at"></i> </span>
                            </div>

                            <input name="user_name" id="user_name" class="form-control" placeholder="Your username" value="{{ old('user_name') }}" type="text">
                        </div> <!-- form-group// -->
                        <!-- form-group end.// -->
                        <div class="form-group input-group w-100">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="password" id="password" class="form-control" placeholder="Create password" type="password">
                        </div> <!-- form-group// -->
                        <div class="form-group input-group w-100">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="repeat-password" id="repeat-password"class="form-control" placeholder="Repeat password" type="password">
                        </div> <!-- form-group// -->                                      
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                        </div> <!-- form-group// -->      
                        <p class="text-center">Have an account? <a href="">Log In</a> </p>                                                                 
                    </form>
                </article>
            </div>
        </form>
    </div>
</div>

</div> 
<!--container end.//-->

<br><br>
<script src="{{ asset('core/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('core/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    $("#register").validate({
        errorPlacement: function(label, element) {
            // element.addClass('border border-warning');
            label.addClass('mt-2 w-100 warning');
            label.insertAfter(element);
            // if ($('label').length) {
            //     $('input').addClass('border border-warning');
            // }else{
            //       $('input').removeClass('border border-warning');
            // }
            
        },
    //Khai báo cáo rule
    rules: {
      // username là bắt buộc và có độ dài từ 6 - 20 kí tự
      "name":{
        required: true,
        maxlength: 100,
        minlength: 8   
    },
    "email":{
        required: true,
        maxlength: 500,
        minlength: 10,
        email:true,
    },
    "user_name":{
        required: true,
        minlength:8,

    },
    "password":{
        required: true,
        minlength:8

    },
    "repeat-password":{
     required: true,
     minlength:8,
     equalTo: '#password' 
 }







},
      // Các thông báo lỗi tương ứng với mỗi rule
      messages: {
        "name":{
            required: "Please enter your name",
            maxlength: "Your name only has 100 character",
            minlength: "Your name need at least 8 character"
        },
        "email":{
            required: "Post need some description",
            maxlength: "Too long, description must be less than 500 ",
            minlength: "description must be more than 50  charracter",
            email:"Invalid Email"
        },
        "user_name":{
            required: "Please enter your username",
            minlength:"User name mus has at least 8 character"

        },
        "password":{
            required: "Please enter your password",
            minlength:"Your password is to short"


        },
        "repeat-password":{
         required: "Please confirm your password",
         minlength:"Your password is to short",
         equalTo: 'Password must be the same', 
     }




 }
});
</script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
