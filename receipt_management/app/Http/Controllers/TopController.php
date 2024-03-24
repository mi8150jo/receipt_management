<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        $machines = \Auth::user()->user_to_machine()->get();
        $data = [
            'machines' => $machines,
        ];
        return view('top', $data);
    }
}
