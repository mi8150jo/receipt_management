<?php

namespace App\Http\Controllers;

use App\Models\Machines;
use App\Models\machine_user_relation;
use App\Models\User;
use App\Models\Receipts;
use Illuminate\Http\Request;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('machine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $machine = new Machines();
        $machine->name = $request->name;
        
        if($request->remaining_length == null){
            $machine->remaining_length = 6400;
        }else{
            $machine->remaining_length = $request->remaining_length;
            $machine->initial_remaining_length = $request->remaining_length;
        }

        $machine->save();

        // ログインしているユーザーのインスタンス
        $user = \Auth::user();
        // attachメソッドで中間テーブルに追加
        $user->user_to_machine()->attach($machine->id);

        return redirect(route('top'));
    }

    public function increment(Machines $machine)
    {
        // 発行回数を+1
        $machine->increment('issue_count');

        // receiptテーブルのlengthの平均値を取得する
        $averageLength = \Auth::user()->receipts()->avg('length');

        $machine->remaining_length -= $averageLength;
        $machine->save();

        return redirect(route('top'));
    }

    public function decrement(Machines $machine)
    {
        // 発行回数が0の時デクリメントできないようにリダイレクトする
        if ($machine->issue_count == 0){
            return redirect(route('top'));
        }

        // 発行回数を-1
        $machine->decrement('issue_count');

        // receiptテーブルのlengthの平均値を取得する
        $averageLength = \Auth::user()->receipts()->avg('length');

        $machine->remaining_length += $averageLength;
        $machine->save();

        return redirect(route('top'));
    }
    

    public function reset(Machines $machine)
    {
        // 累計発行回数に発行回数を追加
        $machine->total_issue_count += $machine->issue_count;

        // 初期値にリセット
        $machine->issue_count = 0;
        $machine->remaining_length = $machine->initial_remaining_length;
        $machine->save();
        
        return redirect(route('top'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function show(Machines $machines)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function edit(Machines $machines)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Machines $machines)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machines $machine)
    {
        $machine->delete();
        return redirect(route('top'));
    }
}
