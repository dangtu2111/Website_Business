<div class="full-container">
        <section class="ldtl-section contact-section" style="background-image: url('');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 col-sm-12">
                        <div class="contact-form mb30">
                            <h3>{{config('info.name')}}</h3>
                            <p style="font-size: 14px !important;">
                                <strong>Địa chỉ trụ sở chính:</strong> {{config('info.address')}}<br />
                                <strong>Hotline:</strong> {{config('info.phone')}}<br />
                                <strong>Email:</strong> <a
                                    href="mailto:{{config('info.email')}}">{{config('info.email')}}</a><br>
                                <strong>Website:</strong> {{config('info.website')}}<br />
                                <strong>Facebook: </strong><a style="color:rgb(15, 15, 15);text-decoration: underline;"
                                    href="{{config('info.facebook')}}">{{config('info.social_network.facebook.name')}}</a><br>
                                <strong>Youtube: </strong><a style="color:rgb(3, 3, 3);text-decoration: underline;"
                                    href="{{config('info.youtube')}}">{{config('info.social_network.youtube.name')}}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>