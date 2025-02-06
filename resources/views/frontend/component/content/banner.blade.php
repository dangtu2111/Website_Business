<?php
  $url_image = $category->cover_image ?? (config('app.url') . '/Backend/img/background001.png');

?>
<section class="breadcrumbs-section background_bg header-bg"
  data-img-src="https://hoidoanhnghiepquan1.com/storage/fac8dcafc7346ea0ee5034d36f8734d1/wp-content/uploads/1900/2024/10/11/cover_1728639357_6826272568245068.jpg"
  style="background: url({{$url_image}}) center center / cover;">
  <div class="header-bg-overflow"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page_title text-center">
          <h1 class="ldtl-page-title">{{ ($config['title']??($category->name ?? "Đây là một Page")) }}</h1>
          <ul class="breadcrumb justify-content-center" style="color:white">
            
            @if(isset($category))
            <li class="breadcrumb-item">
              <a href="index.html">Trang chủ</a>
            </li>
            @foreach(explode('/', $category->slug) as $word)
            <li class="breadcrumb-item">
              <a href="{{ $word }}.html">{{ $word }}</a>
            </li>
            @endforeach
            @endif


          </ul>
        </div>
      </div>
    </div>
  </div>
</section>