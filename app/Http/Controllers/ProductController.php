<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\product;
use App\Models\brand;
use App\Models\category;
session_start();

class ProductController extends Controller
{
    public function product(){// view danh sách brand
        $all_product =  product::all();
        $manager_product = view('admin.product.product')->with('all_product',$all_product);
        return view('admin.product.product')->with(compact('all_product'));
        // dd('adsadsa')
    }
    public function add_product(){// view Add brand
        $brand = brand::orderby('brand_id')->get();
        $category = category::orderby('category_id')->get();
        return view('admin.product.add_product')->with(compact('brand'))->with(compact('category'));
    }
    public function save_product(Request $request){// save category
        $data = $request->all();
        $product = new product();
        $product->product_name = $data['product_name'];
        $product->product_price = $data['product_price'];
        $product->category_id = $data['category_id'];
        $product->brand_id = $data['brand_id'];
        $product->product_sales = $data['product_sales'];
        $product->product_content = $data['product_content'];
        $product->product_desc = $data['product_desc'];
        $product->product_status = '0';
        $product->product_hot = '0';
        $get_images = $request->file('product_images');

        if($get_images){
            $get_name_images = $get_images->getClientOriginalName();// lấy tên ảnh
            $name_image      = current(explode('.',$get_name_images));
            $new_image       = $name_image.rand(0,99).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('uploads/products',$new_image);
            $product->product_images = $new_image;
            $product->save();

            Session::put('message','Thêm Sản Phẩm Thành Công');
            return Redirect('/product');
        }else{
            Session::put('message','Phải Sản Phẩm Thành Công');
            return Redirect('/product');
        }
       
    }

    public function edit_product($product_id ){// view Add category
        $product = product::find($product_id);
        $brand = brand::orderby('brand_id')->get();
        $category = category::orderby('category_id')->get();
        return view('admin.product.edit_product')->with(compact('product'))->with(compact('brand'))->with(compact('category'));
    }

    public function update_product(Request $request,$product_id ){// update category
        $data = $request->all();
        $product =  product::find($product_id);
        $product->product_name = $data['product_name'];
        $product->product_price = $data['product_price'];
        $product->category_id = $data['category_id'];
        $product->brand_id = $data['brand_id'];
        $product->product_sales = $data['product_sales'];
        $product->product_content = $data['product_content'];
        $product->product_desc = $data['product_desc'];
        $product->product_status = '0';
        $product->product_hot = '0';

        $get_images = $request->file('product_images');

        if($get_images){
            // xoa anh cu
            $product_images_old = $product->product_images;
            $path = 'uploads/products/'.$product_images_old; 
            unlink($path);
            // cap nhap anh mới
            $get_name_images = $get_images->getClientOriginalName();// lấy tên ảnh
            $name_image      = current(explode('.',$get_name_images));
            $new_image       = $name_image.rand(0,99).'.'.$get_images->getClientOriginalExtension();
            $get_images->move('uploads/products/',$new_image);
            $product->product_images = $new_image;
           
        }
        $product->save();
        Session::put('message','Cập Nhập Sản Phẩm Thành Công');
        return Redirect('/product');
       
    }

    public function delete_product($product_id){
        $product = product::find($product_id);
        $product->delete();
        return Redirect('/product');
    }
}
