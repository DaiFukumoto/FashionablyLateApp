@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') . '?v1.0.0' }}">
@endsection

@section('content')
<form action="/admin/search" method="get">
    @csrf
    <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}" />

    <select name="gender">
        <option value="" selected hidden>性別</option>
        <option value="">全て</option>
        @foreach (\App\Enums\Gender::cases() as $gender)
        <option value="{{ $gender->value }}">{{ $gender->label() }}</option>
        @endforeach
    </select>

    <select name="category_id">
        <option value="" selected hidden>お問い合わせの種類</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->content }}</option>
        @endforeach
    </select>

    <input type="date" name="date" value="{{ old('date') }}">

    <button>検索</button>
</form>

<button onclick="location.href='/admin'">リセット</button>

<button>エクスポート</button>

{{ $contacts->appends(request()->query())->links('vendor.pagination.default') }}

<table>
    <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
    </tr>
    @foreach ($contacts as $contact)
    <tr>
        <td>{{ $contact->first_name . '　' . $contact->last_name }}</td>
        <td>{{ $contact->gender->label() }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->category->content }}</td>
        <td>
            <button data-toggle="modal" data-target="#detailModal" data-id="{{ $contact->id }}" data-name="{{ $contact->first_name . '　' . $contact->last_name }}" data-gender="{{ $contact->gender->label() }}" data-email="{{ $contact->email }}" data-tell="{{ $contact->tell }}" data-address="{{ $contact->address }}" data-building="{{ $contact->building }}" data-category="{{ $contact->category->content }}" data-detail="{{ $contact->detail }}">詳細</button>
        </td>
    </tr>
    @endforeach
</table>

<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <th>お名前</th>
                        <th class="modal-name"></th>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <th class="modal-gender"></th>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <th class="modal-email"></th>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <th class="modal-tell"></th>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <th class="modal-address"></th>
                    </tr>
                    <tr>
                        <th>建物名</th>
                        <th class="modal-building"></th>
                    </tr>
                    <tr>
                        <th>お問い合わせの種類</th>
                        <th class="modal-category"></th>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容</th>
                        <th class="modal-detail"></th>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <form class="form-inline" action="/admin/delete" method="post">
                    @csrf
                    <input type="hidden" class="modal-id" name="id" value="" />
                    <button type="submit">削除</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        $('#detailModal').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var gender = button.data('gender');
            var email = button.data('email');
            var tell = button.data('tell');
            var address = button.data('address');
            var building = button.data('building');
            var category = button.data('category');
            var detail = button.data('detail');

            document.querySelector('.modal-id').value = id;
            $('.modal-name').text(name).val(name);
            $('.modal-gender').text(gender).val(gender);
            $('.modal-email').text(email).val(email);
            $('.modal-tell').text(tell).val(tell);
            $('.modal-address').text(address).val(address);
            $('.modal-building').text(building).val(building);
            $('.modal-category').text(category).val(category);
            $('.modal-detail').text(detail).val(detail);
        });
    }
</script>
@endsection