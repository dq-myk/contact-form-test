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
                            <option value = "{{ 'gender' }}"></option>
                    </select>
                </div>

                <div class ="search-form__item-category">

                    <select class = "search-form__item-category" name="category_id">
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
                <th class = "admin-table__header">お名前</th>
                <th class = "admin-table__header">性別</th>
                <th class = "admin-table__header">メールアドレス</th>
                <th class = "admin-table__header">お問い合わせの種類</th>
                <th class = "admin-table__header"></th>
            </tr>

            <tr class = "adminup-table__row">
                <td class = "adminup-table__item">
                    <form class = "update-form" action = "/contacts/update" method = "POST">
                            @method('PATCH')
                            @csrf
                        <div class = "admin-form__item">
                            <input class = "admin-form__item-input" type = "text" name = "name" value ="{{ 'name' }}">
                            <input type = "hidden" name = "id" value = "{{ 'id' }}">
                        </div>

                        <div class = "admin-form__item">
                            <input class = "admin-form__item-input" type = "text" name = "gender" value ="{{ 'gender' }}">
                            <input type = "hidden" name = "id" value = "{{ 'id' }}">
                        </div>

                        <div class = "admin-form__item">
                            <input class = "admin-form__item-input" type = "text" name = "email" value ="{{ 'email' }}">
                            <input type = "hidden" name = "id" value = "{{ 'id' }}">
                        </div>

                        <div class = "admin-form__item">
                            <p class = "update-form__item-p">{{ 'category' }}</p>
                        </div>

                        <div>
                            <button class = "modal__button-submit" type = "submit"><a href="#modal">詳細</a></button>
                        </div>
                    </form>
                </td>

                <td>
                    <div id="modal">
                        <div class="message-wrapper">
                            <a href="#" class="close"></a>
                            <div class="message-box">
                                <table class = "modal-table__inner">
                                    <tr class = "modal-table__row">
                                        <th class = "modal-table__header">お名前</th>
                                        <th class = "modal-table__header">性別</th>
                                        <th class = "modal-table__header">メールアドレス</th>
                                        <th class = "modal-table__header">お問い合わせの種類</th>
                                        <th class = "modal-table__header"></th>
                                    </tr>

                                    <tr class = "modal-table__row">
                                        <td class = "modal-table__item">
                                            <div class = "modal-form__item">
                                                <input class = "modal-form__item-input" type = "text" name = "name" value ="{{ 'name' }}">
                                                <input type = "hidden" name = "id" value = "{{ 'id' }}">
                                            </div>
                                        </td>
                                        <td class = "modal-table__item">
                                            <div class = "modal-form__item">
                                                <input class = "modal-form__item-input" type = "text" name = "gender" value ="{{ 'gender' }}">
                                                <input type = "hidden" name = "id" value = "{{ 'id' }}">
                                            </div>
                                        </td>
                                        <td class = "modal-table__item">
                                            <div class = "modal-form__item">
                                                <input class = "modal-form__item-input" type = "text" name = "email" value ="{{ 'email' }}">
                                                <input type = "hidden" name = "id" value = "{{ 'id' }}">
                                            </div>
                                        </td>
                                        <td class = "modal-table__item">
                                            <div class = "modal-form__item">
                                                <div class = "admin-form__item">
                                                    <p class = "update-form__item-p">{{ 'category' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <form class = "delete-form" action = "/contacts/delete" method = "POST">
                            @method('DELETE')
                            @csrf
                            <div class = "delete-form__button">
                                <button class = "delete-form__button-submit" type = "submit">削除</button>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</main>
@endsection
