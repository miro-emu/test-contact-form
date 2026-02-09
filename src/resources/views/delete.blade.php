@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/delete.css') }}"/>
@endsection

@section('content')
<div>
    <div class="delete-message">
        <h2 class="delete-text">削除しました</h2>
    </div>
    <div class="delete-page">
        <a class="delete-page-button" href="/admin">Admin画面へ戻る</a>
    </div>
</div>
@endsection