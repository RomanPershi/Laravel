<!doctype html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/foothead.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
    <link rel="stylesheet" href="{{asset('css/shop.css')}}">
    <link rel="stylesheet" href="{{asset('css/sliderShop.css')}}">
    <link rel="stylesheet" href="{{asset('css/productShop.css')}}">
    <link rel="stylesheet" href="{{asset('css/sign.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keybar</title>
</head>
<body style="overflow-x:hidden;">
<nav class="nav_menu">
    <div class="brand">
        <a class="brand_link" href="/"><i name="keyboard_brand" class="fas fa-keyboard"></i>KeyBar</a>
    </div>
    <div class="links_bar">
        <a type="home_link" class="links" href="/"><span><i class="fas fa-home"></i></span></a>
        <a class="links" href="{{route('shop')}}"><span><i class="fas fa-shopping-cart"></i></span></a>
        @can('admin',auth()->user())
            <a class="links" href="{{route('admin.product.main')}}"><span><i class="fas fa-tools"></i></span></a>
        @endcan
        @can('worker',auth()->user())
            <a class="links" href="{{route('admin.order.main')}}"><span><i class="fas fa-tools"></i></span></a>
        @endcan
        @can('moderator',auth()->user())
            <a class="links" href="{{route('admin.product.main')}}"><span><i class="fas fa-tools"></i></span></a>
        @endcan
        <a class="links" href="{{route('cart')}}"><span><i class="fas fa-shopping-basket"></i></span></a>
        @if (auth()->user() == NULL)
            <a class="links" href="{{route('sign')}}"><span><i class="fas fa-sign-in-alt"></i></span></a>
        @else
            <a class="links" href="{{route('sign')}}"><span><i class="fas fa-user-circle"></i></span></a>
        @endif
    </div>
</nav>
@yield('foothead')
<script src="{{asset("js/foothead.js")}}"></script>
<script id="ajax" src="{{asset("js/admin/ajax.js")}}"></script>
<script src="{{asset("js/admin/decorate.js")}}"></script>
<script src="{{asset("js/shop/decorate.js")}}"></script>
</body>
</html>
