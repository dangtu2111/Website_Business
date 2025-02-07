<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Vị trí</h1>
                        </div>
                        <div class="card-body">
                            <div id="page">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-3 text-right"><a href="https://admin.hoidoanhnghiepquan1.com/display/detail" class="btn btn-success bt-add" style="margin-right: 0px;">Tạo vị trí mới</a></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="el-select" style="width: 100%;"><!---->
                                                    <div class="el-input el-input--suffix"><!----><input type="text" readonly="readonly" autocomplete="off" placeholder="Chọn ngôn ngữ" class="el-input__inner"><!----><span class="el-input__suffix"><span class="el-input__suffix-inner"><i class="el-select__caret el-input__icon el-icon-arrow-up"></i><!----><!----><!----><!----><!----></span><!----></span><!----><!----></div>
                                                    <div class="el-select-dropdown el-popper" style="display: none; min-width: 195.85px;">
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
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-with-select el-input el-input-group el-input-group--append"><!----><input type="text" autocomplete="off" placeholder="Nhập từ khoá" class="el-input__inner"><!----><!---->
                                                    <div class="el-input-group__append"><button type="button" class="el-button button-search el-button--default"><!----><i class="el-icon-search"></i><span>Tìm kiếm
                                                            </span></button></div><!---->
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12"><button type="button" class="el-button el-button--warning"><!----><!----><span>Sắp xếp</span></button></div>
                                        </div>
                                        <form action="" id="pageForm" name="pageForm" method="POST" enctype="multipart/form-data">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Trang</th>
                                                        <th>Tên</th>
                                                        <th>Link</th>
                                                        <th>Trạng thái</th>
                                                        <th width="110px" class="sorting">Sắp xếp</th>
                                                        <th width="70px"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            trang1[vi]<br> <span style="color: red;">Trang chủ</span></td>
                                                        <td><a href="https://admin.hoidoanhnghiepquan1.com/display/detail?id=a9195cd9-3ac5-428b-824e-9bcf43199198">
                                                                Trang chủ
                                                            </a></td>
                                                        <td>{{route('admin.home')}}</td>
                                                       
                                                        <td>Bật</td>
                                                        <td><input type="text" name="sorted[a9195cd9-3ac5-428b-824e-9bcf43199198]" value="1" style="width: 70px;"></td>
                                                        <td class="text-center"><a class="el-link el-link--default"><!----><span class="el-link--inner">Xoá</span><!----></a></td>
                                                        <td class="text-center"><a class="el-link el-link--default"><!----><span class="el-link--inner">Sao chép</span><!----></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            trang1[vi]<br> <span style="color: red;">Trang chủ</span></td>
                                                        <td><a href="https://admin.hoidoanhnghiepquan1.com/display/detail?id=a9195cd9-3ac5-428b-824e-9bcf43199198">
                                                        Hội Doanh Nghiệp Quận 1
                                                            </a></td>
                                                        <td>{{route('admin.home')}}</td>
                                                       
                                                        <td>Bật</td>
                                                        <td><input type="text" name="sorted[a9195cd9-3ac5-428b-824e-9bcf43199198]" value="1" style="width: 70px;"></td>
                                                        <td class="text-center"><a class="el-link el-link--default"><!----><span class="el-link--inner">Xoá</span><!----></a></td>
                                                        <td class="text-center"><a class="el-link el-link--default"><!----><span class="el-link--inner">Sao chép</span><!----></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            trang1[vi]<br> <span style="color: red;">Trang chủ</span></td>
                                                        <td><a href="https://admin.hoidoanhnghiepquan1.com/display/detail?id=a9195cd9-3ac5-428b-824e-9bcf43199198">
                                                        CÂU CHUYỆN THƯƠNG HIỆU
                                                            </a></td>
                                                        <td>{{route('admin.home')}}</td>
                                                       
                                                        <td>Bật</td>
                                                        <td><input type="text" name="sorted[a9195cd9-3ac5-428b-824e-9bcf43199198]" value="1" style="width: 70px;"></td>
                                                        <td class="text-center"><a class="el-link el-link--default"><!----><span class="el-link--inner">Xoá</span><!----></a></td>
                                                        <td class="text-center"><a class="el-link el-link--default"><!----><span class="el-link--inner">Sao chép</span><!----></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            trang1[vi]<br> <span style="color: red;">Trang chủ</span></td>
                                                        <td><a href="https://admin.hoidoanhnghiepquan1.com/display/detail?id=a9195cd9-3ac5-428b-824e-9bcf43199198">
                                                                Slideshow
                                                            </a></td>
                                                        <td>{{route('admin.home')}}</td>
                                                       
                                                        <td>Bật</td>
                                                        <td><input type="text" name="sorted[a9195cd9-3ac5-428b-824e-9bcf43199198]" value="1" style="width: 70px;"></td>
                                                        <td class="text-center"><a class="el-link el-link--default"><!----><span class="el-link--inner">Xoá</span><!----></a></td>
                                                        <td class="text-center"><a class="el-link el-link--default"><!----><span class="el-link--inner">Sao chép</span><!----></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            trang1[vi]<br> <span style="color: red;">Trang chủ</span></td>
                                                        <td><a href="https://admin.hoidoanhnghiepquan1.com/display/detail?id=a9195cd9-3ac5-428b-824e-9bcf43199198">
                                                                Slideshow
                                                            </a></td>
                                                        <td>{{route('admin.home')}}</td>
                                                       
                                                        <td>Bật</td>
                                                        <td><input type="text" name="sorted[a9195cd9-3ac5-428b-824e-9bcf43199198]" value="1" style="width: 70px;"></td>
                                                        <td class="text-center"><a class="el-link el-link--default"><!----><span class="el-link--inner">Xoá</span><!----></a></td>
                                                        <td class="text-center"><a class="el-link el-link--default"><!----><span class="el-link--inner">Sao chép</span><!----></a></td>
                                                    </tr>
                                                </tbody>
                                            </table> <input type="hidden" name="_token" value="LPulHD1lXmKcYt5ekKdqX0tXQOGR1snYZcpCGhJ6">
                                        </form>
                                    </div>
                                </div> <input type="hidden" id="sortedAjax" value="https://admin.hoidoanhnghiepquan1.com/display/sorted/ajax"> <input type="hidden" id="copyPostAjax" value="https://admin.hoidoanhnghiepquan1.com/display/copy/ajax"> <input type="hidden" id="removePostAjax" value="https://admin.hoidoanhnghiepquan1.com/display/remove/ajax">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>