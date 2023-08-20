<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
</head>
<body>
    @if(Auth::user())
    @include('components.user-navbar')
    @else
    @include('components.navbar')
    @endif
    @yield('content')
    <script src="{{asset('assets/js/scripts.js')}}"></script>
</body>
</html>