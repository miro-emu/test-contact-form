@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/logout.css') }}"/>
@endsection

@section('content')
<div class="logout-content">
    <div class="logout-message">
        <h2 class="logout-text">ログアウトしました</h2>
    </div>
    <div class="login-page">
        <a class="login-page-button" href="/login">login画面へ戻る</a>
    </div>
</div>
@endsection