<style>
/* Mặc định: ẩn section, hiện img */
.banner-section-mobile {
    display: none;
}
.banner-img-desktop {
    display: block;
}

/* Trên màn hình nhỏ (điện thoại): chỉ hiện section, ẩn img */
@media screen and (max-width: 768px) {
    .banner-section-mobile {
        display: block;
    }
    .banner-img-desktop {
        display: none;
    }
}
</style>
@php
    $bannerImg = !empty($config['banner']['img']) && is_array($config['banner']['img']) && !empty($config['banner']['img'][0])
        ? $config['banner']['img'][0]
        : null;
    $bannerImg_mobile = !empty($config['banner']['img_mobile']) && is_array($config['banner']['img_mobile']) && !empty($config['banner']['img_mobile'][0])
        ? $config['banner']['img_mobile'][0]
        : null;
@endphp

@if($bannerImg)
    <!-- Background section cho mobile -->
    <section class="banner-section-mobile background_bg header-bg" 
        data-img-src="{{ $bannerImg_mobile }}" 
        style="background: url({{ $bannerImg_mobile }}) center center / cover;    height: 170px;">
    </section>

    <!-- Thẻ img hiển thị cho màn hình lớn -->
    <img class="banner-img-desktop" 
        src="{{ $bannerImg }}" 
        alt="Banner trên website" 
        title="Banner trên website" 
        width="100%" 
        loading="lazy">
@endif



{{--<div class="header-banner">
    <div id="cwvn-slider">
        <div id="rev_slider_8_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
            style="margin: 0px auto; background-color: #e9e9e9; padding: 0px; margin-top: 0px; margin-bottom: 0px; max-height: 700px;">
            <!-- START REVOLUTION SLIDER 4.6.5 fullwidth mode -->
            <div id="rev_slider_8_1" class="rev_slider fullwidthabanner"
                style="display: none; max-height: 700px; height: 700px;">
                <ul>
                    @if(!empty($config['banner']['img']))
                    @if(is_array($config['banner']['img']))
                    @foreach($config['banner']['img'] as $img)
                    @if($img!=null)
                    <li data-transition="random" data-slotamount="7" data-saveperformance="off">
                        <img src="{{ asset($img) }}"
                            alt="" data-bgposition="center top" data-bgfit="cover"
                            data-bgrepeat="no-repeat" />
                    </li>
                    @endif
                    @endforeach
                    @else
                    <li data-transition="random" data-slotamount="7" data-saveperformance="off">
                        <img src="{{ asset($config['banner']['img']) }}"
                            alt="" data-bgposition="center top" data-bgfit="cover"
                            data-bgrepeat="no-repeat" />
                    </li>
                    @endif
                    @endif


                </ul>
                <div class="tp-bannertimer"></div>
            </div>

            <style scoped></style>

        </div>
    </div>
</div>--}}