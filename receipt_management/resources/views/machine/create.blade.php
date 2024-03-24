@extends('layouts.app')
@section('content')
<main class="container">
    <form action="{{ route('machine.store') }}" method="post">
        @include('machine.form')
        <button type="submit">投稿する</button>
        <a href="{{ route('top') }}">キャンセル</a>
    </form>
</main>
@endsection()