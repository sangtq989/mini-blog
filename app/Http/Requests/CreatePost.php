<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


use Illuminate\Validation\Rule;

class CreatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

 public function rules()
    {
        return [

            'titlePost' => 'required|max:100',
            'sapoPost'=>'required|max:500',
            'thumbnail'=>'required|mimes:jpeg,bmp,png,jpg,gif',
            'language'=>'required|numeric',
            'categories'=>'required|numeric',
            'contentPost'=>'required',

            //
        ];
    }
    //message error
    public function messages()
    {
       return [

            'titlePost.required'=>':attribute khong duoc trong',
            'titlePost.max' => ':attribute khong lon hon :max ki tu',
            'sapoPost.required' => ':attribute khong duoc trong',
            'sapoPost.max' => ':attribute khong lon hon :max ki tu',
            'thumbnail.required' => 'moi chon anh',
            'thumbnail.mimes' => ' anh chi ho tro jpeg,bmp,png,jpg,gif, anh cua ban la dinh dang :mimes ',
            'language.required' => ':attribute khong duoc trong',
            'language.numeric' => 'Vui long chon ngon ngu',
            'categories.required' => ':attribute khong duoc trong',
            'categories.numeric' => 'categories khong dung',
            'contentPost.required'=>':attribute khong duoc trong',
            
       ];
    }
    //  public function withValidator($validator)
    // {
    //     $req = new Request;
    //     if ( $validator->fails() ) {
    //         $validator->errors();
    //         dd($req->all());
            
          
    //     }
    //     else{

    //     }
    // }
}
