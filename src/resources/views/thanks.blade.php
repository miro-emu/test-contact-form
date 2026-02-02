<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Form</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/common.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" >
        @yield('css')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Andada+Pro:ital,wght@0,400..840;1,400..840&family=Sanchez:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
    <div>
        <div class="bg-text-wrapper">
            <span class="bg-text">Thank you</span>
            <div class="content">
                <p class="thanks-massage">お問い合わせありがとうございました</p>
                <a class="home-button" href="/">HOME</a>
            </div>
        </div>
    </div>
</body>
</html>
