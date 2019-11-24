<?php

namespace App\Http\Controllers\ViewController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Users;

class CommentController extends Controller
{

	public function store(Request $request)
	{
		$comment = new Comment;
		$user = new Users;
      	// dd($request->all());
		$data=[
			'post_id' => $request->post_id ,
			'user_id' => $request->user_id,
			'parent_id' => 0,
			'vote' =>0,
			'body' => $request->comment,
			'created_at' => date('Y-m-d'),
		];

		$comment->storeComment($data);



		return redirect()->to(url()->previous() . '#section1');
	}
	public function ReplyStore($commentId,Request $request)
	{
		$comment = new Comment;
		$user = new Users;
		//dd($commentId);
		//dd($request->all());
		$data=[
			'post_id' => $request->post_id ,
			'user_id' => $request->user_id,
			'parent_id' => $commentId,
			'vote' =>0,
			'body' => $request->reply,
			'created_at' => date('Y-m-d'),
		];

		$comment->storeReply($data);
		
		return redirect()->to(url()->previous() . '#section1');
	}
}
