@extends('layouts.app')
@section('content')
<main class="container">
    <form action="{{ route('receipt.store') }}" method="post">
        @include('receipt.form')
        
        <a href="{{ route('top') }}">キャンセル</a>
        <button type="submit">登録</button>
    </form>
</main>
@endsection()