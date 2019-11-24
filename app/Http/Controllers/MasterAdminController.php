<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Models\Post;
use App\Models\Category;
use App\Models\Users;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;



class MasterAdminController extends Controller
{
    public function index(Request $request)
    {
    	$data=[];
    	$user = new Users;
    	$post = new Post;
    	$user_name = $request->session()->get('user_name');
    	$user_id = $request->session()->get('id');
    	$data['user'] = $user->getInfoUser($user_name);
    	$data['post'] = $post->getall();

    	//.dd($data);
    	return view('admin.admin',$data);
    }
    public function approved($id,Request $request){
         DB::table('posts')->where('id', $id)->update(['status'=>1]);
        return redirect()->back();
    } 
    public function notapproved($id, Request $request){
         DB::table('posts')->where('id', $id)->update(['status'=>0]);
        return redirect()->back();
    }   
}
