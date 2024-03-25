@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-3">
            <form action="{{ route('register') }}" method="post">
                <h1 class="h3 mt-5 mb-3 fw-normal text-center">会員登録</h1>
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="name" placeholder="ユーザー名" value="{{ old('name') }}">
                    <label for="floatingInput">ユーザー名</label>
                </div>

                <div class="form-floating mt-3">
                    <input type="email" class="form-control" name="email" id="floatingPassword" placeholder="メールアドレス" value="{{ old('email') }}">
                    <label for="floatingPassword">メールアドレス</label>
                </div>

                <div class="form-floating mt-3">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="パスワード">
                    <label for="floatingPassword">パスワード</label>
                </div>

                <div class="form-floating mt-3">
                    <input type="password" class="form-control" name="password_confirmation" id="floatingPassword" placeholder="パスワード（確認用）">
                    <label for="floatingPassword">パスワード（確認用）</label>
                </div>

                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">登録する</button>
                <a href="/" class="btn btn-secondary w-100 py-2 mt-3" role="button">キャンセル</a>
            </form>
        </div>
    </div>
</div>
@endsection()