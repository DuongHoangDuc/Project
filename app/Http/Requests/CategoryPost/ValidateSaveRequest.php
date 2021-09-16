<?php

namespace App\Http\Requests\CategoryPost;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSaveRequest extends FormRequest
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
            'category_post_name' => 'required|max:225',
            'category_post_slug' => 'required|max:225',
            'category_post_desc' => 'required|max:225'
            
        ];
    }
    public function messages(){
        return [
            'category_post_name.required' => 'Tên Danh Mục Bài Viết không được để trống',
            'category_post_slug.required' => 'Tên Đường Dẫn Bài Viết không được để trống',
            'category_post_desc.required' => 'Tên Mô tả Danh Mục Bài Viết không được để trống'
            
        ];
    }
}
