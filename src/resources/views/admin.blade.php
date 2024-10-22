@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

<!--管理画面-->



@section('content')

<header class = "header">
    <div class = "header__inner">
        <div class = "header-utilities">
            <div class = "header__logo">
                <h1>FashionablyLate</h1>
            </div>

            <div class = header-logout>
                <button class = "header-logout__button">
                    <a class = "header-logout__link" href = "/login">logout</a>
                </button>
            </div>
        </div>
    </div>
</header>

<div class = "admin__content">
    <div class = "admin__heading">
        <h2>Admin</h2>
</div>

<main>
    <form class = "search-form" action = "/admin" method = "GET">
        @csrf
        <div class = "search-form__group">
            <div class = "search-form__innner">
                <div class ="search-form__item">
                    <input class ="search-form__item-input" type = "text" name = "keyword" value = "名前やメールアドレスを入力して下さい">
                </div>

                <div>
                    <select class = "search-form__item-gender" name="gender">
                        <option value = "">性別</option>
                        @foreach ($contacts as $contact)

                        @php
                        switch ((int) $contact->gender) {
                        case 0:
                            $genderText = '男性';
                            break;
                        case 1:
                            $genderText = '女性';
                            break;
                        case 2:
                            $genderText = 'その他';
                            break;
                        }
                        @endphp

                            <option value = "{{ 'genderText' }}"></option>
                        @endforeach
                    </select>
                </div>

                <div class ="search-form__item-category">
                    <select class = "search-form__item-category">
                        <option value = "">お問い合わせの種類</option>

                        <option value = "{{ 'id' }}"></option>

                    </select>
                </div>

                <div class ="search-form__item-date">
                    <input class = "search-date" name="date" type="date" value = "年/月/日">
                </div>
            </div>

            <div class = "search-form__button">
                <button class = "search__button-submit" type = "submit">検索</button>
            </div>

            <div class = "reset-form__button">
                <button class = "reset__button-submit" type = "submit">リセット</button>
            </div>
        </div>
    </form>

    <form>
        <!--エクスポートボタンとページネーション-->
        <div class = "items">
            <div class = "export-form__button">
                <button class = "export__button-submit" type = "submit">エクスポート</button>
            </div>

            <div class = "paginate">
                {{ $contacts->links('vendor.pagination.create') }}
            </div>
        </div>
    </form>

    <div class = "admin__table">
        <table class = "admin-table__inner">
                <tr class = "admin-table__row">
                    <th>
                        <span class = "admin-table__header">お名前</span>
                        <span class = "admin-table__header">性別</span>
                        <span class = "admin-table__header">メールアドレス</span>
                        <span class = "admin-table__header">お問い合わせの種類</span>
                        <span class = "admin-table__header"></span>
                    </th>
                </tr>
            @foreach ($contacts as $contact)
            <tr class = "admin-table__row">
                <td class = "admin-form">
                    <div class = "admin-form__item">
                        <p class = "admin-form__item-p">{{ $contact['last_name'] . '  ' . $contact['first_name'] }}</p>
                    </div>

                    @php
                    switch ((int) $contact->gender) {
                        case 0:
                            $genderText = '男性';
                            break;
                        case 1:
                            $genderText = '女性';
                            break;
                        case 2:
                            $genderText = 'その他';
                            break;
                        }
                    @endphp

                    <div class = "admin-form__item">
                        <p class = "admin-form__item-p">{{ $genderText }}</p>
                    </div>

                    <div class = "admin-form__item">
                        <p class = "admin-form__item-p">{{ $contact->email }}</p>
                    </div>

                    <div class = "admin-form__item">
                        <p class = "admin-form__item-categoryp">{{ $contact['category']['content'] }}</p>
                    </div>

                    <div>
                        <button class = "modal__button-submit" type = "submit">
                            <a class = "modal__link" href="#modal">詳細</a>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div id="modal">
        <div class="message-wrapper">
            <a href="#" class="close"></a>
            <div class="message-box">
                <table class = "modal-table__inner">
                    <tr class = "modal-table__row">
                        <th>
                            <div class = "modal-form__item">
                                <p class = "modal-table__header">お名前</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-table__header">性別</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-table__header">メールアドレス</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-table__header">電話番号</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-table__header">住所名</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-table__header">建物名</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-table__header">お問い合わせの種類</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-table__header">お問い合わせの内容</p>
                            </div>
                        </th>

                        <td class = "modal-table__item">
                            <div class = "modal-form__item">
                                <p class = "modal-form__item-p">{{ 'name' }}</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-form__item-p">{{ 'jender' }}</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-form__item-p">{{ 'email' }}</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-form__item-p">{{ 'tell' }}</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-form__item-p">{{ 'address' }}</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-form__item-p">{{ 'building' }}</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-form__item-p">{{ 'category' }}</p>
                            </div>

                            <div class = "modal-form__item">
                                <p class = "modal-form__item-p">{{ 'detail' }}</p>
                            </div>
                        </td>
                </table>


                <form class = "delete-form" action = "/contacts/delete" method = "POST">
                    @method('DELETE')
                    @csrf
                    <div class = "delete-form__button">
                        <button class = "delete-form__button-submit" type = "submit">削除</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
