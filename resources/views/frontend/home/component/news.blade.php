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
            
            @endif
            @endforeach
            @endif
            

        </div>
    </div>
</section>