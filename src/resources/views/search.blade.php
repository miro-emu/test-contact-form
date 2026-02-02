@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
@endsection

@section('header')
<nav class="header-item">
    <form action="/logout" method="post">
        @csrf
        <button class="logout-button">logout</button>
    </form>
</nav>
@endsection

@section('content')
<div class="admin-content">
    <h2 class="admin-title">search</h2>

    <div class="search-item">
        <form class="search-form" action="/contacts/search" method="get">

            <div class="search-form__item">

                <input class="search-form__item-input"
                        type="text"
                        name="keyword"
                        value="{{ request('keyword') }}"
                        placeholder="名前・メール・内容">

                <select class="search-form__item-select" name="gender">
                    <option value="">性別</option>
                    <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
                </select>

                <select class="search-form__item-select" name="category_id">
                    <option value="">カテゴリ</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                    @endforeach
                </select>

                {{-- 日付 --}}
                <input type="date" name="date" value="{{ request('date') }}">
            </div>

            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>

            <div class="search-form__button">
                <a class="search-form__reset" href="/reset">リセット</a>
            </div>

        </form>
    </div>

    <div class="page-item">
        <div class="paginate">
            {{ $contacts->appends(request()->query())->links() }}
        </div>
    </div>

    <table>
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
        </tr>

        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>

            <td>{{ $contact->gender_text }}</td>

            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->content }}</td>

            <td>
                <button>詳細</button>
            </td>
        </tr>
        @endforeach
    </table>

</div>
@endsection