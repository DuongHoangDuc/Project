<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryProduct\ValidateSaveRequest;
use App\Http\Requests\CategoryProduct\ValidateUpdateRequest;

session_start();

class CategoryProduct extends Controller
{
    public function category(){// view danh sách category
        $all_category =  Category::all();
        $manager_category = view('admin.category.category')->with('all_category',$all_category);
        return view('admin.index')->with('admin.category.category',$manager_category);
        // dd('adsadsa');
    }
    public function add_category(){// view Add category
        return view('admin.category.add_category');
    }
    public function save_category(Request $request, ValidateSaveRequest $validate){// save category
        $data = $request->all();
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->category_status = '0';
        $get_images = $request->file('category_images');

        if($get_images){
            $get_name_images = $get_images->getClientOriginalName();// lấy tên ảnh
            $name_image      = current(explode('.',$get_name_images));
            $new_image       = $name_image.rand(0,99).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('uploads/category',$new_image);
            $category->category_images = $new_image;
            $category->save();

            Session::put('message','Thêm Danh Mục Thành Công');
            return Redirect('/category');
        }else{
            Session::put('message','Phải Thêm Ảnh Thành Công');
            return Redirect('/category');
        }
       
    }

    public function edit_category($category_id ){// view Add category
        $category = Category::find($category_id);
        return view('admin.category.edit_category')->with(compact('category'));
    }

    public function update_category(Request $request,$category_id,ValidateUpdateRequest $validate ){// update category

        $data = $request->all();
        $category =  Category::find($category_id);
        $category->category_name = $data['category_name'];
        $category->category_status = '0';
        $get_images = $request->file('category_images');

        if($get_images){
            // xoa anh cu
            $category_images_old = $category->category_images;
            $path = 'uploads/category/'.$category_images_old; 
            unlink($path);
            // cap nhap anh mới
            $get_name_images = $get_images->getClientOriginalName();// lấy tên ảnh
            $name_image      = current(explode('.',$get_name_images));
            $new_image       = $name_image.rand(0,99).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('uploads/category/',$new_image);
            $category->category_images = $new_image;
           
        }
        $category->save();
        Session::put('message','Cập Nhập Danh Mục Thành Công');
        return Redirect('/category');
       
    }

    public function delete_category($category_id){
        $category = Category::find($category_id);
        $category_images = $category->category_images;
        $path = 'uploads/category/'.$category_images;
        if( $category_images  ){
            unlink($path);
        }

        $category->delete();
        
        Session::put('message','Xóa Danh Mục Sản Phẩm Thành Công');
        return Redirect()->back();
    }

    public function active_category(Request $request,$category_id ){
        $data = $request->all();
        $category =  Category::find($category_id);

        $category->category_status = '1';
        $category->update();
        return Redirect('/category');
    }
    public function unactive_category(Request $request,$category_id ){
        $data = $request->all();
        $category =  Category::find($category_id);

        $category->category_status = '0';
        $category->update();
        return Redirect('/category');
    }

}
