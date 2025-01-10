<div class="app-sidebar">
    <div class="logo">
        <a href="" class="logo-icon"><span class="logo-text">SOPRO</span></a>
        <div class="sidebar-user-switcher user-activity-online">
            <a href="#">
                <img src="https://admin.hoidoanhnghiepquan1.com/storage/default/assets/images/avatars/avatar.png" alt=" info">
                <span class="activity-indicator"></span>
                <span class="user-info-text"> info</span>
            </a>
        </div>
    </div>
    <div class="app-menu ps">
        <ul class="accordion-menu">
            <li class="active-page">
                <a href="{{route('admin.home')}}" class="active"><i class="material-icons-two-tone">dashboard</i>Thống kê</a>
            </li>


            <li>
                <a href=""><i class="material-icons-two-tone">people_alt</i>Tài khoản<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="{{route('admin.account.accountUser')}}">Thành viên</a></li>

                    <li><a href="{{route('admin.account.accountAdmin')}}">Quản trị viên</a></li>

                </ul>
            </li>


            <li>
                <a href=""><i class="material-icons-two-tone">list</i>Quản lý danh mục<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="{{route('admin.category.blogs')}}">Bài viết</a></li>


                    <li><a href="{{route('admin.category.products')}}">Sản phẩm</a></li>


                   </ul>
            </li>


            <li>
                <a href=""><i class="material-icons-two-tone">ballot</i>Quản lý nội dung<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="{{route('admin.blogs')}}">Bài viết</a>
                    </li>

                    <li>
                        <a href="{{route('admin.products')}}">Sản phẩm</a>
                    </li>

                    
                </ul>
            </li>


            <li>
                <a href=""><i class="material-icons-two-tone">ballot</i>Quản lý giao diện<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="{{route('admin.location')}}">Vị trí</a>
                    </li>
                    <li>
                        <a href="{{route('admin.menu')}}">Menu</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href=""><i class="material-icons-two-tone">settings</i>Cài đặt<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="{{route('admin.config')}}">Thông tin chung</a></li>
                    <li><a href="{{route('admin.seo')}}">Seo</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="material-icons-two-tone">logout</i>Đăng xuất</a>
            </li>

        </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
</div>