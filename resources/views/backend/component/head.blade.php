<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="934ltx4Lt6pitgY62nF8Mq3RxN1YNCXKEurracFr">

    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./downloaded_resources/style.css?v=1736492186">
    <link href="https://admin.hoidoanhnghiepquan1.com/storage/default/plugins/bootstrap/css/bootstrap.min.css?v=1736492186" rel="stylesheet">
    <link href="https://admin.hoidoanhnghiepquan1.com/storage/default/assets/plugins/perfectscroll/perfect-scrollbar.css?v=1736492186" rel="stylesheet">
    <link href="https://admin.hoidoanhnghiepquan1.com/storage/default/assets/plugins/pace/pace.css?v=1736492186" rel="stylesheet">
    <link href="https://admin.hoidoanhnghiepquan1.com/storage/default/assets/css/main.min.css" rel="stylesheet">
    <link href="https://admin.hoidoanhnghiepquan1.com/storage/default/assets/css/custom.css?v=1736492186" rel="stylesheet">
    @if (isset($config['css']) && is_array($config['css']))
    @if(isset($config['css']))
        @foreach($config['css'] as $key => $val)
            <link href="{{ asset($val)}}" rel="stylesheet">
        @endforeach
    @endif
@endif
    <link rel="shortcut icon" type="image/x-icon" href="https://admin.hoidoanhnghiepquan1.com/storage/default/images/favicon.png?v=1736492186">
</head>