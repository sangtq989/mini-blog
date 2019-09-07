<!-- comments container -->
<div class="comment_block">
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
   <div class="container">
      {{-- mega comment --}}
      @foreach($comment as $item)
      <div class="row pb-4 pt-4">
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
      <div class="row border-bot reply p-t-10 w-100">
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
      <form class="width-90" action="{{ route('com.rep',['commentId'=>$item['id']]) }}" method="post">
         @csrf
         <div class="create_new_comment row reply d-inline-flex m-l-60">
            <div class="reply_avatar">
               <img src="{{ URL::to('/') }}/upload/UserAvatar/{{ $userdata['avatar'] }}" class="img img-rounded img-fluid"/>
            </div>
            
            <div class="input_comment d-inline-flex">
               <input type="hidden" name="post_id" value="{{ $detail->id }}">

               <input type="hidden" name="user_id" value="{{ $userdata['id'] }}">
               
               <input type="text" name="reply" placeholder="Reply the comment!!">
               <a class="m-auto over-ride" type="submit" href=""><i class="fas fa-paper-plane"></i></a>
            </div>

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