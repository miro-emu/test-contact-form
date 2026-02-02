@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}"/>
@endsection

@section('header')
<nav class=header-item>
    <a class=register-button href="/register">register</a>
</nav>
@endsection

@section('content')
<div class="login-form__content">
    <h2 class="login-form__title">Login</h2>
    <div class="login-form">
        <form class="form" action="/login" method="POST">
            @csrf
            <div class="form-item">
                <h3 class="form-title">メールアドレス</h3>
                <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-item">
                <h3 class="form-title">パスワード</h3>
                <input type="text" name="password" placeholder="例:coachtech1106">
                <div class="form__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class=login-button>
                <button class=login-button__submit type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection