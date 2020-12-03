<!DOCTYPE html>
<html>
<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title','Library Management System')</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/toaster/toaster.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome/css/font-awesome.css')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom_ah.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/google_font.css')}}">
    <link rel="stylesheet" href="{{asset('assets/kendo/styles/kendo.common.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/kendo/styles/kendo.default.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/kendo/styles/kendo.default.mobile.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/kendo/styles/kendo.custom.css')}}"/>

    {{--Javascript--}}
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/angular.min.js')}}"></script>
    <script src="{{asset('assets/kendo/js/kendo.all.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/toaster/toaster.js')}}"></script>
    <script src="{{asset('assets/js/spin.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.smoothState.js')}}"></script>
    <script src="{{asset('assets/js/adminlte.min.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/kendo/js/cultures/kendo.culture.de-DE.min.js')}}"></script>
    <script src="{{asset('assets/kendo/js/cultures/kendo.culture.en-GB.min.js')}}"></script>
    <script src="{{asset('assets/kendo/js/cultures/kendo.culture.bn-BD.min.js')}}"></script>
    <script src="{{asset('assets/kendo/js/cultures/kendo.culture.it-IT.min.js')}}"></script>
    <script src="{{asset('assets/kendo/js/cultures/kendo.culture.cs-CZ.min.js')}}"></script>
    <script src="{{asset('assets/kendo/js/cultures/kendo.culture.pl-PL.min.js')}}"></script>
    <script src="{{asset('assets/kendo/js/cultures/kendo.culture.zh-CN.min.js')}}"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')
    <div class="content-wrapper">
        <div class="content">
            @yield('mainContent')
        </div>
    </div>
</div>

@include('layouts.partials.footer')
</body>
</html>
</div>