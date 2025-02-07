<div id="page" class="hfeed site">
            <div id="content" class="site-content">
                <div class="full-container">
                    <section class="ldtl-section">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-sm-12">
                                    <h2 class="ldtl-title">{!! $config['content']['title'] !!}                                    </h2>
                                    <div class="cwvn-main-content mb30">
                                        <div class="cwvn-main-content mb30">
                                        {!! base64_decode($config['content']['content']) !!}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="featured-number-list">
                                        <div class="mb30 hideonmobile">&nbsp;</div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="featured-number-item text-center mb60">
                                                    <div class="number d-flex justify-content-center">
                                                        <div class="number">
                                                        {{ \Carbon\Carbon::parse(config('info.ngay_thanh_lap'))->format('d/m/Y') }}

                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="title">
                                                        Ngày thành lập
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="featured-number-item text-center mb60">
                                                    <div class="number d-flex justify-content-center">
                                                        <div class="number">
                                                        {{config('info.member')}}
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="title">
                                                        Thành viên
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="featured-number-item text-center mb60">
                                                    <div class="number d-flex justify-content-center">
                                                        <div class="number" data-toggle="counter-up">
                                                            2,245
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="title">
                                                        Lượng truy cập
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>