<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
	// protected $table = 'categories';
	public function getAllCateForMenu()
	{
		$result =[];
		$data = Category::all();
		if($data){
			$result = $data->toArray();

		}
		return $result;
	}
	public function getMegaCate()
	{
		$data = DB::table('categories as c')
		->select('*')		
		->where('c.parrent_id','=', 0)		
		->get();
		$data = json_decode(json_encode($data),true) ;  
		return $data;
	}
	public function getChildCate()
	{
		$data = DB::table('categories as c')
		->select('*')		
		->where('c.parrent_id','!=', 0)		
		->get();
		$data = json_decode(json_encode($data),true) ;  
		return $data;
	}
}
