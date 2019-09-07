<?php

namespace App\Http\Controllers\Authen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    public function handleLogin(Request $request, Users $user)
	{
		
		$user = $request->username;
		$pass = $request->password;
		
		if ($user && $pass) {
			//xu ly dang nhap'
			$data = $this->getDataUser($user, $pass);
			// dd($data);
			if ($data) {
				//luu thong tin vao trong session
				//vao trang dashbroad
				$request->session()->put('user_name', $data['user_name']);
				$request->session()->put('name', $data['name']);
				//~~ $_SESSION['username'] = data['username']
				$request->session()->put('email', $data['email']);
				$request->session()->put('id', $data['id']);
				
				return redirect()->back();

			}else{
				//quay ve trang dang nhap

				return redirect()->back()->with('error_code', 5);
			}
		}else{
			return redirect()->back()->with('fatal', ['your message,here']); 
		}
	}
	public function logOut(Request $request)
	{
		//xoa het session va tro ve form login
		$request->session()->forget('user_name');
		$request->session()->forget('email');
		$request->session()->forget('name');
		$request->session()->forget('id');
		
		$name =str_replace(url('/'), '', url()->previous());
		//dd($name);
		if ($name=='profile') {
			
			return redirect()->route('view.home');


		} else {
			
			return redirect()->back();
		}
		
		
	}
	public function getDataUser($username,$password)
    {
    
     $result = [];
     $data = DB::table('users')->select('*')->where([
     	'user_name' =>$username,
     	'password' => $password,
     	'status' => 1,
     ])->first();
     if ($data) {
     	$result = json_decode(json_encode($data),true);
     	
     }
     return $result;

     }
    //
}
