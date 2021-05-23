<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
        // Validating inputs
        return [
            'title' => 'required|max:255|unique:posts,title',
            'created_by' => 'required|max:255',
            'st_email' => 'required|max:255',
            'image' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        // Printing out the error message
        return [
            'title.required' => 'Please enter post title.',
            'created_by.required' => 'Please enter post created by.',
            'st_email.required' => 'Please enter email',
            'image.required' => 'Post picture is required',
            'title.unique' => 'The post has already been taken.',
            'description.required' => 'Please enter post description.'
        ];
    }
}
