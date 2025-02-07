<section class="blog_detail-inner-section pt_large pb_large">
  <div class="container">
    <div class="row">
      <div id="primary" class="col-sm-12 col-md-8">
        <div class="blog-info">
          <div class="news-details">
            <h2>ĐỐI TÁC</h2>
            <div class="post-item">
              <div class="meta mb15">
                <span><i class="fa fa-clock-o" aria-hidden="true"></i> 14/10/2024</span>
                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list-alt" aria-hidden="true"></i>Chung
              </div>
            </div>
          </div>
        </div>
        <div class="blo-detail-text">
          @if(is_array($config['img']))
          @foreach(array_chunk($config['img'], 3) as $imageGroup)
          <p>
            @foreach($imageGroup as $img)
            <img src="{{ asset($img) }}" alt="Image" style="max-width: 33%; height: auto; margin-right: 5px;" />
            @endforeach
          </p>
          @endforeach
          @else
          <p>No images available.</p>
          @endif
        </div>

      </div>
      <div class=" col-sm-12 col-md-4" id="secondary">
      </div>
      <div class=" col-sm-12 col-md-8">
        @include('frontend/component/lastest-posts')

      </div>
    </div>
  </div>
</section>