<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
     public function user()
    {
        return $this->belongsTo(Users::class);
    }
    public function getParentComment($postid)
    {
    	$data=DB::table('comments as c')
    	->select('c.id','c.post_id','c.user_id','c.parent_id','c.vote','c.body','u.user_name','u.name as author','u.avatar')
    	->join('users as u','u.id','=','c.user_id')
    	->where('parent_id',0)->where('post_id',$postid)
    	->get();

    	$data = json_decode(json_encode($data),true) ;  		
    	return $data;
    }
    public function getReplyComment($id)
    {
    	$data=DB::table('comments as c')
    	->select('c.post_id','c.user_id','c.parent_id','c.vote','c.body','u.user_name','u.name as author','u.avatar')
    	->join('users as u','u.id','=','c.user_id')
    	->where('parent_id',$id)
    	->get();
    	$data = json_decode(json_encode($data),true) ;  		
    	return $data;
    }
    public function storeComment($data)
    {
    	DB::table('comments')->insert($data);
    }
    public function storeReply($data)
    {
    	DB::table('comments')->insert($data);
    }
}
