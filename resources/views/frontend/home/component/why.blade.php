<?php
$url = asset($config['why']['img']);
?>
<div class="full-container gw3">
            <div class="no-gutters row align-items-center home-why-us-section gray">
                <img class="hideonscreenbig" src="{{$url}}" alt="img "/>
                <img class="col-md-6 col-sm-12 bg mycbg hideonmobile" src="http://18.215.177.37/storage/photos/1/6d0e364b-1ea4-49b3-8545-4818c24092ed.jpg" alt="img ">
               
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
