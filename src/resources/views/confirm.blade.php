@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

<!--お問い合わせフォーム確認ページ-->

<header class = "header">
    <div class = "header__inner">
        <div class = "header-utilities">
            <a class = "header__logo" href = "/">
                FashionablyLate
            </a>
        </div>
    </div>
</header>

<main>
    <div class="confirm__content">
        <div class="confirm__heading">
            <h2>Confirm</h2>
        </div>

        <form class="form" action="/contacts" method="post" novalidate>
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__text">
                <input type="text" name="name" value="{{ $contact['last_name'] . '  ' . $contact['first_name'] }}" readonly>
                </td>
            </tr>
            <!--
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__text">
                <input type="text" name="name" value="{{ 'last_name' }}" readonly>
                </td>
            </tr>-->

                @php
                if ($gender === '0') {
                    $genderText = '男性';
                } elseif ($gender === '1') {
                    $genderText = '女性';
                } else {
                    $genderText = 'その他';
                }
                @endphp

            <tr class="confirm-table__row">
                <th class="confirm-table__header">性別</th>
                <td class="confirm-table__text">
                <input type="text" name="gender" value="{{ $genderText }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__text">
                <input type="email" name="email" value="{{ $contact['email'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                <td class="confirm-table__text">
                <input type="tel" name="tell" value="{{ $contact['tell'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">住所</th>
                <td class="confirm-table__text">
                <input type="text" name="address" value="{{ $contact['address'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">建物名</th>
                <td class="confirm-table__text">
                <input type="text" name="building" value="{{ $contact['building'] }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせの種類</th>
                <td class="confirm-table__text">
                <input type="text" name="category" value="{{ $category }}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ内容</th>
                <td class="confirm-table__text">
                <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly>
                </td>
            </tr>
            </table>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
            <a href="/">修正</a>
        </div>
        </form>
    </div>
</main>
