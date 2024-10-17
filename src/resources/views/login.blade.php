@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class = "confirm__content">
    <div class = "confirm__heading">
        <h2>Login</h2>
    </div>

    <form class = "form" action = "/contacts" method = "POST">
        @csrf
        <div class = "confirm-table">
            <table class = "confirm-table__inner">
                <tr class = "confirm-table__row">
                    <th class = "confirm-table__header">メールアドレス</th>
                    <td class = "confirm-table__text">
                        <input type = "email" name = "email" value = "{{$contact['email']}}" readonly>
                    </td>
                </tr>

                <tr class = "confirm-table__row">
                    <th class = "confirm-table__header">パスワード</th>
                    <td class = "confirm-table__text">
                        <input type = "password" name= "password" value = "{{$contact['password']}}" readonly>
                    </td>
                </tr>
            </table>
        </div>

        <div class = "form__button">
            <button class = "form__button-submit" type = "submit">ログイン</button>
        </div>
    </form>
</div>

@endsection

</body>
</html>