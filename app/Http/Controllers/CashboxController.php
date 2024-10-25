<?php

namespace App\Http\Controllers;

use App\Models\admin\Cashbox;
use Illuminate\Http\Request;

class CashboxController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'income' => 'required',
            'note' => 'nullable'
        ]);
        Cashbox::create([
            'institute_id' => session('institute_id'),
            'total' => $request->income,
            'note' => $request->note,
            'status' => 0,
        ]);
        flash()->success($request->income . ' tk added.');
        return redirect()->back();
    }

    public function expense(Request $request){
        $request->validate([
            'expense' => 'required',
            'note' => 'nullable'
        ]);
        Cashbox::create([
            'institute_id' => session('institute_id'),
            'total' => $request->expense,
            'note' => $request->note,
            'status' => 1,
        ]);
        flash()->success($request->expense . ' tk expense.');
        return redirect()->back();
    }
}
