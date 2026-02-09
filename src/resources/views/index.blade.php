@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}"/>
@endsection

@section('content')
<div class="contact-form__content">
    <h2 class="contact-form__title">Contact</h2>
<!-- 入力フォーム -->
    <form class="form" action="/confirm" method="POST" @submit.prevent novalidate>
    @csrf
        <div class="form-table">
            <table class="form-table__inner">
                <tr class="form-table__row">
                    <th class="form-table__header">お名前<span class="form-table__header--span">※</span></th>
                    <td class="form-table__name">
                        <div class="name-wrapper">
                            <div class="form-table__name--last">
                                <input class="name-input" type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}">
                                <div class="form__error">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-table__name--first">
                                <input class="name-input" type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}">
                                <div class="form__error">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="form-table__row">
                    <th class="form-table__header">性別<span class="form-table__header--span">※</span></th>
                    <td class="form-table__gender">
                        <label><input class="gender-input" type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>男性</label>
                        <label><input class="gender-input" type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>女性</label>
                        <label><input class="gender-input" type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}>その他</label>
                        <div class="form__error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                        </div>
                    </td>
                </tr>
                <tr class="form-table__row">
                    <th class="form-table__header">メールアドレス<span class="form-table__header--span">※</span></th>
                    <td class="form-table__email">
                        <input class="tel-input" type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                        <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                        </div>
                    </td>
                </tr>
                <tr class="form-table__row">
                    <th class="form-table__header">電話番号<span class="form-table__header--span">※</span></th>
                    <td class="form-table__tel">
                        <div class="tel-wrapper">

                            <div class="tel-block">
                                <input class="tel-input" type="tel" name="tel1" maxlength="4" placeholder="080" value="{{ old('tel1') }}">
                                <div class="form__error">
                                    @error('tel1') {{ $message }} @enderror
                                </div>
                            </div>

                            <span>-</span>

                            <div class="tel-block">
                                <input class="tel-input" type="tel" name="tel2" maxlength="4" placeholder="1234" value="{{ old('tel2') }}">
                                <div class="form__error">
                                    @error('tel2') {{ $message }} @enderror
                                </div>
                            </div>

                            <span>-</span>

                            <div class="tel-block">
                                <input class="tel-input" type="tel" name="tel3" maxlength="4" placeholder="5678" value="{{ old('tel3') }}">
                                <div class="form__error">
                                    @error('tel3') {{ $message }} @enderror
                                </div>
                            </div>

                        </div>
                    </td>

                </tr>
                <tr class="form-table__row">
                    <th class="form-table__header">住所<span class="form-table__header--span">※</span></th>
                    <td class="form-table__address">
                        <input class="address-input" type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                        <div class="form__error">
                        @error('address')
                        {{ $message }}
                        @enderror
                        </div>
                    </td>
                </tr>
                <tr class="form-table__row">
                    <th class="form-table__header">建物名</th>
                    <td class="form-table__building">
                        <input class="building-input" type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
                    </td>
                </tr>
                <tr class="form-table__row">
                    <th class="form-table__header">お問い合わせの種類<span class="form-table__header--span">※</span></th>
                    <td class="form-table__category">
                        <select class="category-select" name="category_id">
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category['content'] }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form__error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                        </div>
                    </td>
                </tr>
                <tr class="form-table__row">
                    <th class="form-table__header">お問い合わせ内容<span class="form-table__header--span">※</span></th>
                    <td class="form-table__content">
                        <textarea class="content-textarea" name="detail" placeholder="お問い合わせ内容をご記載ください"  >{{ old('detail') }}</textarea>
                        <div class="form__error">
                        @error('detail')
                        {{ $message }}
                        @enderror
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    <!-- 確認ボタン -->
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection