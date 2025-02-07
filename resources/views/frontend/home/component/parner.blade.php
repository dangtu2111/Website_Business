<section class="ldtl-section gray gw9">
    <div class="container">
        <h2 class="ldtl-title text-center"><b>Đối tác</b></h2>
        <div class="my-carousel-row mb30">
            <div class="cwvn-carousel cwvn-carousel-1">
                <div class="myNav">
                    <a class="prev prev_1728441874_67" title=""><i class="fa fa-angle-left"
                            aria-hidden="true"></i></a>
                    <a class="next next_1728441874_67" title=""><i class="fa fa-angle-right"
                            aria-hidden="true"></i></a>
                </div>
                <div style="display: none;" id="1728441874_67" class="owl-carousel cus owl-theme">
                    @if(is_array($config['parner']['img']))
                    @foreach($config['parner']['img']  as $img)
                    <div id="1728441874_67_item_0" class="item">
                        <div class="mb15">
                            <a href="#">
                                <img src="{{ $img}}"
                                    alt="" data-bgposition="center top" data-bgfit="cover"
                                    data-bgrepeat="no-repeat" />
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>No images available.</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</section>
