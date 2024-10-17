<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

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

<!--お問い合わせフォーム入力ページ-->

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>

    <form class="form" action="contacts/confirm" method="post">
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

                <div class="form__error">
                    @error('last_name')
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
                    <label><input type="radio" name="jender" value = "男性">男性</label>
                    <label><input type="radio" name="jender" value = "女性">女性</label>
                    <label><input type="radio" name="jender" value = "その他">その他</label>
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
                    <input type="tel" name="tel" placeholder="080" value="{{ old('tel') }}" />  -  <input type="tel" name="tel" placeholder="1234" value="{{ old('tel') }}" />  -  <input type="tel" name="tel" placeholder="5678" value="{{ old('tel') }}" />
                </div>
                <div class="form__error">
                    @error('tel')
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
                    <input type = "text" name = "category" placeholder="選択してください" value ="{{ old('category') }}">
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
                    <textarea name="content" placeholder="お問い合わせ内容をご記載ください">{{ old('content') }}</textarea>
                </div>

                <div class="form__error">
                    @error('content')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>