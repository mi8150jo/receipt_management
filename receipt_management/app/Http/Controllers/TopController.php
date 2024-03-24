<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        $machines = \Auth::user()->user_to_machine()->get();
        
        // 発行回数の合計
        $sum_issue_count = \Auth::user()->user_to_machine()->sum('issue_count');
        // 累計発行回数の合計
        $sum_total_issue_count = \Auth::user()->user_to_machine()->sum('total_issue_count');
        // レシートの平均長さ
        $receipts_average = \Auth::user()->receipts()->avg('length');

        // (発行回数の合計＋累計発行回数の合計)＊レシートの平均長さ＝レシートの総消費量
        $receipt_consumption = ($sum_issue_count + $sum_total_issue_count)*$receipts_average;
        // メートルに変換
        $receipt_consumption_meters = $receipt_consumption/100;
        // キロメートルに変換
        $receipt_consumption_kilometers = $receipt_consumption_meters/1000;

        // 少数を丸める
        $receipt_consumption = number_format($receipt_consumption, 1);
        $receipt_consumption_meters = number_format($receipt_consumption_meters, 1);
        $receipt_consumption_kilometers = number_format($receipt_consumption_kilometers, 1);

        $data = [
            'machines' => $machines,
            'receipt_consumption' => $receipt_consumption,
            'receipt_consumption_meters' => $receipt_consumption_meters,
            'receipt_consumption_kilometers' => $receipt_consumption_kilometers,
        ];
        return view('top', $data);
    }
}
