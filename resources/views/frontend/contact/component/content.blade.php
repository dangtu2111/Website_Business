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
                            @if(config('info.social_network'))
                            @foreach (config('info.social_network') as $key=> $social )
                            <strong style="text-transform: capitalize;">{{$key}}: </strong><a style="color:rgb(15, 15, 15);text-decoration: underline;"
                                href="{{$social['link']}}">{{$social['name']}}</a><br>
                            @endforeach
                            @else
                            <div>
                                <p>Social Network: {{ $social }}</p>
                            </div>
                            @endif
                        
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>