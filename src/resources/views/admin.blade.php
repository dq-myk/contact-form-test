@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

<!--管理画面-->

<div class = "contact-form__content">
    <div class = "contact-form__heading">
        <h2>Admin</h2>
    </div>

@section('content')

<!--メッセージ機能-->
<div class = "attendance__alert">
</div>

<form class = "search-form" action = "/todos/search" method = "GET">
        @csrf
        <div class ="search-form__item">
            <input class ="search-form__item-input" type = "text" name = "keyword" value = "{{ old('keyword') }}">
        </div>

        <div>
            <select class = "search-form__item-select" name="gender">
                <option value = "">性別</option>
                @foreach($categories as $category)
                    <option value = "{{ $contacts['gender'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class ="search-form__item">
            <input class ="search-form__item-input" type = "text" name = "keyword" value = "{{ old('keyword') }}">
            <select class = "search-form__item-select" name="category_id">
                <option value = "">お問い合わせの種類</option>
                @foreach($categories as $category)
                    <option value = "{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class ="search-form__item">
            <input name="date" type="date" value = "年/月/日">
        </div>

        <div class = "search-form__button">
            <button class = "search-form__button-submit" type = "submit">検索</button>
        </div>

        <div class = "reset-form__button">
            <button class = "reset-form__button-submit" type = "submit">リセット</button>
        </div>
    </form>

    <form>
        <!--エクスポートボタンとページネーション-->
        <div class = "export-form__button">
            <button class = "export-form__button-submit" type = "submit">エクスポート</button>
        </div>

        {{ $contacts->links() }}
    </form>

<div class = "admin__content">
    <div class = "admin-table">
        <table class = "admin-table__inner">
            <tr class = "admin-table__row">
                <th class = "admin-table__header">お名前</th>
                <th class = "admin-table__header">性別</th>
                <th class = "admin-table__header">メールアドレス</th>
                <th class = "admin-table__header">お問い合わせの種類</th>
                <th class = "admin-table__header"></th>
            </tr>

            <tr class = "admin-table__row">
                <td class = "admin-table__item">
                    <div class = "admin-form__item">
                        <input class = "admin-form__item-input" type = "text" name = "name" value ="{{ $contact['name'] }}">
                        <input type = "hidden" name = "id" value = "{{ $contact['id'] }}">
                    </div>
                </td>
                <td class = "admin-table__item">
                    <div class = "admin-form__item">
                        <input class = "admin-form__item-input" type = "text" name = "gender" value ="{{ $contact['gender'] }}">
                        <input type = "hidden" name = "id" value = "{{ $contact['id'] }}">
                    </div>
                </td>
                <td class = "admin-table__item">
                    <div class = "admin-form__item">
                        <input class = "admin-form__item-input" type = "text" name = "email" value ="{{ $contact['email'] }}">
                        <input type = "hidden" name = "id" value = "{{ $contact['id'] }}">
                    </div>
                </td>
                <td class = "admin-table__item">
                    <div class = "admin-form__item">
                        <p class = "admin-form__item-p">{{ $contect['category']['name'] }}</p>
                    </div>
                </td>
                <td class = "admin-table__item">
                    <div>
                        <button class = "modal__button-submit" type = "submit"><a href="#modal">詳細</a></button>
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
                                                    <input class = "modal-form__item-input" type = "text" name = "name" value ="{{ $contact['name'] }}">
                                                    <input type = "hidden" name = "id" value = "{{ $contact['id'] }}">
                                                </div>
                                            </td>
                                            <td class = "modal-table__item">
                                                <div class = "modal-form__item">
                                                    <input class = "modal-form__item-input" type = "text" name = "gender" value ="{{ $contact['gender'] }}">
                                                    <input type = "hidden" name = "id" value = "{{ $contact['id'] }}">
                                                </div>
                                            </td>
                                            <td class = "modal-table__item">
                                                <div class = "modal-form__item">
                                                    <input class = "modal-form__item-input" type = "text" name = "email" value ="{{ $contact['email'] }}">
                                                    <input type = "hidden" name = "id" value = "{{ $contact['id'] }}">
                                                </div>
                                            </td>
                                            <td class = "modal-table__item">
                                                <div class = "modal-form__item">
                                                    <p class = "modal-form__item-p">{{ $contect['category']['name'] }}</p>
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
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection
</body>
</html>




