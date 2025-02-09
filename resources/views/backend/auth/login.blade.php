<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="8w73KeIlYF7UaILjmV1oRAc00vX0NMoZGAh6UWIV">
    <link rel="stylesheet" href="{{ asset('Backend/css/style.css') }}?=1736515238">
    <link href="{{ asset('Backend/css/bootstrap.min.css') }}?=1736515238" rel="stylesheet">
    <link href="{{ asset('Backend/css/perfect-scrollbar.css') }}?=1736515238" rel="stylesheet">
    <link href="{{ asset('Backend/css/pace.css') }}?=1736515238" rel="stylesheet">
    <link href="{{ asset('Backend/css/main.min.css') }}?=1736515238" rel="stylesheet">
    <link href="{{ asset('Backend/css/custom.css') }}?=1736515238" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('Backend/img/logo.svg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('Backend/img/logo.svg') }}">
    <title>Login</title>
</head>

<body class="pace-running ">
    <div class="pace pace-active">
        <div class="pace-progress" data-progress-text="46%" data-progress="46" style="transform: translate3d(46.8401%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div id="pageLogin" class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background"></div>
        <div class="app-auth-container">
            <div class="logo"><a href="">CLB DOANH NHÂN TRÀ VINH TẠI TP.HCM</a></div>
            <div class="auth-credentials m-b-xxl">
                @if ($errors->any())
                <div class="alert alert-danger" style="background:transparent;margin-bottom: 0;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style="color:red;padding: 1rem 0 0 0;
    margin-bottom: 0;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="el-form form-cs" action="{{route('admin.auth')}}" method="POST">
                    @csrf
                    <span class="errors-text"></span>
                    <div class="el-form-item mt-3 require"><label class="el-form-item__label">Tên đăng nhập</label>
                        <div class="el-form-item__content">
                            <div class="el-input"><!----><input type="text" name="username" autocomplete="off" class="el-input__inner"><!----><!----><!----><!----></div> <i class="errors errors-text__username"></i><!---->
                        </div>
                    </div>
                    <div class="el-form-item require"><label class="el-form-item__label">Mật khẩu</label>
                        <div class="el-form-item__content">
                            <div class="el-input el-input--suffix"><!----><input type="password" name="password" autocomplete="off" placeholder="●●●●●●●●" class="el-input__inner"><!----><span class="el-input__suffix"><span class="el-input__suffix-inner"><!----><!----><i class="el-input__icon el-icon-view el-input__clear"></i><!----></span><!----></span><!----><!----></div> <i class="errors errors-text__password"></i><!---->
                        </div>
                    </div>
                    <div class="el-form-item"><!---->
                        <div class="el-form-item__content"><button type="submit" class="el-button el-button--primary"><!----><!----><span>Đăng nhập</span></button><!----></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('Backend/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('Backend/js/library.js') }}"></script>
    <script src="{{ asset('Backend/js/ui.js') }}"></script>
    <script src="{{ asset('Backend/js/vi.js') }}?v=1736492186"></script>

    <script>
        ELEMENT.locale(ELEMENT.lang.vi);
        var STATIC_URL = "{{ asset('Backend/js') }}";
    </script>

    <script src="{{ asset('Backend/js/tinymce.min.js') }}"></script>
    <script src="{{ asset('Backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Backend/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('Backend/js/pace.min.js') }}"></script>
    <script src="{{ asset('Backend/js/main.min.js') }}"></script>
    <script src="{{ asset('Backend/js/custom.js') }}?v=1736492186"></script>

</body>

</html>