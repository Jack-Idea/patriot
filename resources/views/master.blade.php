<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Спортивный комплекс Патриот"/>
    <meta property="og:description" content="Спортивный комплекс Патриот им. А.В.Фомина. Тренировки, спортивные соревнования для детей и взрослых." />
    <meta property="og:image" content="https://patriot-nvrsk.ru/img/fav.jpg" />
    <meta property="og:video:width" content="40" />
    <meta property="og:video:height" content="40" />
    <meta property="og:url" content= "https://patriot-nvrsk.ru/" />
    <meta name="keywords" content="

    ">

    <title>@yield('title')</title>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/css/uikit.min.css" />
    <!-- CSS -->
    <script src="{{ asset('js/tailwind.js') }}"></script>
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glob.css?v=1') }}" rel="stylesheet">
    @yield('css')

</head>
<body id="body">

    <div id="app" class="w-full relative app-container">
        <header-component></header-component>
        @yield('main')
    </div>


    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.17/dist/js/uikit-icons.min.js"></script>
    <!-- Scripts -->
    <script defer src="{{ asset('js/app.js?v=1') }}"></script>
    <script defer src="{{ asset('js/gsap.min.js?v=1') }}"></script>
    <script defer src="{{ asset('js/ScrollTrigger.min.js?v=1') }}"></script>
    <script defer src="{{ asset('js/Flip.min.js?v=1') }}"></script>
    <script defer src="{{ asset('js/ScrollSmoother.min.js?v=1') }}"></script>
    <script defer src="{{ asset('js/gsap.js?v=1') }}"></script>

</body>
</html>
