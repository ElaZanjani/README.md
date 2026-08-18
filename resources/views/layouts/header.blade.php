<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="OneUIUX HTML website template by Maxartkiller. Bootstrap UI UX, Bootstrap theme, Bootstrap HTML, Bootstrap template, Bootstrap website, multipurpose website template. get bootstrap template, website">
    <meta name="author" content="Maxartkiller">

    <title>{{$ayar->baslik}}</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('assets/img/favicons/apple-touch-icon.png')}}" sizes="180x180">
    <link rel="icon" href="{{asset('assets/img/favicons/favicon-32x32.png')}}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{asset('assets/img/favicons/favicon-16x16.png')}}" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="{{asset('assets/img/favicons/safari-pinned-tab.svg')}}" color="#ffffff">
    <link rel="icon" href="{{asset('assets/img/favicons/favicon.ico')}}">

    <!-- Elegant font icons -->
    <link href="{{asset('assets/vendor/elegant_font/HTMLCSS/style.css')}}" rel="stylesheet">

    <!-- Elegant font icons -->
    <link href="{{asset('assets/vendor/materializeicon/material-icons.css')}}" rel="stylesheet">

    <!-- Swiper Slider -->
    <link href="{{asset('assets/vendor/swiper/css/swiper.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/style-red.css')}}" rel="stylesheet" id="style">
    <link href="{{asset('assets/css/style-general.css')}}" rel="stylesheet" id="style">
    <link href="{{asset('assets/vendor/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet">

    @yield('css')

    <style type="text/css">
        .sepete_1 {
            width: 200px;
            height: 40px;
            display: none;
            z-index: 99999;
            position: fixed;
            left: 50%;
            margin-left: -100px;
            padding-top: 10px;
            background-color: #28A745;
            border: 1px solid #CCC;
            -webkit-border-bottom-right-radius: 5px;
            -webkit-border-bottom-left-radius: 5px;
            -moz-border-radius-bottomright: 5px;
            -moz-border-radius-bottomleft: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            color: #FFF;
        }
    </style>

<style type="text/css">
        .sepete_2 {
            width: 200px;
            height: 70px;
            display: none;
            z-index: 99999;
            position: fixed;
            left: 50%;
            margin-left: -100px;
            padding-top: 10px;
            background-color: #ff4557;
            border: 1px solid #CCC;
            -webkit-border-bottom-right-radius: 5px;
            -webkit-border-bottom-left-radius: 5px;
            -moz-border-radius-bottomright: 5px;
            -moz-border-radius-bottomleft: 5px;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            color: #FFF;
        }
    </style>
    <div class="sepete_1" id="sepeteeklendi" align="center">Garson Çağırıldı!</div>
    <div class="sepete_2" id="sepeteeklendi2" align="center">Sadece 1 Dakikada 1 Kere Garson Çağırabilirsiniz!</div>
</head>

<body class="ui-rounded">
