<div class="modal-overlay" id="modal">
    <div class="modal-content" style="padding: 2rem 3rem;width:50%">
        <form action="{{route('admin.category.post')}}" method="POST">
            @csrf
            <h3 style="padding-bottom:1rem">Hãy đọc kĩ trước khi thực hiện</h3>
            <input type="text" autocomplete="off"  class="name-category el-input__inner"  readonly>
            <input type="hidden" autocomplete="off" name="id" class="id-category el-input__inner" readonly>
            <input type="hidden" autocomplete="off" name="type" value="delete" class="el-input__inner" readonly>
            <div class="description" style="
    text-align: left;
    padding-top: 1rem;
">
                <p>Bạn có chắc chắn muốn xóa danh mục này?</p>
                <p>Xóa danh mục sẽ xóa tất cả các post thuộc danh mục này và không thể khôi phụcphục !</p>
                <p>Hãy suy nghĩ thật kĩ trước khi thực hiện </p>
            </div>
            <button class="modal-close" type="submit" id="closeModalBtn">Thực hiện xóa</button>
        </form>

    </div>
</div>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card-header">
                            <h1 class="card-title">Danh mục</h1>
                        </div>
                        <div class="card-body">

                            <div id="page">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-3 text-right">
                                        <a href="{{route('admin.category.insert')}}" class="btn btn-success bt-add" style="margin-right: 0px;">Tạo mới</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                                            <div class="el-select" style="width: 100%;">
                                                <div class="el-input el-input--suffix"><!---->
                                                    <input type="text" readonly="readonly" autocomplete="off" placeholder="Chọn ngôn ngữ" class="el-input__inner"><!---->
                                                    <span class="el-input__suffix">
                                                        <span class="el-input__suffix-inner">
                                                            <i class="el-select__caret el-input__icon el-icon-arrow-up"></i><!----><!----><!----><!----><!---->
                                                        </span><!---->
                                                    </span><!----><!---->
                                                </div>
                                                <div class="el-select-dropdown el-popper" style="display: none; min-width: 194.8px;">
                                                    <div class="el-scrollbar" style="">
                                                        <div class="el-select-dropdown__wrap el-scrollbar__wrap" style="margin-bottom: -17px; margin-right: -17px;">
                                                            <ul class="el-scrollbar__view el-select-dropdown__list"><!---->
                                                                <li class="el-select-dropdown__item selected"><span>VI</span></li>
                                                                <li class="el-select-dropdown__item"><span>EN</span></li>
                                                            </ul>
                                                        </div>
                                                        <div class="el-scrollbar__bar is-horizontal">
                                                            <div class="el-scrollbar__thumb" style="transform: translateX(0%);"></div>
                                                        </div>
                                                        <div class="el-scrollbar__bar is-vertical">
                                                            <div class="el-scrollbar__thumb" style="transform: translateY(0%);"></div>
                                                        </div>
                                                    </div><!---->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                                            <div class="input-with-select el-input el-input-group el-input-group--append"><!---->
                                                <input type="text" autocomplete="off" placeholder="Nhập từ khoá" class="el-input__inner"><!----><!---->
                                                <div class="el-input-group__append">
                                                    <button type="button" class="el-button button-search el-button--default"><!----><i class="el-icon-search"></i><span>Tìm kiếm</span></button>
                                                </div><!---->
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <button type="button" class="el-button el-button--warning"><!----><!----><span>Sắp xếp</span></button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <form action="" id="pageForm" name="pageForm" method="POST" enctype="multipart/form-data">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr role="row">
                                                        <th>Tên</th>
                                                        <th>Hình ảnh</th>
                                                        <th>Lượt xem</th>
                                                        <th>Ngôn ngữ</th>
                                                        <th>Sắp xếp</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($categories_item))
                                                    @foreach($categories_item as $category)
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('admin.category.edit',["id"=>$category->id])}}">{{$category->name }}</a>
                                                            <br>
                                                            <code>
                                                                <a href="{{config('app.url')}}/client/post/'{{$category->slug}}" target="_blank"> {{config('app.url')}}/client/post/{{$category->slug}}</a>
                                                            </code>
                                                        </td>
                                                        <td><img src="{{$category->cover_image}}" width="100px"></td>
                                                        <td>0</td>
                                                        <td><a href="https://admin.hoidoanhnghiepquan1.com/category/edit/en/51487dea-04e0-46be-991f-3fa5564586ca">EN</a></td>
                                                        <td><input type="text" name="sorted[51487dea-04e0-46be-991f-3fa5564586ca]" value="0" style="width: 70px;"></td>
                                                        <td><button type="button" data-category-id="{{$category->id}}" data-category-name="{{$category->name}}" class="openModalBtn el-button el-button--danger is-circle"><!----><i class="el-icon-delete"></i><!----></button></td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <p>Không có danh mục nào.</p>
                                                    @endif
                                                </tbody>
                                            </table> <input type="hidden" name="_token" value="LPulHD1lXmKcYt5ekKdqX0tXQOGR1snYZcpCGhJ6">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="postAjax" value="https://admin.hoidoanhnghiepquan1.com/category/search/ajax">
                            <input type="hidden" id="removePostAjax" value="https://admin.hoidoanhnghiepquan1.com/category/remove/post/ajax">
                            <input type="hidden" id="sortedAjax" value="https://admin.hoidoanhnghiepquan1.com/category/sorted/ajax">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>