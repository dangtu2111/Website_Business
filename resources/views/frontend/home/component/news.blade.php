<section class="ldtl-section gw8">
    <div class="container">
        <h2 class="ldtl-title text-center"><b>{{$config['news']['title']}}</b> </h2>
        <div class="row justify-content-center home-post-list">
            @if(isset($news))
            @foreach($news as $new)
            @if($loop->index % 2 == 0)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div id="post-32215"
                    class="post-home-item post-32215 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc">
                    <div class="row no-gutters">
                        <div class="thumb col-md-12">
                            <a href="{{ config('app.url') . '/client/post/' . ($new->category->slug??"null") . '/' . $new->slug }}"
                                title="{{$new->title}}">
                                <img width="380" height="250"
                                    src="{{$new->cover_image}}"
                                    class="attachment-380x250 size-380x250 wp-post-image"
                                    alt="{{$new->title}}" />
                            </a>
                        </div>
                        <div class="info col-md-12">
                            <a href="{{ config('app.url') . '/client/post/' . ($new->category->slug??"null") . '/' . $new->slug }}"
                                title="{{$new->title}}">
                                <h4 class="title">{{$new->title}}</h4>
                            </a>
                            <div class="excerpt mb30">
                                <p>{{$new->description}} [&hellip;]</p>
                            </div>
                            <div class="readmore"><a class="button transparent-primary"
                                    href="{{ config('app.url') . '/client/post/' . ($new->category->slug??"null") . '/' . $new->slug }}">View
                                    more</a></div>
                        </div>
                    </div>
                </div>

            </div>
            @else
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div id="post-32129"
                    class="post-home-item post-32129 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc category-bni-foundation">
                    <div class="row no-gutters">
                        <div class="thumb col-md-12">
                            <a href="chia-se-cach-giai-quyet-bai-toan-kinh-doanh-cho-nguoi-moi-bat-dau.html"
                                title="CHIA SẺ CÁCH GIẢI QUYẾT BÀI TOÁN KINH DOANH CHO NGƯỜI MỚI BẮT ĐẦU - HỘI DOANH NGHIỆP QUẬN 1">
                                <img width="380" height="250"
                                    src="{{asset('Frontend/fac8dcafc7346ea0ee5034d36f8734d1/2024/11/04/463224982_122112653222552284_5718418662490201517_n_1730696993_4527597840605804.jpg')}}"
                                    class="attachment-380x250 size-380x250 wp-post-image"
                                    alt="CHIA SẺ CÁCH GIẢI QUYẾT BÀI TOÁN KINH DOANH CHO NGƯỜI MỚI BẮT ĐẦU - HỘI DOANH NGHIỆP QUẬN 1" />
                            </a>
                        </div>
                        <div class="info col-md-12">
                            <a href="chia-se-cach-giai-quyet-bai-toan-kinh-doanh-cho-nguoi-moi-bat-dau.html"
                                title="CHIA SẺ CÁCH GIẢI QUYẾT BÀI TOÁN KINH DOANH CHO NGƯỜI MỚI BẮT ĐẦU - HỘI DOANH NGHIỆP QUẬN 1">
                                <h4 class="title">CHIA SẺ CÁCH GIẢI QUYẾT BÀI TOÁN KINH DOANH CHO NGƯỜI MỚI
                                    BẮT ĐẦU - HỘI DOANH NGHIỆP QUẬN 1</h4>
                            </a>
                            <div class="excerpt mb30">
                                <p>
                                    Hội Doanh Nghiệp Quận 1 chia sẻ những giải pháp kinh doanh thiết thực
                                    cho các doanh nghiệp mới, đặc biệt trong bối cảnh kinh tế nhiều thách
                                    thức và cơ hội đan xen. Những chia sẻ này không chỉ mang tính ứng dụng
                                    cao mà còn truyền cảm hứng, khuyến khích các nhà sáng lập... [&hellip;]
                                </p>
                            </div>
                            <div class="readmore"><a class="button transparent-primary"
                                    href="chia-se-cach-giai-quyet-bai-toan-kinh-doanh-cho-nguoi-moi-bat-dau.html">View
                                    more</a></div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
            @endforeach
            @endif
            

        </div>
    </div>
</section>