@extends('layouts.app')
@section('content')
<div class="welcome">
    <h1>ログインページ</h1>
    @auth
    <a class="btn" href="{{ route('top') }}">アプリへ</a>
    <a class="btn" href="{{ route('top') }}">アプリへ</a>
    @else
    <a class="btn" href="{{ route('register') }}">会員登録</a>
    <a class="btn" href="{{ route('login') }}">ログイン</a>
    @endauth
</div>
@endsection()