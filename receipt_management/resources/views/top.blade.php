@extends('layouts.app')
@section('content')

<p><a href="{{ route('receipt.create') }}">レシートの登録</a></p>
<p><a href="{{ route('machine.create') }}">機械の登録</a></p>

<div class="row row-cols-1 row-cols-md-3 g-4">
@foreach ($machines as $machine)
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $machine->name }}</h5>
        <p class="card-text">レシートの残量：{{ $machine->remaining_length }}cm</p>
        <p class="card-text">発行回数：{{ $machine->issue_count }}回</p>
        <p class="card-text">累計発行回数：{{ $machine->total_issue_count }}回</p>
        <form action="{{ route('machine.counter', $machine) }}" method="post">
            @csrf
            <button>発行</button>
        </form>
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('machine.delete', $machine) }}" method="post">
            @csrf
            @method('delete')
            <button>削除</button>
        </form>
        <form action="{{ route('machine.reset', $machine) }}" method="post">
            @csrf
            <button>リセット</button>
        </form>
      </div>
    </div>
  </div>
@endforeach
</div>

@endsection()