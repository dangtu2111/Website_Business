<?php
$url = asset($config['why']['img']);
?>
<div class="full-container gw3">
            <div class="no-gutters row align-items-center home-why-us-section gray">
                <img class="hideonscreenbig" src="{{$url}}" alt="img "/>
                <div class="col-md-6 col-sm-12 bg mycbg hideonmobile"
                    style="background-image: url({{$url}});">
                    <section class="ldtl-section content" style="visibility: hidden;">
                        <h2 class="ldtl-title">{{$config['why']['title']}}
                            <b></b>
                        </h2>
                       
                        <div class="mb30">

                        {!! base64_decode($config['why']['content']) !!}
                        </div>
                    </section>
                </div>
                <div class="col-md-6 col-sm-12">
                    <section class="ldtl-section content">
                        <h2 class="ldtl-title">{{$config['why']['title']}}
                            <b></b>
                        </h2>
                        <div class="mb30">

                        {!! base64_decode($config['why']['content']) !!}
                        </div>
                    </section>
                </div>
            </div>
        </div>
