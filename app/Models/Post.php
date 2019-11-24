<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    
   
    public function getDataPostForThumbnail()
    {
    	$data = DB::table('posts as p')
    		->select('p.id','p.title','p.slug','p.thumbnail','p.status','p.categories_id','p.publish_date','c.name as cate_name','u.name as author_name')
    		->join('categories as c','c.id','=','p.categories_id')
            ->join('users as u','u.id','p.user_id')
    		->where('p.status',1)->orWhere('p.status',2)      		
    		// ->limit(4)
    		->orderBy('p.publish_date','DESC')
    		->get(); 
    	$data = json_decode(json_encode($data),true) ;  		
    	return $data;
    }
    public function getLastestPost()
    {
        $data = DB::table('posts as p')
            ->select('p.id','p.title','p.slug','p.thumbnail','p.status','p.categories_id','p.publish_date','c.name','u.name')
            ->join('users as u','u.id','=','p.user_id')
            ->join('categories as c','c.id','=','p.categories_id')
            ->where('p.status',1)->orWhere('p.status',2)           
            ->limit(6)
            ->orderBy('p.publish_date','DESC')
            ->get();
            $data = json_decode(json_encode($data),true) ;          
        return $data; 
    }
    public function getPostInfoByAcc($username)
    {
        $data = DB::table('posts as p')
        ->select('p.id','p.title','p.slug','p.sapo','p.publish_date','p.status','p.thumbnail','u.name','u.id as user_id','u.user_name','c.name as cate_name','c.id as cate_id','c.slug as cate_slug')
        ->join('users as u','u.id','=','p.user_id')
        ->join('categories as c','p.categories_id','=','c.id')
        ->where('u.user_name',$username)
        ->orderBy('p.publish_date','DESC')
        ->get();
         $data = json_decode(json_encode($data),true) ;          
        return $data; 
    }
    
    public function getAllDataPost($id)
    {
        $data=DB::table('posts as p')
            ->join('content as c','c.post_id','=','p.id')
            ->select('*')
            ->where('p.id',$id)
            ->first();
        $data = json_decode(json_encode($data),true) ;          
        return $data; 
    }
    public function GetDetailPost($slug)
    {
        $data=DB::table('posts as p')
        ->select('p.id','p.title','p.categories_id','p.sapo','p.publish_date','p.thumbnail','p.slug','c.content','p.status','categories.name as cate_name','categories.slug as cate_slug','users.name','users.user_name')
        ->join('content as c','c.post_id','=','p.id')
        ->join('categories','categories.id','=','p.categories_id')
        ->join('users','users.id','=','p.user_id')
        ->where('p.slug',$slug)
        // ->where('p.status',1)
        ->first();
        
        return $data;
    }
    public function getDataTagsByPostsId($id)
    {
        $data =DB::table('tags as t')
        ->select('t.name as name_tag','t.id as tag_id','t.slug as slug_tag')
        ->join('post_tag as pt','pt.tag_id','=','t.id')
        ->where('pt.post_id',$id)
        ->get();
        $data = json_decode(json_encode($data),true);
        return $data;
    }
    public function getPostByCate($cateid)
    {
        $data = DB::table('posts as p')
            ->select('p.id as post_id','p.title','p.slug as post_slug','p.sapo','p.thumbnail','p.categories_id','p.publish_date','p.status','p.view_count','u.name as author','u.user_name','c.name as cate_name','c.slug as cate_slug')
            ->join('categories as c','c.id','=','p.categories_id')
            ->join('users as u','u.id','=','p.user_id')
            ->where('categories_id',$cateid)
            ->where('p.status',1)->orWhere('p.status',2)
            ->orderBy('p.publish_date','DESC')  
            ->limit(4)
            ->get();
            $data = json_decode(json_encode($data),true);
        return $data;
    }
    public function getAllPostByCate($cateid){
        $data = DB::table('posts as p')
            ->select('p.id as post_id','p.title','p.slug as post_slug','p.sapo','p.thumbnail','p.categories_id','p.publish_date','p.status','p.view_count','u.name as author','u.user_name','c.name as cate_name','c.slug as cate_slug')
            ->join('categories as c','c.id','=','p.categories_id')
            ->join('users as u','u.id','=','p.user_id')
            ->where('categories_id',$cateid)
            ->where('p.status',1)->orWhere('p.status',2)
            ->orderBy('p.publish_date','DESC')           
            ->get();
            $data = json_decode(json_encode($data),true);
        return $data;
    }
    public function allPostFOrCate($cateid)
    {
        $data = DB::table('posts as p')
            ->select('p.id as post_id','p.title','p.slug as post_slug','p.sapo','p.thumbnail','p.categories_id','p.publish_date','p.status','p.view_count','u.name as author','u.user_name','c.name as cate_name','c.slug as cate_slug')
            ->join('categories as c','c.id','=','p.categories_id')
            ->join('users as u','u.id','=','p.user_id')
            ->where('categories_id',$cateid)    
            ->where('p.status',1)->orWhere('p.status',2)          
            ->get();
            // $data = json_decode(json_encode($data),true);
        return $data;
    }
    public function getPostByTag($tagId)
    {
        $data = DB::table('posts as p')
            ->select('p.id as post_id','p.title','p.slug as post_slug','p.sapo','p.thumbnail','p.categories_id','p.publish_date','p.status','p.view_count','u.name as author')
             ->join('users as u','u.id','=','p.user_id')
            ->join('post_tag as pt','pt.post_id','=','p.id')
            ->where('p.status',1)->orWhere('p.status',2)  
            ->where('pt.tag_id',$tagId)->get();
              $data = json_decode(json_encode($data),true);
        return $data;
    }
    public function getall()
    {
         $data = DB::table('posts as p')
         ->select('p.status','p.title','p.id','p.slug','p.publish_date','u.name as author','u.email as author_email','c.name as cate_name')
         ->join('users as u','p.user_id','=','u.id')
         ->join('categories as c','c.id','=','p.categories_id')
         ->get();
          $data = json_decode(json_encode($data),true);
        return $data;
    }
    

}
