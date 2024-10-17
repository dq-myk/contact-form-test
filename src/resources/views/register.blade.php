@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

<div class = "contact-form__content">
    <div class = "contact-form__heading">
        <h2>Register</h2>
    </div>

    <form class = "form" action = "/contacts/confirm" method = "POST">
        @csrf
        <div class = "form__group">
            <div class = "form__group-title">
                <span class = "form__label--item">お名前</span>
            </div>

            <div class = "form__group-content">
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

        <div class = "form__group">
            <div class = "form__group-title">
                <span class = "form__label--item">メールアドレス</span>
            </div>

            <div class = "form__group-content">
                <div class = "form__input--text">
                    <input type = "email" name= "email" placeholder = "test@example.com" value = "{{ old('email') }}">
                </div>

                <div class = "form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class = "form__group">
            <div class = "form__group-title">
                <span class = "form__label--item">パスワード</span>
            </div>

            <div class = "form__group-content">
                <div class = "form__input--text">
                    <input type = "password" name= "password" placeholder = "coachtech1106" value = "{{ old('tel') }}">
                </div>

                <div class = "form__error">
                    @error('tel')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class = "form__button">
            <button class = "form__button-submit" type = "submit">登録</button>
        </div>
    </form>
</div>

@endsection

</body>
</html>

