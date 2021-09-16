<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateRequest extends FormRequest
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
            'brand_name' => 'required|max:225',
            'brand_slug' => 'required|max:225'
        ];
    }
    public function messages(){
        return [
            'brand_name.required' => 'Tên Thương Hiệu Sản Phẩm không được để trống',
            'brand_slug.required' => 'Tên Đường Dẫn Thương Hiệu Sản Phẩm không được để trống'          
        ];
    }
}
