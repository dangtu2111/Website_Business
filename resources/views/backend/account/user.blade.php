<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Quản trị viên</h1>
                        </div>
                        <div class="card-body">
                            <div id="page">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-3 text-right"><a href="{{route('admin.account.createUser')}}" class="btn btn-success bt-add" style="margin-right: 0px;">Tạo tài khoản</a></div>
                                    <div class="col-lg-3 col-sm-6 col-md-6 col-xs-6">
                                        <div class="el-select" style="width: 100%;"><!---->
                                            <div class="el-input el-input--suffix"><!----><input type="text" readonly="readonly" autocomplete="off" placeholder="Status" class="el-input__inner"><!----><span class="el-input__suffix"><span class="el-input__suffix-inner"><i class="el-select__caret el-input__icon el-icon-arrow-up"></i><!----><!----><!----><!----><!----></span><!----></span><!----><!----></div>
                                            <div class="el-select-dropdown el-popper" style="display: none; min-width: 200.05px;">
                                                <div class="el-scrollbar" style="">
                                                    <div class="el-select-dropdown__wrap el-scrollbar__wrap" style="margin-bottom: -17px; margin-right: -17px;">
                                                        <ul class="el-scrollbar__view el-select-dropdown__list"><!---->
                                                            <li class="el-select-dropdown__item"><span>On</span></li>
                                                            <li class="el-select-dropdown__item"><span>Off</span></li>
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
                                    <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                                        <div class="input-with-select el-input el-input-group el-input-group--append"><!----><input type="text" autocomplete="off" placeholder="Nhập từ khoá tìm kiếm" class="el-input__inner"><!----><!---->
                                            <div class="el-input-group__append"><button type="button" class="el-button button-search el-button--default"><!----><i class="el-icon-search"></i><span>Tìm kiếm</span></button></div><!---->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tên đăng nhập</th>
                                                <th>Tên tài khoản</th>
                                                <th>Số điện thoại</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody id="products-body">
                                            @if(isset($users))
                                                @foreach($users as $user)
                                                <tr id="item0" class="item mini">
                                                    <td><a href="/account/admin/edit/ab3432d7-d225-4b67-a3db-62c5b6165421" class="bold text-primary"><span>info</span></a></td>
                                                    <td><span>info</span></td>
                                                    <td><span></span></td>
                                                    <td><span>info@hoidoanhnghiepquan1.com</span></td>
                                                    <td><a href="/account/admin/permission/ab3432d7-d225-4b67-a3db-62c5b6165421">Phân quyền</a></td>
                                                </tr>
                                                @endforeach
                                            @endif
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <div class="el-pagination is-background"><button type="button" disabled="disabled" class="btn-prev"><i class="el-icon el-icon-arrow-left"></i></button>
                                        <ul class="el-pager">
                                            <li class="number active">1</li><!----><!----><!---->
                                        </ul><button type="button" disabled="disabled" class="btn-next"><i class="el-icon el-icon-arrow-right"></i></button>
                                    </div>
                                </div> <input type="hidden" id="paginationAjax" value="https://admin.hoidoanhnghiepquan1.com/account/pagination/admin/ajax">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>