@extends('admin.index')
@section('content')
    <div class="card">
        <div class="col-12">
            <div class="col-12 d-flex no-block align-items-center">

                <?php
                $Message = Session::get('message');
                if ($Message) {
                    $Message = Session::get('message');
                    if ($Message) {
                        echo ' <span class = "alert alert-success " style = font-size:18px"> ' . $Message . ' </span>';
                        Session::get('message', null);
                    }
                } else {
                    echo 'General Elements';
                }
                
                ?>

                <h4 class="page-title"></h4>
                <div class="ml-auto text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-xl-12">
                    <form action="{{ URL::to('update-product/'.$product->product_id) }}" method="POST" id="form_category_create" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="title_product" for="">Tên danh mục</label>
                                    <input type="text" value ="{{ $product->product_name }}" name="product_name" class="title_product form-control" id="">
                                </div>
                                @error('product_name')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="title_product" for="">Giá Sản Phẩm </label>
                                    <input type="text" value ="{{ $product->product_price }}" name="product_price" class=" title_product form-control" id="">
                                </div>
                                 @error('product_price')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="title_product" for="">Loại Sản Phẩm</label>
                                    <select name = "category_id" class="title_product form-control input-sm m-bot15">
                                    @foreach ($category as $key => $cate )
                                          <option  {{ $product->category_id == $cate->category_id ? 'selected' : '' }} value = "{{ $cate->category_id }}" > {{ $cate->category_name }}</option>
                                    @endforeach
                                    </select>
                                     @error('category_id')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                                <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="title_product" for="">Thương Hiệu</label>
                                    <select name = "brand_id" class="title_product form-control input-sm m-bot15">
                                    @foreach ($brand as $key => $bra )
                                          <option {{ $product->brand_id == $bra->brand_id ? 'selected' : '' }} value = "{{ $bra->brand_id }}"> {{ $bra->brand_name }}</option>
                                    @endforeach
                                    </select>
                                     @error('brand_id')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="title_product" for="">Giá khuyến Mãi </label>
                                    <input type="text" value ="{{ $product->product_sales }}" name="product_sales" class=" title_product form-control" id="">
                                </div>
                                @error('product_sales')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-6" id="add-image-file">
                                <div class="mb-3">
                                    <div class="preview hide" id="category_preview_image">
                                    </div>
                                    <label class="title_product" for="">Hình ảnh File</label>
                                    <div class="custom-file">
                                        <input type="file" name="product_images" class="custom-file-input" accept="image/*"
                                            onchange="readURL(this);" id="images" multiple="multiple">
                                        <label class="custom-file-label" for="images">Choose image</label>
                                    </div>
                                     <img width = "70px" src="{{ asset ('uploads/products/'.$product->product_images) }}"> 
                                </div>
                                @error('product_images')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class=" title_product ">Mô tả dài</label>
                                    <textarea name="product_content" class="form-control" id="ckeditor_content" cols="30"
                                        rows="10">{{ $product->product_content }}</textarea>
                                </div>
                                @error('product_content')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                @enderror
                            </div>
                              <div class="col-md-12">
                                <div class="mb-3">
                                    <label class=" title_product ">Mô tả ngắn</label>
                                    <textarea name="product_desc" class="form-control" id="ckeditor_desc" cols="30"
                                        rows="10">{{ $product->product_desc }}</textarea>
                                </div>
                                @error('product_desc')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary">Cập Nhập</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- end col -->


            </div>
        </div>
    </div>
@endsection
