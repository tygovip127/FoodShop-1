<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        //Statistic transactions
        $transactions = Transaction::all();
        $total_transactions = $transactions->count();
        $total_money_today = $transactions->where('sell_time','>=', now(-24+7))->sum('total');
        $total_money_last_day = $transactions->where('sell_time','<=', now(-24+7))->where('sell_time','>=', now(-24-24+7))->sum('total');
        if($total_money_last_day === 0)
        {
            $total_money_today_percent = '+'.'100';
        } else if($total_money_today - $total_money_last_day >= 0)
        {
            $total_money_today_percent = '+' . $total_money_today % $total_money_last_day * 100;
        } else
        {
            $total_money_today_percent = '-' . $total_money_today % $total_money_last_day * 100;
        }

        //Statistic users
        $users = User::all();
        $total_users = $users->count();
        $new_users_amount = $users->where('create_at','>=', now(-24+7))->count();

        return view('admin.dashboard', compact('total_transactions', 'total_money_today', 'total_money_today_percent', 'total_users', 'new_users_amount'));
    }
}
