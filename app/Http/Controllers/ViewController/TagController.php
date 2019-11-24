<?php

namespace App\Http\Controllers\ViewController;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;
use App\Models\TAg;
use App\Models\Post;
class TagController extends MasterController
{
    public function index($id,$slug,Tag $tag)
    {
    	$post =new Tag;
    	$data['post']=$post->getPostByIDTag($id);
    	
    	//dd($data);
    	return view('core.content.tag.index',$data);

    }
}
