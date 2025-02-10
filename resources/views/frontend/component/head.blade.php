<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="f8MrJ9J0x0xHnHFINR3Qp3uCeCNcTk2xOoIbTYYF" />
    <meta name="app-url" content="{{ config('app.url') }}">

    <title>{{ ($config['title']??($category->name ?? "Đây là một Page")) }}</title>
    <link rel="shortcut icon" href="{{ config('info.logo')}}" />

<link href="{{ asset('Frontend/css/fontawesome/css/all.min.css') }}" rel="stylesheet" defer>
<link rel="stylesheet" href="{{ asset('Frontend/plugins/bootstrap/css/bootstrap.min9ed2.css?v=1736487372') }}" />
<link rel="stylesheet" href="{{ asset('Frontend/plugins/swiper/css/swiper-bundle.min9ed2.css?v=1736487372') }}" defer>
<link rel="stylesheet" href="{{ asset('Frontend/plugins/ui/style.css') }}" defer>
<link rel="stylesheet" href="{{ asset('Frontend/plugins/aos/aos9ed2.css?v=1736487372') }}" defer>

<link href="{{ asset('Frontend/css/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ asset('Frontend/css/owl.theme.css') }}" rel="stylesheet">
<link href="{{ asset('Frontend/css/forall9ed2.css?v=1736487372') }}" rel="stylesheet">
<link href="{{ asset('Frontend/css/settings9ed2.css?v=1736487372') }}" rel="stylesheet">

