<header id="masthead" class="site-header" role="banner">
    <div class="header-area">
        <div id="header">
            <div class="container">
                <div class="header-content">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-md-2 logo mb30" style="margin:auto">
                                    <a class="navbar-brand" href="{{ route('user.home') }}" title="Hội Doanh Nghiệp Quận 1">
                                        <img class="logo"
                                            src="{{ config('info.logo')}}"
                                            alt="Hội Doanh Nghiệp Quận 1">

                                    </a>
                                </div>
                                <div class="col-md-10 hideonmobile">
                                    <h5 style=" margin-bottom: 0;">CLB DOANH NHÂN TRÀ VINH TẠI TP.HCM</h5>
                                    <h5 style="padding-top: 0;">VỮNG VÀNG KẾT NỐI - ĐỒNG LÒNG PHÁT TRIỂN</h5>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-6 right-content text-right mb30">
                            <div class="social">
                                <a href="{{config('info.facebook')}}" class="social-profile"
                                    target="_blank">
                                    <img
                                        src="{{asset('Frontend/fac8dcafc7346ea0ee5034d36f8734d1/2024/10/11/fb_1728630470_6913223557677251.jpg')}}">

                                    <span>facebook</span>
                                </a>
                                <a href="{{config('info.youtube')}}" class="social-profile"
                                    target="_blank">
                                    <img
                                        src="{{asset('Frontend/fac8dcafc7346ea0ee5034d36f8734d1/2024/10/11/yt_1728630483_3630600216823441.jpg')}}">

                                    <span>youtube</span>
                                </a>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav-menu">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="nav-content">
                            <button class="navbar-toggler" type="button" data-show="1" data-toggle="collapse"
                                data-target="#cwvnNavbar" aria-controls="cwvnNavbar" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <i class="fa fa-align-justify" aria-hidden="true"></i>
                            </button>
                            <div id="cwvnNavbar" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav cwvn-navbar-nav">

                                    <li class="menu-item ">
                                        <a href="{{route('user.home')}}">Trang chủ</a>
                                    </li>


                                    <li class="menu-item menu-item-has-children dropdown ">
                                        <a class="dropdown-toggle" href="#">Giới thiệu <span
                                                class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-item">
                                                <a href="{{route('user.home')}}/post/chung/hoi_doanh_nghiep_quan_1_dau_tau_ket_noi_va_dong_hanh_cung_doanh_nghiep">Hội Doanh Nghiệp Quận 1</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{route('user.home')}}/BLOG/cau-chuyen-thuong-hieu">Câu chuyện thương hiệu</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{route('user.home')}}">Tầm Nhìn - Sứ Mệnh</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{route('user.home')}}">Giá trị cốt lõi</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li class="menu-item menu-item-has-children dropdown ">
                                        <a class="dropdown-toggle" href="#">Tin tức - Sự kiện <span
                                                class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-item">
                                                <a href="{{route('user.news')}}">Tin tức</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{route('user.event')}}">Sự kiện</a>
                                            </li>

                                        </ul>
                                    </li>


                                    <li class="menu-item menu-item-has-children dropdown ">
                                        <a class="dropdown-toggle" href="#">Hội viên <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-item">
                                                <a href="{{route('user.register')}}">Đăng ký hội viên</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{route('user.interest')}}">Quyền lợi hội viên</a>
                                            </li>

                                            <li class="menu-item menu-item-has-children dropdown">
                                                <a href="{{route('user.business')}}">Hội viên Doanh nghiệp</a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li class="menu-item">
                                                        <a href="{{route('user.parner')}}">Hội viên chính thức</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{route('user.parner')}}">Hội viên liên kết</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{route('user.parner')}}">Hội viên danh dự</a>
                                                    </li>

                                                </ul>
                                            </li>

                                        </ul>
                                    </li>

                                    <li class="menu-item ">
                                        <a href="{{route('user.parner')}}">Đối tác</a>
                                    </li>

                                    <li class="menu-item ">
                                        <a href="{{route('user.contact')}}">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>