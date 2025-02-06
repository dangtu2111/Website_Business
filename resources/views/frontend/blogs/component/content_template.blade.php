<main class="main">
        <section class="blog-inner-section pt_large pb_large">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12" id="primary">
                        <div class="post-list">
                            @if(isset($posts))
                            @foreach($posts as $post)
                            :
                            <div id="post-31681"
                                class="post-item post-31681 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc category-goc-bao-chi">
                                <div class="row align-items-center">
                                    <div class="col-md-5 col-sm-4 mb30">
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
                                    <div class="col-md-7 col-sm-8 mb30">
                                        <a href="{{ config('app.url') . '/client/post/' . ($post->category->slug??"null") . '/' . $post->slug }}"
                                            title="{{$post->title}}">
                                            <h4 class="title">{{$post->title}}</h4>
                                        </a>
                                        <div class="meta mb10">
                                            <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{$post->created_at}}</span>
                                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                            <a href=""></a>
                                        </div>
                                        <div class="excerpt mb15">
                                            <p>

                                            </p>
                                        </div>
                                        <div class="readmore"><a class="button transparent-primary"
                                                href="{{ config('app.url') . '/client/post/' . ($post->category->slug??"null") . '/' . $post->slug }}">View
                                                more</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            
                        </div>
                    </div>
                    <div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
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
                        @include('frontend/component/subMenu')
                        

                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
    </main>