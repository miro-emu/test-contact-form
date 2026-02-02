@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
@endsection

@section('header')
<nav class=header-item>
    <form action="/logout" method="post">
        @csrf
        <button class="logout-button">logout</button>
    </form>
</nav>
@endsection

@section('content')
<div class="admin-content">
    <h2 class="admin-title">admin</h2>


    <div class="search-item">
        <form class="search-form" action="/contacts/search" method="get">
            @csrf

            <div class="search-form__item">
                <input class="search-form__item-keyword" type="text" name="keyword" value="{{ old('keyword') }}">

                <select class="search-form__item-gender" name="gender">
                    <option value="">性別</option>
                    <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
                </select>

                <select class="search-form__item-category" name="category_id">
                    <option value="">カテゴリ</option>
                        @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                    @endforeach
                </select>

                <input class="search-form__item-date" type="date" name="date" value="{{ request('date') }}">
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
            <div class="search-form__button">
                <a class="search-form__reset"href="/reset">リセット</a>
            </div>

        </form>
        <div class="page-item">
            <div class="export-button">
                <a href="{{ route('admin.export') }}" class="btn btn-primary">エクスポート</a>
            </div>

            <div class="paginate">
                {{ $contacts->links() }}
            </div>
        </div>

        <table class="admin-table">
            <tr class="table-header">
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th> </th>
            </tr class="table-content">
            @foreach ($contacts as $contact)
            <tr>
                <td>{{$contact->last_name}} {{$contact->first_name}}</td>
                <td>{{$contact->gender}}</td>
                <td>{{$contact->email}}</td>
                <td>{{ $contact->category->content }}</td>
                <td>
                    <button>詳細</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection