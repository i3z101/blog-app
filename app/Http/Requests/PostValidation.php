<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostValidation extends FormRequest
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

    public function ruless($required)
    {
        return $required;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    public function rules($required=null)
    {
        return [
            'title' => $required!=null ? 'required|min:5|max:50|unique:posts,title|string': 'required|min:5|max:50|string',
            'body'  =>'required|min:3|max:200',
            'image' =>$required!=null ? 'required|mimes:png,jpg,jpeg|max:5048' : 'mimes:png,jpg,jpeg|max:5048'
        ];
    }
}
