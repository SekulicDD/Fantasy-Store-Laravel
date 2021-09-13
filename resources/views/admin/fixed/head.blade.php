<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset("assets/vendor/bootstrap/css/bootstrap2.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/font-awesome/css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/linearicons/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/chartist/css/chartist-custom.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/toastr/toastr.min.css")}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/admin.css")}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
     <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">--}}
</head>
