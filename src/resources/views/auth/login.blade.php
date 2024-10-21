@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<header class = "header">
    <div class = "header__inner">
        <div class = "header-utilities">
            <div class = "header__logo">
                <h1>FashionablyLate</h1>
            </div>

            <div class = header-register>
                <button class = "header-register__button">
                    <a class = "header-register__link" href = "/register">register</a>
                </button>
            </div>
        </div>
    </div>
</header>

<main>
    <div class = "login__content">
        <div class = "login__heading">
            <h2>Login</h2>
        </div>

        <form class = "form" action = "/login" method = "POST" novalidate>
            @csrf
            <div class = "login-table">
                <table class = "login-table__inner">
                    <tr class = "login-table__row">
                        <th class = "login-table__header">メールアドレス</th>
                    </tr>
                    <tr class = "login-table__row">
                        <td class = "login-table__text">
                            <input type = "email" name = "email" placeholder="例:test@example.com" >
                        </td>
                    </tr>

                    <tr class = "login-table__row">
                        <td class = "form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </td>
                    </tr>

                    <tr class = "login-table__row">
                        <th class = "login-table__header">パスワード</th>
                    </tr>
                    <tr class = "login-table__row">
                        <td class = "login-table__text">
                            <input type = "password" name= "password" placeholder="例:coachtech1106">
                        </td>
                    </tr>

                    <tr class = "login-table__row">
                        <td class = "form__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </td>
                    </tr>
                </table>
            </div>

            <div class = "form__button">
                <button class = "form__button-submit" type = "submit">ログイン</button>
            </div>
        </form>
    </div>
</main>

@endsection

