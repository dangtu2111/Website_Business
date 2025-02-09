<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ config('app.url') }}">

    <meta name="csrf-token" content="934ltx4Lt6pitgY62nF8Mq3RxN1YNCXKEurracFr">

    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Backend/css/style.css?v=1736492186')}}">
    <link href="{{asset('Backend/css/bootstrap.min.css?v=1736492186')}}" rel="stylesheet">
    <link href="{{asset('Backend/default/assets/plugins/perfectscroll/perfect-scrollbar.css?v=1736492186')}}" rel="stylesheet">
    <link href="{{asset('Backend/default/assets/plugins/pace/pace.css?v=1736492186')}}" rel="stylesheet">
    <link href="{{asset('Backend/default/assets/css/main.min.css')}}" rel="stylesheet">
    <link href="{{asset('Backend/default/assets/css/custom.css?v=1736492186')}}" rel="stylesheet">
    <!-- <link href="{{asset('Backend/default/assets/css/nestable.css?v=1736830028')}}" rel="stylesheet"> -->
  
    @if (isset($config['css']) && is_array($config['css']))
    @if(isset($config['css']))
        @foreach($config['css'] as $key => $val)
            <link href="{{ asset($val)}}" rel="stylesheet">
        @endforeach
    @endif
@endif
<style>
        /* Modal background overlay */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none; /* Hidden by default */
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Modal content box */
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Close button */
        .modal-close {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background:rgb(245, 49, 10);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-close:hover {
            background: rgb(245, 49, 10);
        }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('Backend/default/images/favicon.png?v=1736492186')}}">
</head>