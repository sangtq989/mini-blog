<?php

namespace App\Http\Controllers\ViewController;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Users;


class HomeController extends MasterController
{
 public function index(Post $post,Category $cate)
 {
    $lastestPost = $post->getLastestPost();
    $megaCate = $cate->getMegaCate();
    $availableCate= $cate->getChildCate();
    //$postOfCate = 
    
    foreach ($availableCate as $key => $value) {      
       
       $availableCate[$key]['post'] = $post->getPostByCate($value['id']);
    }
    //dd($availableCate);
   		// foreach ($mostPostIncate as $key => $value) {
   		// 	$value->name->count();
   		// }

		//dd($mostPostIncate);
    $data['lastestPost'] = $lastestPost;
    $data['megaCate'] = $megaCate;
    $data['feature'] = $post->getDataPostForThumbnail();
    $data['homeContent'] =$availableCate;
   		//dd($data);


    return view('core.content.home.index',$data);
 }
}
