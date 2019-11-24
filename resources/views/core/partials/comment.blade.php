<!-- comments container -->
<div class="comment_block" id="comment-wrapper">
   <!-- used by #{user} to create a new comment -->
   @if(Session::get('user_name') && $detail->status == 1)
   <form action="{{ route('com.add') }}" method="post">
      @csrf
      <div class="create_new_comment d-inline-flex">
         <!-- current #{user} avatar -->
         <div class="user_avatar">
            <img src="{{ URL::to('/') }}/upload/UserAvatar/{{ $userdata['avatar'] }}">
         </div>
         <!-- the input field -->
         <div class="input_comment">
            <input type="hidden" name="post_id" value="{{ $detail->id }}">

            <input type="hidden" name="user_id" value="{{ $userdata['id'] }}">
            <input type="text" placeholder="Join the conversation.." name="comment" id="comment">
         </div>
      </div>
      <div class="row d-flex justify-content-end">
         <button type="submit" class="btn btn-danger m-b-20 float-right" >OK</button>
      </div>
   </form>
   @elseif($detail->status == 2)
      <div class="text text-danger">Comment has been disable to this post</div>
  @elseif(Session::get('user_name')==""&& $detail->status != 2)
      <div class="fb-comments" data-numposts="5"></div>
   @else
   <div class="create_new_comment">
      <!-- current #{user} avatar -->
      <div class="user_avatar">
         <img src="https://s3.amazonaws.com/uifaces/faces/twitter/BillSKenney/73.jpg">
      </div>
      <!-- the input field -->
      <div class="input_comment">
         <input type="text" placeholder="Login to comment">
      </div>
   </div>
   @endif
   <div class="container" id="#section1">
      {{-- mega comment --}}
      @foreach($comment as $key => $item)
      <div class="row pb-4 pt-4">
         <input type="hidden" name="parrent-id" class="parrent-id" value="{{$item['id']}}">
         {{--  main comment/ --}}
         <div class="row border-bot pt-1 w-100">
            <div class="col-lg-2 col-md-2 col-sm-12">
             <img class="comment-avatar" src="{{ URL::to('/') }}/upload/UserAvatar/{{ $item['avatar'] }}"/>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12">
            <p>
               <a class="float-left" href=""><strong>{{ $item['author'] }}</strong></a>
            </p>
            <div class="clearfix"></div>
            <p>{{ $item['body'] }}</p>
            <ul class="d-flex justify-content-between tool-bar float-right">
               <li><i class="fa fa-share-alt"></i></li>
               <li><a href=""><i class="fa fa-reply"></i></a></li>
               <li><i class="fa fa-heart love"></i></li>
            </ul>
         </div>
      </div>
      {{-- reply --}}
      @foreach($item['reply'] as $reply)

      <div class="row border-bot reply p-t-10 w-100" id="rep">
         <div class="col-lg-2 col-md-2 col-sm-12 ">               
            <img class="comment-avatar" src="{{ URL::to('/') }}/upload/UserAvatar/{{ $reply['avatar'] }}"/>


            {{-- <p class="text-secondary text-center">15 Minutes Ago</p> --}}
         </div>
         <div class="col-lg-10 col-md-10 col-sm-12">
            <p>
               <a class="float-left" href=""><strong>{{ $reply['author'] }}</strong></a>
            </p>
            <div class="clearfix"></div>
            <p>{{ $reply['body'] }}</p>
            <ul class="d-flex justify-content-between tool-bar float-right">
               <li><i class="fa fa-share-alt"></i></li>
               <li><a href=""><i class="fa fa-reply"></i></a></li>
               <li><i class="fa fa-heart love"></i></li>
            </ul>
         </div>
      </div>
      @endforeach
      {{-- reply form --}}
      @if(Session::get('user_name') && $detail->status == 1)
        <form action="{{route('com.rep',['id'=>$item['id']])}}" method="post" class="w-100">
          <div class="create_new_comment row reply d-inline-flex m-l-60">
            <div class="reply_avatar">
               <img src="{{ URL::to('/') }}/upload/UserAvatar/{{ $userdata['avatar'] }}" class="img img-rounded img-fluid"/>
            </div>
            
            <div class="input_comment d-inline-flex">
               <input type="hidden" class="post_id" name="post_id" value="{{ $detail->id }}">

               <input type="hidden" class="user_id" name="user_id" value="{{ $userdata['id'] }}">
               
               <input type="text" class="reply" id="reply{{$key}}" name="reply" placeholder="Reply the comment!!">
               <button class="m-auto over-ride submit-rep"><i class="fas fa-paper-plane"></i></button>
            </div>
            <div class="msg"></div>
    
         </div>

        </form>
         
               
       @elseif($detail->status == 2)
         
    
      @else
         <div></div>
      @endif
          
   </div>
   @endforeach
</div>
</div>
@push('script')
{{-- <script type="text/javascript">

    $(document).ready(function(){
        // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var parrentId= $(".parrent-id").val();
        for (var i = 0; i < {{$key}}; i++) {
          console.log(i);
        
        $(".submit-rep").on('click',function(){
          console.log($(".reply").val());
            $.ajax({
                url: "http://localhost:8000/reply/store/"+parrentId+"",
                type: 'post',
                data: {                             
                  user_id:$(".user_id").val(),
                  post_id: $(".post_id").val(),
                  reply: $("#reply"+i+"").val(),
                //email:$(".email").val(),comment:$(".comment").val()
                },
                
                success: function (data) {
                   $('#comment-wrapper').load(document.URL +  ' #comment-wrapper');
                }
            });
        });
      }
    });
    
</script> --}}
@endpush