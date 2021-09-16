<?php

namespace App\Http\Requests\Product;

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
            'product_name' => 'required|max:225',
            'product_price' => 'required|max:225',
            'category_id' => 'required|max:225',
            'brand_id' => 'required|max:225',
            'product_content' => 'required|max:225',
            'product_sales' => 'required|max:225',
            'product_desc' => 'required|max:225'
            
        ];
    }
    public function messages(){
        return [
            'product_name.required' => 'Tên Sản Phẩm không được để trống',
            'product_price.required' => 'Giá Sản Phẩm không được để trống',
            'category_id.required' => 'Danh Mục Sản Phẩm không được để trống',
            'brand_id.required' => ' Thương Hiệu Sản Phẩm không được để trống',
            'product_sales.required' => ' Giá Khuyến Mãi không được để trống',
            'product_content.required' => ' Mô Tả Dài không được để trống',
            'product_desc.required' => 'Mô Tả Ngắn không được để trống'
            
        ];
    }
}
