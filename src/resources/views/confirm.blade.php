<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
</head>

<body>
    <header class = "header">
        <div class = "header__inner">
            <div class = "header-utilities">
                <a class = "header__logo" href = "/">
                    FashionablyLate
                </a>
            </div>
        </div>
    </header>


<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">

<!--お問い合わせフォーム確認ページ-->


<div class="confirm__content">
    <div class="confirm__heading">
    <h2>Confirm</h2>
    </div>

    <form class="form" action="/contacts" method="post">
    @csrf
    <div class="confirm-table">
        <table class="confirm-table__inner">
        <tr class="confirm-table__row">
            <th class="confirm-table__header">お名前</th>
            <td class="confirm-table__text">
            <input type="text" name="name" value="{{ 'first_name' . '  ' . 'last_name' }}" readonly>
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
            <input type="email" name="email" value="{{ 'email' }}" readonly>
            </td>
        </tr>
        <tr class="confirm-table__row">
            <th class="confirm-table__header">電話番号</th>
            <td class="confirm-table__text">
            <input type="tel" name="tell" value="{{ 'tell' }}" readonly>
            </td>
        </tr>
        <tr class="confirm-table__row">
            <th class="confirm-table__header">住所</th>
            <td class="confirm-table__text">
            <input type="text" name="address" value="{{ 'address' }}" readonly>
            </td>
        </tr>
        <tr class="confirm-table__row">
            <th class="confirm-table__header">建物名</th>
            <td class="confirm-table__text">
            <input type="text" name="building" value="{{ 'building' }}" readonly>
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
            <input type="text" name="content" value="{{ 'content' }}" readonly>
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
</body>
</html>