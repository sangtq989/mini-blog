<?php

namespace App\Http\Controllers\AccountController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;

class ProfileController extends Controller
{
   public function handle(Request $request)
   {
      $user = new Users;
   		$username = session('user_name');
   		//$all = $request->all();
      //$input = array_filter($request->except('_token'));

   		
         if ($request->hasFile('avatar')) {
            //kiem tra xem file co bi loi ko
            if ($request->file('avatar')->isValid()) {
                //thuc hien upload
                $file = $request->file('avatar');
                $nameFile=$file->getClientOriginalName();
                if ($nameFile) {
                    # code...
                   $upload = $file->move('upload/UserAvatar',$nameFile);
                }
            }
           
         
        }else{
           $nameFile = null;
        }
       $data =[
          'avatar'=>$nameFile,
          'name'=>$request->name,
          'bio'=>$request->bio,
          'updated_at'=>date('Y-m-d')
       ];
        $input = array_filter($data);
      
      //dd($input);

      $user->updateInfo($input,$username);

      return redirect()->back();
   		
   }

}
