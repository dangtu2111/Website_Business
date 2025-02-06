<section class="blog_detail-inner-section pt_large pb_large">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-12 col-md-8">
                <div class="blog-info">
                    <div class="news-details">
                        <h2>ÔNG PHAN THÀNH TÂN - CHỦ TỊCH HỘI DOANH NGHIỆP QUẬN 1: ĐÓNG GÓP TẠO GIÁ TRỊ, KHÔNG CHỜ ĐỢI NHẬN GIÁ
                            TRỊ</h2>
                        <div class="post-item">
                            <div class="meta mb15">
                                <span><i class="fa fa-clock-o" aria-hidden="true"></i> 27/11/2024</span>
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i>Tin tức
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blo-detail-text">
                    @yield('content')
                </div>
            </div>
            <div class=" col-sm-12 col-md-4" id="secondary">

                <aside class="widget post-list">
                    <h2 class="ldtl-title">Tin mới nhất</h2>
                    @if(isset($posts))
                    @foreach($posts as $post)
                    <div id="post-f4c2563a-c254-4bb7-9111-72f2d68e9b45"
                        class="post-item post-sidebar-item post-f4c2563a-c254-4bb7-9111-72f2d68e9b45 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc">
                        <div class="row align-items-center">
                            <div class="col-md-5 col-sm-12 mb30">
                                <div class="thumb">
                                    <a href="{{ config('app.url') . '/client/post/' . ($post->category->slug??"null") . '/' . $post->slug }}"
                                        title="{{$post->title}}">
                                        <img width="380" height="250"
                                            src="{{$post->cover_image}}"
                                            class="attachment-380x250 size-380x250 wp-post-image"
                                            alt="{{$post->title}}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 mb30">
                                <a href="{{ config('app.url') . '/client/post/' . ($post->category->slug??"null") . '/' . $post->slug }}"
                                    title="{{$post->title}}">
                                    <h4 class="title">{{$post->title}}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </aside>

                <aside class="widget">
                    <h2 class="ldtl-title">Menu chính</h2>
                    <div class="widget-content nav-menu">
                        <div class="menu-menu-chinh-container">
                            <ul class="menu">
                                <li class="menu-item"><a href="index.html">Trang chủ</a></li>
                                <li class="menu-item"><a href="#">Giới thiệu</a></li>
                                <li class="menu-item"><a href="#">Tin tức - Sự kiện</a></li>
                                <li class="menu-item"><a href="#">Hội viên</a></li>
                                <li class="menu-item"><a href="doi-tac.html">Đối tác</a></li>
                                <li class="menu-item"><a href="lien-he.html">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>

            </div>
            <div class=" col-sm-12 col-md-8">
                @include('frontend/component/lastest-posts')

            </div>
        </div>
    </div>
</section>