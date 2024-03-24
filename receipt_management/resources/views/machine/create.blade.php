@extends('layouts.app')
@section('content')
<main class="container">
    <form action="{{ route('machine.store') }}" method="post">
        @include('machine.form')
        
        <a href="{{ route('top') }}">キャンセル</a>
        <button type="submit">登録</button>
    </form>
</main>
@endsection()