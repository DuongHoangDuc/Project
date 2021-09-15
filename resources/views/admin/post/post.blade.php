@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
            
                <div class="card">
                    <div class="mb-3">
                    <a href="{{ URL::to ('/add-post') }}" class="btn btn-primary">Thêm Bài Viết</a>
                    <a href="#" id="del_multiple_records" class="btn btn-danger">Xóa sản phẩm được chọn</a>
                </div>

                    <div class="card-header">
                        <i class="fa fa-list"></i> Danh sách Bài Viết
                    </div>

                    <div class="card-body">
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="datatable_length"><label>Đang show <select
                                                name="datatable_length" aria-controls="datatable"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> mục</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="datatable_filter" class="dataTables_filter"><label>Tìm kiếm:<input
                                                type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="datatable"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered table-nowrap mb-0 dataTable no-footer"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable_info">
                                        <thead class="thead-light">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label=": activate to sort column descending" style="width: 13px;">
                                                    <input type="checkbox" name="" id="master"></th>
                                             
                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Tên Sản phẩm: activate to sort column ascending"
                                                    style="width: 368px;">Tên Sản phẩm</th>
                                                       <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Hình Ảnh: activate to sort column ascending"
                                                    style="width: 82px;">Hình Ảnh</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Giá sản phẩm: activate to sort column ascending"
                                                    style="width: 89px;">slug</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Trạng thái: activate to sort column ascending"
                                                    style="width: 93px;">Mô tả</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Trạng thái: activate to sort column ascending"
                                                    style="width: 93px;">Trạng thái</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Hành động: activate to sort column ascending"
                                                    style="width: 462px;">Hành động</th>
                                            </tr>
                                        </thead>
                                        @foreach ($all_post as $key => $post )
                                        <tbody id="render_product">
                                            <tr id="product_table_128" role="row" class="odd">
                                                <td class="sorting_1">
                                                <input type="checkbox" class="sub_chk" name="data_ids" data-id="128">
                                                </td>
                                               
                                                <td>{{ $post->post_title }}</td>
                                                 <td><img src="{{ asset ('uploads/post/'.$post->post_images) }}" width="100" height="100" alt="" style="border-radius: 1.8rem"></td>
                                                <td>{{ $post->post_slug }}</td>
                                                <td>{{ $post->post_keywords }} </td>
                                                <td class="text-success"><i class="fa fa-check-circle"></i> Đã kiểm
                                                    duyệt
                                                </td>
                                                
                                                <td>
                                                    <a href=""
                                                        class="btn btn-warning"> <i class="fa fa-image"></i> Thư viện
                                                        ảnh</a>
                                                    <a href=""
                                                        class="btn btn-success"> <i class="fa fa-cog"></i> Thuộc tính
                                                        khác</a>
                                                    <a  href = "{{ URL::to ('/edit-post/'.$post->post_id) }}"  
                                                    class="btn btn-primary"><i class="fa fa-edit"></i>sửa</a>
                                                    <a  href = "{{ URL::to ('/delete-post/'.$post->post_id) }}"  
                                                    onclick = "return confirm('bạn có muốn xóa Sản Phẩm này')" class="btn btn-danger"><i class="fa fa-trash"></i>Xóa</a>
                                                </td>
                                            </tr>
                                       
                                        </tbody>
                                         @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Đang
                                        show 1 → 10 → 20 mục</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="datatable_previous"><a href="#" aria-controls="datatable"
                                                    data-dt-idx="0" tabindex="0" class="page-link">Trước</a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                    aria-controls="datatable" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="datatable"
                                                    data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                            <li class="paginate_button page-item next" id="datatable_next"><a href="#"
                                                    aria-controls="datatable" data-dt-idx="3" tabindex="0"
                                                    class="page-link">Kế tiếp</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
