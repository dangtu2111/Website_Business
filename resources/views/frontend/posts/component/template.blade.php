<section class="blog_detail-inner-section pt_large pb_large">
  <div class="container">
    <div class="row">
      @include('frontend.posts.content.content')
      @if(isset($category->title_news))
      <div class=" col-sm-12 col-md-4" id="secondary">

        <aside class="widget post-list">
          <h2 class="ldtl-title">{{$category->title_news}}</h2>
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

        @include('frontend/component/subMenu')


      </div>
      @endif
      @if(isset($category->title_bottom))
      <div class=" col-sm-12 col-md-8">
        @include('frontend/component/lastest-posts')
      </div>
      @endif
      
      
    </div>
  </div>
</section>