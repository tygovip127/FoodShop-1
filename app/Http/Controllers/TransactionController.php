<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->paginate(20);
        return view('admin.transactions-management', compact('transactions'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $transaction = Transaction::find($id);
        $orders= $transaction->orders;
        $data= array();
        forEach($orders as $order){
            $order->product;
            array_push($data, $order);
        }
        return $data;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => ['numeric', 'max:2'],
        ]);

        $data_transaction_update = [
            'status' => $request->status
        ];
        Transaction::find($id)->update($data_transaction_update);
        return redirect()->route('admin.transactions.index');
    }

    public function destroy($id)
    {
        //
    }
}
