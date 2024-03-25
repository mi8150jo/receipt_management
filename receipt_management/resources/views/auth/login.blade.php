@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-3">
            <form action="{{ route('login') }}" method="post">
                <h1 class="h3 mt-5 mb-3 fw-normal text-center">ログイン</h1>
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="floatingInput">メールアドレス</label>
                </div>

                <div class="form-floating mt-3">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">パスワード</label>
                </div>

                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">ログイン</button>
                <a href="/" class="btn btn-secondary w-100 py-2 mt-3" role="button">キャンセル</a>
            </form>
        </div>
    </div>
</div>

@endsection()