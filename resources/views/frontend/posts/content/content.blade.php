<div id="primary" class="col-sm-12 col-md-8">
    <div class="blog-info">
        <div class="news-details">
            <h2>{{$post->title}}</h2>
            <div class="post-item">
                <div class="meta mb15">
                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{$post->created_at}}</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i>{{($category->name??"Blog")}}
                </div>
            </div>
        </div>
    </div>
    <div class="blo-detail-text">
        {!!$post->content!!}
    </div>
</div>