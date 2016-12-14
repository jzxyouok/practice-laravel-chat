<!DOCTYPE html>
<html lang="en" ng-app="MessageApplication">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor/bootstrap-social.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
    @yield('modal')

    <div class="container">
        @yield('content')
    </div>
    
    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/vendor/angular.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>
    @yield ('footer')
</body>
</html>