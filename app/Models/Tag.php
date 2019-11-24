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
       $data = DB::table('post_tag as pt')
       ->select('p.slug as post_slug','p.id as post_id','p.thumbnail','p.title','u.name as author','p.publish_date','p.sapo')
       ->join("posts as p","p.id",'=','pt.post_id')
       ->join('users as u','u.id','=','p.user_id')
       ->where('pt.tag_id',$id)->get();
       $data = json_decode(json_encode($data),true);
        return $data;
    }
}
