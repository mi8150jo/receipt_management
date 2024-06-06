@extends('layouts.app')
@section('content')

<div class="row">
    
    <div class="col-md-3">
        <form action="{{ route('receipt.store') }}" method="post">
            @include('receipt.form')
            <a href="{{ route('top') }}">キャンセル</a>
            <button type="submit">登録</button>
        </form>
    </div>

    <div class="col-md-9">

        <div class="alert alert-secondary d-flex justify-content-between align-items-center">
            <div>レシートの平均長さ：{{ number_format(\Auth::user()->receipts()->avg('length'), 1) }}cm</div>
            <div>最大値：{{ \Auth::user()->receipts()->max('length') }}cm</div>
            <div>最小値：{{ \Auth::user()->receipts()->min('length') }}cm</div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>レシートの長さ</th>
                    <th>登録日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($receipts as $receipt)
                <tr>
                    <td>{{ $receipt->length }}cm</td>
                    <td>{{ $receipt->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        <!-- ページネーション -->
        {{ $receipts->links() }}
        
    </div>
</div>

@endsection
