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
                    <form action="{{ URL::to('save-post') }}" method="POST" id="form_category_create"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                   
                                    <label class="title_product" for="">Tên bài Viết</label>
                                    <input type="text" name="post_title" class="title_product form-control" id="">
                                    @error('post_title')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                
                                    <label class="title_product" for="">slug </label>
                                    <input type="text" name="post_slug" class=" title_product form-control" id="">
                                    @error('post_slug')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                                <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="title_product" for="">Danh Mục bài Viết</label>
                                    <select name = "category_post_id" class="title_product form-control input-sm m-bot15">
                                    <option> -->>chọn Thương Hiệu<<-- </option>
                                    @foreach ($category as $key => $cate )
                                          <option value = "{{ $cate->category_post_id }}"> {{ $cate->category_post_name }}</option>
                                    @endforeach
                                    </select>
                                    @error('category_post_id')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" id="add-image-file">
                                <div class="mb-3">
                                    <div class="preview hide" id="category_preview_image">
                                    </div>
                                    <label class="post_images" for="">Hình ảnh File</label>
                                    <div class="custom-file">
                                        <input type="file" name="post_images" class="custom-file-input" accept="image/*"
                                            onchange="readURL(this);" id="images" multiple="multiple">
                                        <label class="custom-file-label" for="images">Choose image</label>
                                    </div>
                                    @error('post_images')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class=" title_product ">Nội dung Bài Viết</label>
                                    <textarea name="post_content" class="form-control" id="ckeditor_content" cols="30"
                                        rows="10"></textarea>
                                </div>
                                 @error('post_content')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                @enderror
                            </div>
                              <div class="col-md-12">
                                <div class="mb-3">
                                    <label class=" title_product ">Tóm Tắt Bài Viết</label>
                                    <textarea name="post_desc" class="form-control" id="ckeditor_desc" cols="30"
                                        rows="10"></textarea>
                                </div>
                                 @error('post_desc')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                @enderror
                            </div>
                               <div class="col-md-12">
                                <div class="mb-3">
                                    <label class=" title_product ">Meta Từ Khóa</label>
                                    <textarea name="post_keywords" class="form-control" id="ckeditor_keywords" cols="30"
                                        rows="10"></textarea>
                                </div>
                                @error('post_keywords')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                @enderror
                            </div>
                                 <div class="col-md-12">
                                <div class="mb-3">
                                    <label class=" title_product ">Meta nộ dung</label>
                                    <textarea name="post_meta_desc" class="form-control" id="ckeditor_meta" cols="30"
                                        rows="10"></textarea>
                                </div>
                                @error('post_meta_desc')
                                        <span class="erorr text-danger" > {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
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
