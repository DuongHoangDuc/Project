@extends('admin.index')
@section('content')
    <div class="card">
        <div class="col-12">
            <div class="col-12 d-flex no-block align-items-center">

                <?php 
                            $Message = Session::get('message');
                            if($Message){
                            $Message = Session::get('message');
                            if($Message){
                            echo ' <span class = "alert alert-success " style = font-size:18px"> '.$Message.' </span>';
                             Session::get('message',null);
                              }
                             }else{
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
                    <form action="{{ URL::to('/save-category-post') }}" method="POST" id="form_category_create"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class=" title_product " for="">Tên Danh Mục bài Viết</label>
                                    <input type="text" name="category_post_name" class="form-control" id="">
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label  class=" title_product " for="">đường dẫn</label>
                                    <input type="text" name="category_post_slug" class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class=" title_product ">Mô tả dài Danh Mục Bài Viết</label>
                                    <textarea name="category_post_desc" class="form-control" id="long_des" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary">Thêm Mới</button>
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