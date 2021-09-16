<?php

namespace App\Http\Controllers;

use Session;
use App\Models\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Brand\ValidateSaveRequest;
use App\Http\Requests\Brand\ValidateUpdateRequest;
session_start();


class BrandProduct extends Controller
{
    public function brand(){// view danh sách brand
        $all_brand =  brand::all();
        $manager_brand = view('admin.brand.brand')->with('all_brand',$all_brand);
        return view('admin.index')->with('admin.brand.brand',$manager_brand);
        // dd('adsadsa');
    }
    public function add_brand(){// view Add brand
        return view('admin.brand.add_brand');
    }
    public function save_brand(Request $request ,ValidateSaveRequest $validate){// save brand
        $data = $request->all();
        $brand = new brand();
        $brand->brand_name = $data['brand_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->save();

        Session::put('message','Thêm Thương hiệu Thành Công');
        return Redirect('/brand');
    }
       
    public function edit_brand($brand_id ){// view Add brand
        $brand = brand::find($brand_id);
        return view('admin.brand.edit_brand')->with(compact('brand'));
    }

    public function update_brand(Request $request,$brand_id ,ValidateUpdateRequest $validate){// update brand

        $data = $request->all();
        $brand =  brand::find($brand_id);
        $brand->brand_name = $data['brand_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->update();
        Session::put('message','Cập Nhập Thương Hiệu Thành Công');
        return Redirect('/brand');
       
    }

    public function delete_brand($brand_id){
        $brand = Brand::find($brand_id);
        $brand->delete();
        Session::put('message','Xóa Danh Mục Sản Phẩm Thành Công');
        return Redirect()->back();
    }
}
