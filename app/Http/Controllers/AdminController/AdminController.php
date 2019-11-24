<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MasterAdminController;
use App\Models\Post;
use App\Models\Category;
use App\Models\Users;
use App\Models\Comment;

class AdminController extends MasterAdminController
{
    public function index(Request $request)
    {
    	// $user = new Users;
    	// $user_name = $request->session()->get('user_name');
    	// $user_id = $request->session()->get('id');
    	// $data = $user->getInfoUser($user_name);

    	// //dd($data);
    	return view("admin.admin");
    }
}
