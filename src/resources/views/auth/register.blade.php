@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<header class = "header">
    <div class = "header__inner">
        <div class = "header-utilities">
            <div class = "header__logo">
                <h1>FashionablyLate</h1>
            </div>

            <div class = header-login>
            <button class = "header-register__button">
                <a class = "header-register__link" href = "/login">login</a>
            </button>
            </div>
        </div>
    </div>
</header>


<main>
    <div class = "register__content">
        <div class = "register__heading">
            <h2>Register</h2>
        </div>

        <form class = "form" action = "/register" method = "POST" novalidate>
            @csrf
            <div class = "register-form">
                <div class = "register-form__inner">
                    <div class = "register-form-title">
                        <span class = "form__label--item">お名前</span>
                    </div>

                    <div class = "register-form-content">
                        <div class = "form__input--text">
                            <input type = "text" name= "name" placeholder = "例:山田  太郎" value = "{{ old('name') }}">
                        </div>

                        <div class = "form__error">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class = "register-form">
                <div class = "register-form__inner">
                    <div class = "register-form-title">
                        <span class = "form__label--item">メールアドレス</span>
                    </div>

                    <div class = "register-form-content">
                        <div class = "form__input--text">
                            <input type = "email" name= "email" placeholder = "例:test@example.com" value = "{{ old('email') }}">
                        </div>

                        <div class = "form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class = "register-form">
                <div class = "register-form__inner">
                    <div class = "register-form-title">
                        <span class = "form__label--item">パスワード</span>
                    </div>

                    <div class = "register-form-content">
                        <div class = "form__input--text">
                            <input type = "password" name= "password" placeholder="例:coachtech1106">
                        </div>

                        <div class = "form__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!--
            <div class = "register__button">
                <button class = "register__button-submit" type = "submit">
                    <a class = "register__button-link" href = "/login">登録</a>
                </button>
            </div>-->

            <div class = "register__button">
            <button class = "register__button-submit" type = "submit">登録</button>
        </div>
        </form>
    </div>
</main>

@endsection