<link href="{{ asset('Frontend/css/style9ed2.css?v=1736487372') }}" rel="stylesheet">
<link href="{{ asset('Frontend/css/main9ed2.css?v=1736487372') }}" rel="stylesheet">


    <style>
        .breadcrumb-item+.breadcrumb-item::before {
    float: left;
    padding-right: .5rem;
    color: white;
    content: var(--bs-breadcrumb-divider, "/");}

        a.m57-form-btn-show {
            background: #fff;
            color: #fff !important;
            border: 2px solid var(--primary);
            border-radius: 25px;
            padding: 0px 30px;
            position: absolute;
            height: 53px;
            width: 190px;
            right: 0px;
            display: flex;
            align-content: center;
            align-items: center;
            -webkit-animation: glowing1 1500ms infinite;
            -moz-animation: glowing1 1500ms infinite;
            -o-animation: glowing1 1500ms infinite;
            animation: glowing1 1500ms infinite;
            justify-content: center;
        }

        .m57-form-btn-show:hover {
            background: var(--primary);
        }

        .m57-form-btn {
            background: #fff;
            color: var(--primary-slave);
            border: 1px solid #fff;
            border-radius: 25px;
            padding: 15px 30px;
        }

        .m57-form-btn {
            border: 2px solid var(--primary);
        }

        .m57-form-btn:hover {
            background: var(--primary);
            color: #fff;
            border: 2px solid var(--primary);
        }

        .m57-popup {
            color: #333;
            z-index: 999999;
            background: #333333b5;
        }

        .m57-popup .modal-dialog .modal-content {
            background-color: var(--primary-slave);
            color: #fff;

        }

        .m57-popup .modal-dialog .modal-header .btn-close {}

        .button-contact-vr {
            bottom: 80px;
        }

        .ring {
            position: absolute;
            top: 0px;
            right: 0px;
        }

        .coccoc-alo-ph-circle {
            width: 80px;
            height: 80px;
            top: -15px;
            right: -15px;
            position: absolute;
            background-color: transparent;
            border-radius: 100%;
            border: 2px solid rgba(30, 30, 30, 0.4);
            opacity: .1;
            animation: coccoc-alo-circle-anim 1.2s infinite ease-in-out;
            transition: all .5s;
        }

        .coccoc-alo-phone {
            background-color: transparent;
            width: 80px;
            height: 80px;
            cursor: pointer;
            z-index: 200000 !important;
            transition: visibility .5s;
            right: 0px;
            top: 0px;
            position: absolute;
        }

        .coccoc-alo-phone.coccoc-alo-green .coccoc-alo-ph-circle-fill {
            background-color: rgba(0, 175, 242, 0.5);
            opacity: .75 !important;
        }

        .coccoc-alo-ph-circle-fill {
            width: 50px;
            height: 50px;
            top: 0px;
            right: 0px;
            position: absolute;
            background-color: #000;
            border-radius: 100%;
            border: 2px solid transparent;
            opacity: .1;
            animation: coccoc-alo-circle-fill-anim 2.3s infinite ease-in-out;
            transition: all .5s;
        }

        .coccoc-alo-ph-img-circle {
            width: 50px;
            height: 50px;
            top: 0px;
            right: 0px;
            position: absolute;
            background: rgba(30, 30, 30, 0.1) url(storage/images/ic-phone.png) no-repeat center center;
            border-radius: 100%;
            border: 2px solid transparent;
            opacity: .7;
            animation: coccoc-alo-circle-img-anim 1s infinite ease-in-out;
            background-size: 70%;
        }

        .coccoc-alo-phone.coccoc-alo-green .coccoc-alo-ph-img-circle {
            background-color: var(--primary-slave);
        }

        .coccoc-alo-phone.coccoc-alo-green .coccoc-alo-ph-circle {
            border-color: var(--primary-slave);
            opacity: .5;
        }

        .coccoc-alo-phone.coccoc-alo-green.coccoc-alo-hover .coccoc-alo-ph-circle,
        .coccoc-alo-phone.coccoc-alo-green:hover .coccoc-alo-ph-circle {
            border-color: #75eb50;
            opacity: .5;
        }

        .coccoc-alo-phone.coccoc-alo-green.coccoc-alo-hover .coccoc-alo-ph-circle-fill,
        .coccoc-alo-phone.coccoc-alo-green:hover .coccoc-alo-ph-circle-fill {
            background-color: rgba(117, 235, 80, 0.5);
            opacity: .75 !important;
        }

        .coccoc-alo-phone.coccoc-alo-green.coccoc-alo-hover .coccoc-alo-ph-img-circle,
        .coccoc-alo-phone.coccoc-alo-green:hover .coccoc-alo-ph-img-circle {
            background-color: #75eb50;
        }

        @-moz-keyframes coccoc-alo-circle-anim {
            0% {
                transform: rotate(0) scale(.5) skew(1deg);
                opacity: .1
            }

            30% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .5
            }

            100% {
                transform: rotate(0) scale(1) skew(1deg);
                opacity: .1
            }
        }

        @-webkit-keyframes coccoc-alo-circle-anim {
            0% {
                transform: rotate(0) scale(.5) skew(1deg);
                opacity: .1
            }

            30% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .5
            }

            100% {
                transform: rotate(0) scale(1) skew(1deg);
                opacity: .1
            }
        }

        @-o-keyframes coccoc-alo-circle-anim {
            0% {
                transform: rotate(0) scale(.5) skew(1deg);
                opacity: .1
            }

            30% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .5
            }

            100% {
                transform: rotate(0) scale(1) skew(1deg);
                opacity: .1
            }
        }

        @keyframes coccoc-alo-circle-anim {
            0% {
                transform: rotate(0) scale(.5) skew(1deg);
                opacity: .1
            }

            30% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .5
            }

            100% {
                transform: rotate(0) scale(1) skew(1deg);
                opacity: .1
            }
        }

        @-moz-keyframes coccoc-alo-circle-fill-anim {
            0% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .2
            }

            50% {
                transform: rotate(0) scale(1) skew(1deg);
                opacity: .2
            }

            100% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .2
            }
        }

        @-webkit-keyframes coccoc-alo-circle-fill-anim {
            0% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .2
            }

            50% {
                transform: rotate(0) scale(1) skew(1deg);
                opacity: .2
            }

            100% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .2
            }
        }

        @-o-keyframes coccoc-alo-circle-fill-anim {
            0% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .2
            }

            50% {
                transform: rotate(0) scale(1) skew(1deg);
                opacity: .2
            }

            100% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .2
            }
        }

        @keyframes coccoc-alo-circle-fill-anim {
            0% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .2
            }

            50% {
                transform: rotate(0) scale(1) skew(1deg);
                opacity: .2
            }

            100% {
                transform: rotate(0) scale(.7) skew(1deg);
                opacity: .2
            }
        }

        @-moz-keyframes coccoc-alo-circle-img-anim {
            0% {
                transform: rotate(0) scale(1) skew(1deg)
            }

            10% {
                transform: rotate(-25deg) scale(1) skew(1deg)
            }

            20% {
                transform: rotate(25deg) scale(1) skew(1deg)
            }

            30% {
                transform: rotate(-25deg) scale(1) skew(1deg)
            }

            40% {
                transform: rotate(25deg) scale(1) skew(1deg)
            }

            50% {
                transform: rotate(0) scale(1) skew(1deg)
            }

            100% {
                transform: rotate(0) scale(1) skew(1deg)
            }
        }

        @-webkit-keyframes coccoc-alo-circle-img-anim {
            0% {
                transform: rotate(0) scale(1) skew(1deg)
            }

            10% {
                transform: rotate(-25deg) scale(1) skew(1deg)
            }

            20% {
                transform: rotate(25deg) scale(1) skew(1deg)
            }

            30% {
                transform: rotate(-25deg) scale(1) skew(1deg)
            }

            40% {
                transform: rotate(25deg) scale(1) skew(1deg)
            }

            50% {
                transform: rotate(0) scale(1) skew(1deg)
            }

            100% {
                transform: rotate(0) scale(1) skew(1deg)
            }
        }

        @-o-keyframes coccoc-alo-circle-img-anim {
            0% {
                transform: rotate(0) scale(1) skew(1deg)
            }

            10% {
                transform: rotate(-25deg) scale(1) skew(1deg)
            }

            20% {
                transform: rotate(25deg) scale(1) skew(1deg)
            }

            30% {
                transform: rotate(-25deg) scale(1) skew(1deg)
            }

            40% {
                transform: rotate(25deg) scale(1) skew(1deg)
            }

            50% {
                transform: rotate(0) scale(1) skew(1deg)
            }

            100% {
                transform: rotate(0) scale(1) skew(1deg)
            }
        }

        @keyframes coccoc-alo-circle-img-anim {
            0% {
                transform: rotate(0) scale(1) skew(1deg)
            }

            10% {
                transform: rotate(-25deg) scale(1) skew(1deg)
            }

            20% {
                transform: rotate(25deg) scale(1) skew(1deg)
            }

            30% {
                transform: rotate(-25deg) scale(1) skew(1deg)
            }

            40% {
                transform: rotate(25deg) scale(1) skew(1deg)
            }

            50% {
                transform: rotate(0) scale(1) skew(1deg)
            }

            100% {
                transform: rotate(0) scale(1) skew(1deg)
            }
        }

        @-webkit-keyframes glowing1 {
            0% {
                background-color: #004A7F;
                -webkit-box-shadow: 0 0 3px #004A7F;
            }

            50% {
                background-color: #0094FF;
                -webkit-box-shadow: 0 0 10px #0094FF;
            }

            100% {
                background-color: #004A7F;
                -webkit-box-shadow: 0 0 3px #004A7F;
            }
        }

        @-moz-keyframes glowing1 {
            0% {
                background-color: #004A7F;
                -moz-box-shadow: 0 0 3px #004A7F;
            }

            50% {
                background-color: #0094FF;
                -moz-box-shadow: 0 0 10px #0094FF;
            }

            100% {
                background-color: #004A7F;
                -moz-box-shadow: 0 0 3px #004A7F;
            }
        }

        @-o-keyframes glowing1 {
            0% {
                background-color: #004A7F;
                box-shadow: 0 0 3px #004A7F;
            }

            50% {
                background-color: #0094FF;
                box-shadow: 0 0 10px #0094FF;
            }

            100% {
                background-color: #004A7F;
                box-shadow: 0 0 3px #004A7F;
            }
        }

        @keyframes glowing1 {
            0% {
                background-color: #662424;
                box-shadow: 0 0 3px #662424;
            }

            50% {
                background-color: #fb5353;
                box-shadow: 0 0 10px #fb5353;
            }

            100% {
                background-color: #662424;
                box-shadow: 0 0 3px #662424;
            }
        }

        @media (max-width: 600px) {
            .m57-form-btn-show {
                margin: 10px 0px;
            }
        }
    </style>
</head>