@extends('layouts.app')
@section('content')

<h3 class="mb-3">{{ \Auth::user()->name }}店</h3>
<div class="col">
    <div class="alert alert-secondary d-flex justify-content-between align-items-center">
        <div>レシートの平均長さ：{{ App\Models\Receipts::avg('length') }}</div>
        <div>
            <a class="btn btn-sm btn-success" href="{{ route('receipt.create') }}">レシートの登録</a>
            <a class="btn btn-sm btn-success" href="{{ route('machine.create') }}">機械の登録</a>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($machines as $machine)
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mt-2 card-title">{{ $machine->name }}</h5>
                    <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('machine.delete', $machine) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">削除</button>
                    </form>
                </div>
                <div class="card-body">

                    <p class="card-text">レシートの残量：{{ $machine->remaining_length }}cm</p>
                    <p class="card-text">発行回数：{{ $machine->issue_count }}回</p>
                    <p class="card-text">累計発行回数：{{ $machine->total_issue_count }}回</p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <form action="{{ route('machine.increment', $machine) }}" method="post" class="mr-2">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">発行回数 +1</button>
                    </form>
                    <form action="{{ route('machine.decrement', $machine) }}" method="post" class="mr-2">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">発行回数 -1</button>
                    </form>
                    <form action="{{ route('machine.reset', $machine) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">リセット</button>
                    </form>
                </div>
                
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection()