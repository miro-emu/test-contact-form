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
    <h2 class="admin-title">Admin</h2>


    <div class="search-item">
        <form class="search-form" action="/contacts/search" method="GET">
            @csrf

            <div class="search-form__item">
                <input class="search-form__item-keyword" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}">

                <div class="select-icon">
                    <select class="search-form__item-gender" name="gender">
                        <option value="">性別</option>
                        <option value="">全て</option>
                        <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                        <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                        <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
                    </select>
                </div>

                <div class="select-icon">
                    <select class="search-form__item-category" name="category_id">
                        <option value="">お問い合わせの種類</option>
                            @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="select-icon">
                    <input class="search-form__item-date" type="date" name="date" value="{{ request('date') }}">
                </div>
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
            <div class="search-form__button">
                <a class="search-form__reset"href="/reset">リセット</a>
            </div>

        </form>
        <div class="page-item">
            <div class="page-item__button">
                <a class="page-item__export" href="{{ route('admin.export') }}">エクスポート</a>
            </div>

            <div class="paginate">
                {{ $contacts->links() }}
            </div>
        </div>

        <table class="admin-table">
            <tr class="table-header">
                <th class="table-header-name">お名前</th>
                <th class="table-header-gender">性別</th>
                <th class="table-header-email">メールアドレス</th>
                <th class="table-header-category">お問い合わせの種類</th>
                <th class="table-header-detail"> </th>
            </tr>
            @foreach ($contacts as $contact)
            <tr class="table-content">
                <td class="table-content-name">{{$contact->last_name}} {{$contact->first_name}}</td>
                <td class="table-content-gender">{{$contact->gender_text}}</td>
                <td class="table-content-email">{{$contact->email}}</td>
                <td class="table-content-category">{{ $contact->category->content }}</td>
                <td class="table-content-detail">
                    <a class="table-content-button" href="{{ route('admin', ['contact_id' => $contact->id]) }}">詳細</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@if ($showModal)
<div class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close">
                <a class="modal-close__button" href="/admin">×</a>
            </div>
            <table class="modal-table">
                <tr class="modal-table-row">
                    <th class="modal-table-header">お名前</th>
                    <td class="modal-table-content">{{ $selectedContact->last_name }} {{ $selectedContact->first_name }}</td>
                </tr>
                <tr class="modal-table-row">
                    <th class="modal-table-header">性別</th>
                    <td class="modal-table-content">{{ $selectedContact->gender_text }}</td>
                </tr>
                <tr class="modal-table-row">
                    <th class="modal-table-header">メールアドレス</th>
                    <td class="modal-table-content">{{ $selectedContact->email }}</td>
                </tr>
                <tr class="modal-table-row">
                    <th class="modal-table-header">電話番号</th>
                    <td class="modal-table-content">{{ $selectedContact->tel }}</td>
                </tr>
                <tr class="modal-table-row">
                    <th class="modal-table-header">住所</th>
                    <td class="modal-table-content">{{ $selectedContact->address }}</td>
                </tr>
                <tr class="modal-table-row">
                    <th class="modal-table-header">建物名</th>
                    <td class="modal-table-content">{{ $selectedContact->building }}</td>
                </tr>
                <tr class="modal-table-row">
                    <th class="modal-table-header">お問い合わせの種類</th>
                    <td class="modal-table-content">{{ $selectedContact->category->content }}</td>
                </tr>
                <tr class="modal-table-row">
                    <th class="modal-table-header">お問い合わせの内容</th>
                    <td class="modal-table-content">{{ $selectedContact->detail }}</td>
                </tr>
            </table>
            <form class="delete-form"  action="/delete?id={{$contact->id}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $selectedContact['id'] }}" />
                <button class="delete-button">削除</button>
            </form>
        </div>
    </div>
</div>
@endif
@endsection

