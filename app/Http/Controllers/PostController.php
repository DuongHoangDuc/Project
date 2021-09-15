<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ValidatePostRequest;
session_start();

class PostController extends Controller
{
    public function post(){// view danh sách brand
        $all_post =  Post::all();
        $manager_post = view('admin.post.post')->with('all_post',$all_post);
        return view('admin.post.post')->with(compact('all_post'));
        dd($manager_post);
    }
    public function add_post(){// view Add brand
        $category = PostCategory::orderby('category_post_id')->get();
        return view('admin.post.add_post')->with(compact('category'));
    }
    public function save_post(Request $request, ValidatePostRequest $validate){// save category
        $data = $request->all();
        $post = new Post();
        $post->post_title = $data['post_title'];
        $post->category_post_id = $data['category_post_id'];
        $post->post_slug = $data['post_slug'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->post_keywords = $data['post_keywords'];
        $post->post_status = '0';
        $post->post_meta_desc = $data['post_meta_desc'];

        if($request->has('post_images')){
            $get_images = $request->file('post_images');

        
            $get_name_images = $get_images->getClientOriginalName();// lấy tên ảnh
            $name_image      = current(explode('.',$get_name_images));
            $new_image       = $name_image.rand(0,99).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('uploads/post',$new_image);
            $post->post_images = $new_image;
        }
        
        $post->save();

        Session::put('message','Thêm bài Viết  Thành Công');
        return Redirect('/post');
       
       
    }

    public function edit_post($post_id ){// view Add category
        $post = Post::find($post_id);
        $category = PostCategory::orderby('category_post_id')->get();
        return view('admin.post.edit_post')->with(compact('post'))->with(compact('category'));
    }

    public function update_post(Request $request,$post_id ){// update category
        $data = $request->all();
        $post =  Post::find($post_id);
        $post->post_title = $data['post_title'];
        $post->category_post_id = $data['category_post_id'];
        $post->post_slug = $data['post_slug'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->post_keywords = $data['post_keywords'];
        $post->post_status = '0';
        $post->post_meta_desc = $data['post_meta_desc'];

        $get_images = $request->file('post_images');

        if($get_images){
            // xoa anh cu
            $post_images_old = $post->post_images;
            $path = 'uploads/post/'.$post_images_old; 
            unlink($path);
            // cap nhap anh mới
            $get_name_images = $get_images->getClientOriginalName();// lấy tên ảnh
            $name_image      = current(explode('.',$get_name_images));
            $new_image       = $name_image.rand(0,99).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('uploads/post/',$new_image);
            $post->post_images = $new_image;
           
        }
        $post->save();
        Session::put('message','Cập Nhập Sản Phẩm Thành Công');
        return Redirect('/post');
       
    }

    public function delete_post($post_id){
        $post = Post::find($post_id);
        $post->delete();
        return Redirect('/post');
    }
}
