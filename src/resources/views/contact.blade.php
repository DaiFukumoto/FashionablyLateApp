@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="例:山田" value="{{ old('first_name', $contact['first_name']) }}" />
                </div>
                <div class="form__error">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="last_name" placeholder="例:太郎" value="{{ old('last_name', $contact['last_name']) }}" />
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
            <div class="form__group-content">
                <div class="form__input--radio">
                    @php
                    $gender_cnt = 0;
                    @endphp
                    @foreach (\App\Enums\Gender::cases() as $gender)
                    @php
                    $gender_cnt++;
                    @endphp
                    <input type="radio" name="gender" value="{{ $gender->value }}" @if ($gender->value == old('gender', $contact['gender'])) checked @elseif ($gender_cnt == 1) checked @endif />{{ $gender->label() }}
                    @endforeach
                </div>
                <div class="form__error">
                    @error('gender')
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
                    <input type="text" name="email" placeholder="例:test@example.com" value="{{ old('email', $contact['email']) }}" />
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
                <div class="form__input--text">
                    <input type="tel" name="tell_1" placeholder="080" value="{{ old('tell_1', $contact['tell_1']) }}" />
                </div>
                <div class="form__error">
                    @error('tell_1')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <span>-</span>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="tel" name="tell_2" placeholder="1234" value="{{ old('tell_2', $contact['tell_2']) }}" />
                </div>
                <div class="form__error">
                    @error('tell_2')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <span>-</span>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="tel" name="tell_3" placeholder="5678" value="{{ old('tell_3', $contact['tell_3']) }}" />
                </div>
                <div class="form__error">
                    @error('tell_3')
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
                    <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', $contact['address']) }}" />
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
                    <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building', $contact['building']) }}" />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__select--select">
                    <select name="category_id">
                        <option value="" selected hidden>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == old('category_id', $contact['category_id'])) selected @endif >{{ $category->content }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    @error('category_id')
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
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail', $contact['detail']) }}</textarea>
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
    </form>
</div>
@endsection