<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">

    <title>@yield('head.title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=5">

    <meta name="description" content="@yield('head.description')" />

    <meta name="theme-color" content="@yield('head.theme_color', '#333333')" />

    @stack('head')

    <meta name="robots" content="@yield('head.robots', 'index, follow')">

    <meta name="yandex-verification" content="f4df55c8e78ac0b1" />

    <link rel="icon" type="image/x-icon" sizes="16x16" href="/favicon.ico">
    <link rel="icon" type="image/svg" sizes="120x120" href="/favicon.svg">

    {{-- <link rel="shortcut icon" type="image/x-icon" sizes="32x32" href="/favicon-32x32.ico"> --}}

    {{-- <link rel="apple-touch-icon" sizes="180x180" type="image/png" href="/apple-touch-icon.png"> --}}

    <link rel="stylesheet" href="/css/lending.css" />

    <link rel="canonical" href="{{ Request::url() }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @yield('head.og')


</head>
<body>

<main id="app">

    <div class="main-wrapper">

        @include('lending/includes/preloader')

        <div class="cabinet-mobile">
            <a href="/lc/login" class="footer__cabinet footer__link" target="_blank" rel="noopener">
                <span class="footer__cabinet-text">Личный кабинет</span>
            </a>
        </div>

        <div class="star-mask">
            <div class="star_big"></div>
            <div class="star_mid"></div>
            <div class="star_mini"></div>
            <div class="star_mini2 star_position1"></div>
            <div class="star_mini1 star_position2"></div>
            <div class="star_mini star_position3"></div>
            <div class="star_mini1 star_position4"></div>
            <div class="star_mini2 star_position5"></div>
            <div class="star_mini star_position6"></div>
            <div class="star_mini1 star_position7"></div>
            <div class="star_mini2 star_position8"></div>
            <div class="star_mini3 star_position9"></div>
            <div class="star_mini3 star_position10"></div>
            <div class="star_mini3 star_position11"></div>
        </div>

        @include('lending/includes/scroll_bar')

        @include('lending/components/modal')

        <header>
            @include('lending/includes/header')
        </header>

        @yield('content')

    </div>

        <footer class="p_rel">
            @include('lending/includes/footer')
        </footer>

</main>

@include('lending/includes/microdata/organization')

<script async src="/js/lending.js"></script>


@if (!config('app.debug'))

    @include('lending/includes/yandex_metrika')

    @include('lending/includes/google_analytics')

@endif

</body>
</html>
