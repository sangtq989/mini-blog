<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            
            'user_name' => 'required|unique:users,user_name,'.$this->id,
            'email' => 'required|unique:users,email,'.$this->id,
            
            'password'=>'required|min:8',
           
        ];
    }
     public function messages()
    {
       return [

            'name.required'=>'Please enter your name',
            'name.max' => 'Your name only has 100 character',
            'email.required' => 'Please enter your email',
            'email.max' => 'You email is too long',
            'email.email' => 'Invalid email',

            'user_name.required' => 'Please enter your username, your username is use to login to our site',
            'user_name.min' => 'Your username must atleast has 8 character',
            'user_name.max' => 'Your username is too long',
            'password.required' => 'Your password must atleast has 8 character',
           
       ];
    }
}
