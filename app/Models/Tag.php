<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    protected $table = 'tags';
   public function getAllTag()
    {
    	$result =  [];
    	$data = Tag::all();
    	if ($data) {
    		$result = $data->toArray();    		
    	}
    	return $result;
    }
     public function getPostByIDTag($id)
    {
       $data = DB::table('post_tag')->select('*')->where('post_tag.tag_id',$id)->first();
       $data = json_decode(json_encode($data),true);
        return $data;
    }
}
