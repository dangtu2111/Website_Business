<?php
  $url_image = $category->cover_image ?? (config('app.url') . '/Backend/img/background001.jpg');

?>
<section class="breadcrumbs-section background_bg header-bg"
  data-img-src="{{$url_image}}"
  style="background: url({{$url_image}}) center center / cover;    padding: 70px 0px;">
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
              <a href="{{ config('app.url').'/client/post/'.$word }}">{{ $word }}</a>
            </li>
            @endforeach
            @endif


          </ul>
        </div>
      </div>
    </div>
  </div>
</section>