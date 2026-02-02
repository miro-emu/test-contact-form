<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Form</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/common.css') }}" >
        @yield('css')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Andada+Pro:ital,wght@0,400..840;1,400..840&family=Sanchez:ital@0;1&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="header">
            <h1 class="header__logo">FashionablyLate</h1>
            @yield('header')
        </header>

        <main>
            @yield('content')
        </main>
    </body>
</html>