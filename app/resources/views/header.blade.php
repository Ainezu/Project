<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Share-album') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/_ajaxlike.js') }}" defer></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" crossorigin="anonymous">
        
    <!-- Styles CSSはpublicのcssファイルで指定-->
    <link href="{{ asset('css/mainapp.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<div id='all'>
    <div class='header'>
        <div class='img'>
            <a href="{{ url('/') }}"><img src="{{ asset('img/rogo.png') }}" alt="ロゴ"></a>
        </div>
        <div class="my-navbar-control">
            @if(Auth::check())
            <span class="my-navbar-item">{{ Auth::user()->name }}</span>
            /
            <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
            <script>
                document.getElementById('logout').addEventListener('click',function(event){
                event.preventDefault();
                document.getElementById('logout-form').submit();
                });
            </script>
            @else
            <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
            /
            <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
            @endif
        </div> 
    </div>