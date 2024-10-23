@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

    <!--お問い合わせフォーム入力ページ-->


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
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>Contact</h2>
        </div>

        <form class="form" action="contacts/confirm" method="post" novalidate>
        @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class = form__group-content--name>
                        <div class="form__input--name">
                            <input type="text" name="first_name" placeholder="例:山田" value="{{ old('first_name') }}" />
                        </div>

                        <div class="form__input--name">
                            <input type="text" name="last_name" placeholder="例:太郎" value="{{ old('last_name') }}" />
                        </div>
                    </div>

                    <div class="name-form__error">
                        @error('first_name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-radio">
                    <div class="form__input--radio">
                        <label><input type="radio" name="gender" value = "0" required>男性</label>
                        <label><input type="radio" name="gender" value = "1">女性</label>
                        <label><input type="radio" name="gender" value = "2">その他</label>
                    </div>

                    <div class="form__error">
                        @error('jender')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>

                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
                    </div>

                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">電話番号</span>
                    <span class="form__label--required">※</span>
                </div>

                <div class="form__group-content">
                    <div class="form__input--tel">
                        <input type="tel" name="tell" placeholder="080" value="{{ old('tell') }}" />  -  <input type="tel" name="tell" placeholder="1234" value="{{ old('tell') }}" />  -  <input type="tel" name="tell" placeholder="5678" value="{{ old('tell') }}" />
                    </div>
                    <div class="form__error">
                        @error('tell')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>

                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                    </div>
                    <div class="form__error">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>

                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
                    </div>
                    <div class="form__error">
                        @error('building')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせの種類</span>
                    <span class="form__label--required">※</span>
                </div>

                <div class="form__group-content">
                    <div class="form__input--text">
                        <select class = "form__item-category" name="category_id">
                            <option value = "">お問い合わせの種類</option>
                            @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form__error">
                        @error('category')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせ内容</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    </div>

                    <div class="form__error">
                        @error('detail')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                </div>
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">確認画面</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>