<?php

namespace App\Http\Controllers\ViewController;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;
use App\Helper\Common\BuildCateTreeForDropDown;
use App\Models\Category;
use App\Models\Post;


class CategoryController extends MasterController
{
  public function index(Request $request,$id,$slug)
  {

  		$post = new Post;
  		$posts=$post->allPostFOrCate($id);
  		$mainData = json_decode(json_encode($posts),true);
  		$data['paginate'] = $posts;
  		$data['posts'] = $mainData ;
  		//dd($data);

  	 return view('core.content.category.index',$data);
  }
}
