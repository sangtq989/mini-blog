<?php

namespace App\Http\Controllers\ViewController;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;
use App\Models\Post;
use App\Models\Category;
use App\Models\Users;
use App\Models\Comment;


class DetailController extends MasterController
{
	public function index ($slug,$id,Post $post,Request $request)
	{
		$user = new Users;
		$comment=new Comment;
		$data['tag'] = $post->getDataTagsByPostsId($id);
		$data['detail']=$post->GetDetailPost($slug);
		$postid=$data['detail']->id;

		$a =  $request->session()->get('user_name');
		//dd($a);
		//dd(gettype($user));
		 $data['userdata'] = $user->getInfoUser($a);
		 $comment1 =  $comment->getParentComment($postid);
		
		 foreach ($comment1 as $key => $value) {
		 	$id =$value['id'];
		 	$comment1[$key]['reply'] = $comment->getReplyComment($id);
		 }
		  $data['comment'] = $comment1;
		//dd($data);

   

	
    return view('core.content.home.detail',$data);
    # code...
	}



}

