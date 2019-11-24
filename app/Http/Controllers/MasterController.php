<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Helper\Common\BuildCateTreeForDropDown;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class MasterController extends Controller
{
	public function __construct(Category $cate,Post $post,Tag $tag)
	{
		$data = [];
		$listCate= $cate->getAllCateForMenu();
		$cateContent=$post->getDataPostForThumbnail();
		$list=BuildCateTreeForDropDown::layoutTreeCategory($listCate);
		$availCate= $cate->getChildCate();


		foreach ($availCate as $key => $value) {
			$availCate[$key]['post'] = $post->getAllPostByCate($value['id']);
		}
		//dd

		$data['cate'] = $list;		
		$data['cateContent'] =$availCate;
		$data['isHome'] = Route::currentRouteName();
		$data['tag'] = $tag->getAllTag();
		$data['popular']= $post->getLastestPost();
		

    	 //dd($data);
		View::share('info',$data);
	}
}
