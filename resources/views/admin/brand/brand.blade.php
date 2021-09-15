@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="card">
                    <div class="mb-3">
                        <a href="{{ URL::to('/add-brand') }}" class="btn btn-primary">Thêm Mới <i class="fas fa-plus"></i></a>
                        {{-- <a href="#" id="del_multiple_records" class="btn btn-danger">Xóa sản phẩm được chọn</a> --}}
                    </div>
                    <div class="card-header">
                        <i class="fa fa-list"></i> Danh sách Thương Hiệu
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
                                                    <input type="checkbox" name="" id="master">
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Hình Ảnh: activate to sort column ascending"
                                                    >Tên Thương hiệu</th>
                                             
                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Trạng thái: activate to sort column ascending"
                                                    >Đường Dẫn</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Hành động: activate to sort column ascending"
                                                    style="width: 250px;">Hành động</th>
                                            </tr>
                                        </thead>
                                        @foreach($all_brand as $key => $brand)
                                        <tbody id="render_product">
                                                <td>   <input type="checkbox" name="" id="master"></td>
                                                <td>{{ $brand->brand_name }}</td>
                                                <td>{{ $brand->brand_slug }}</td>
                                                <td>
                                                    <a class="btn btn-primary" href = "{{ URL::to ('/edit-brand/'.$brand->brand_id) }}"> <i class="fa fa-edit"></i></i> Sửa</a>
                                                        <a class="btn btn-danger" onclick = "return confirm('bạn có muốn xóa danh mục này')" href = "{{ URL::to ('/delete-brand/'.$brand->brand_id) }}"> <i class="fa fa-trash"></i> Xóa</a>
                                                </td>
                                                
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
