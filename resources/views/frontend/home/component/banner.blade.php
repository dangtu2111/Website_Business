@if(!empty($config['banner']['img']) && is_array($config['banner']['img']) && !empty($config['banner']['img'][0]))
    <section class="breadcrumbs-section background_bg header-bg" 
        data-img-src="{{ $config['banner']['img'][0] }}" 
        style="background: url({{ $config['banner']['img'][0] }}) center center / cover;">
    </section>
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