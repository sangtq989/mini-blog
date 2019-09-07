<?php

namespace App\Http\Controllers\Authen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Register;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
    	return view('core.content.account.sign-up');
    }
    public function store(Register $request)
    {

    	$data = $request->except(['_token','repeat-password']);
    	
    	//dd($data);
    	DB::table('users')->insert($data);
    	
    	return redirect()->route('view.home');
    }
}
