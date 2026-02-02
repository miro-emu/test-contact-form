@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}"/>
@endsection

@section('header')
<nav class=header-item>
    <a class=login-button href="/login">login</a>
</nav>

@endsection

@section('content')
<div class="register-form__content">
    <h2 class="register-form__title">Register</h2>
    <div class="register-form">
        <form class="form" action="/register" method="POST">
        @csrf
            <div class="form-item">
                <h3 class="form-title">お名前</h3>
                <input type="text" name="name" placeholder="例:山田太郎" value="{{ old('name') }}">
                <div class="form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
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
            <div class=register-button>
                <button class=register-button__submit type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection