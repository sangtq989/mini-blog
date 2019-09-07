<?php

namespace App\Http\Controllers\ViewController;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Users;

class AuthorController extends MasterController
{
    public function index($user_name)

    {
    	//dd($user_name);
    	$post = new Post;
    	$user = new Users;
    	$data['post'] =$post->getPostInfoByAcc($user_name);
    	$data['author']=$user->getInfoUser($user_name);
    	//dd($data);
    	return view('core.content.author.index',$data);
    }
}
