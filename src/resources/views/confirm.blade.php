@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}"/>
@endsection

@section('content')
<div class="confirm-content">
    <h2 class="confirm__title">Confirm</h2>
    <form class=form action="/thanks" method="POST">
    @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <input class="table-content" type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                <input class="table-content" type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input class="table-content" type="text" name="name" value="{{ $contact['name'] }}" readonly />
                    </td>
                </tr>
                <input class="table-content" type="hidden" name="gender" value="{{ $contact['gender'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input class="table-content" type="text" name="gender_text" value="{{ $contact['gender_text'] }}"readonly  />
                    </td>
                </tr>
                <input class="table-content" type="hidden" name="email" value="{{ $contact['email'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input class="table-content" type="text" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                </tr>
                <input class="table-content" type="hidden" name="tel" value="{{ $contact['tel'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input class="table-content" type="text" name="tel" value="{{ $contact['tel'] }}" readonly />
                    </td>
                </tr>
                <input class="table-content" type="hidden" name="address" value="{{ $contact['address'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input class="table-content" type="text" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>
                <input class="table-content" type="hidden" name="building" value="{{ $contact['building'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input class="table-content" type="text" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
                </tr>
                <input class="table-content" type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input class="table-content" type="text" name="category" value="{{ $contact['category_content'] }}" readonly />
                    </td>
                </tr>
                <input class="table-content" type="hidden" name="detail" value="{{ $contact['detail'] }}">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input class="table-content" type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <div class="confirm-buttons">
        <form class="send-form" action="/thanks" method="POST">
            @csrf
            @foreach ($contact as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach

            <button class="form__button-submit" type="submit">送信</button>
        </form>

        <form class="modify-form" action="/" method="POST">
            @csrf
            @foreach ($contact as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <button class="modify__button-submit" type="submit">修正</button>
        </form>
    </div>

</div>

@endsection