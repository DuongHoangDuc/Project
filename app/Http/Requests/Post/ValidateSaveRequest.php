<?php

namespace App\Http\Requests\Post;

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
            'post_title' => 'required|max:225',
            'post_slug' => 'required|max:225',
            'category_post_id' => 'required|max:225',
            'post_images' => 'required',
            'post_content' => 'required|max:225',
            'post_desc' => 'required|max:225',
            'post_keywords' => 'required|max:225',
            'post_meta_desc' => 'required|max:225'            
        ];
    }
    public function messages(){
        return [
            'post_title.required' => 'Tên Bài Viết không được để trống',
            'post_slug.required' => 'Tên Đường Dẫn không được để trống',
            'category_post_id.required' => 'Danh Mục Viết không được để trống',
            'post_images.required' => 'Hình Ảnh  không được để trống',
            'post_content.required' => ' Mô Tả Dài không được để trống',
            'post_desc.required' => ' Mô Tả ngắn không được để trống',
            'post_keywords.required' => 'từ khóa Bài Viết không được để trống',
            'post_meta_desc.required' => 'Thể mô tả Bài Viết không được để trống'
            
        ];
    }
}
