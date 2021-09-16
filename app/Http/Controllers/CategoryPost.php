<?php

namespace App\Http\Controllers;

use Session;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryPost\ValidateSaveRequest;
use App\Http\Requests\CategoryPost\validateUpdateRequest;
session_start();

class CategoryPost extends Controller

{
    public function category_post(){// view danh sách brand
        $all_category_post =  PostCategory::all();
        $manager_category_post = view('admin.category-post.category_post')->with('all_category_post',$all_category_post);
        return view('admin.index')->with('admin.category-post.category_post',$manager_category_post);
        // dd('adsadsa');
    }
    public function add_category(){// view Add brand
        return view('admin.category-post.add_category');
    }
    public function save_category(Request $request, ValidateSaveRequest $validate){// save brand
        $data = $request->all();
        $category = new PostCategory();
        $category->category_post_name = $data['category_post_name'];
        $category->category_post_slug = $data['category_post_slug'];
        $category->category_post_desc = $data['category_post_desc'];
        $category->category_post_status = '0';
        $category->save();

        Session::put('message','Thêm Danh Mục bài Viết Thành Công');
        return Redirect('/category-post');
    }
       
    public function edit_category($category_id ){// view Add brand
        $category = PostCategory::find($category_id);
        return view('admin.category-post.edit_category')->with(compact('category'));
    }

    public function update_category(Request $request,$category_id,validateUpdateRequest $validate ){// update brand

        $data = $request->all();
        $category =  PostCategory::find($category_id);
        $category->category_post_name = $data['category_post_name'];
        $category->category_post_slug = $data['category_post_slug'];
        $category->category_post_desc = $data['category_post_desc'];
        $category->category_post_status = '0';
        $category->update();
        Session::put('message','Cập Nhập Danh Mục Bài Viêt Thành Công');
        return Redirect()->back();
       
    }

    public function delete_category($category_id){
        $category = PostCategory::find($category_id);
        $category->delete();
        Session::put('message','Xóa Danh Mục Bài Viết Thành Công');
        return Redirect()->back();
    }
}
