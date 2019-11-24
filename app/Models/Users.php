<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Users extends Model
{
	protected $table = 'users';
    public function getDataUser($username,$password)
    {
    	
       $result = [];
       $data = Users::select('*')->where([
          'user_name' =>$usename,
          'password' => $password,
          'status' => 1,
      ])->first();
       if ($data) {
          $result = json_decode(json_encode($data),true);
      }
      return $result;

  }
  public function getInfoUser($username)
  {
     $result = [];
     $data = DB::table('users')->select('id','user_name','email','avatar','name','bio','role')->where([
        'user_name' =>$username,
        'status' => 1,
    ])->first();

     $result = json_decode(json_encode($data),true);

     return $result;
 }
 
 public function updateInfo($data,$username)
 {
     DB::table('users')
     ->where('user_name', $username)
     ->update($data);
 }
 public function getUserFromID($id)
 {
    $result = [];
    $data = Users::select('user_name','email','avatar','name','bio','role')->where([
        'id' =>$id,
        'status' => 1,
    ])->first();
    if ($data) {
        $result = json_decode(json_encode($data),true);
    }
    return $result;
}
  // public function getUser($user_name,$email)
  // {
  //   $data = Users::select('user_name','email','avatar','name','bio','role')
  //   ->where('user_name' =>$user_name)->orWhere('email')->first();
  //   $result = json_decode(json_encode($data),true);
  // }
}
