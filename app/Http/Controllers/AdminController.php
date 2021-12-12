<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\StatisticReportTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Product;

class AdminController extends Controller
{
    use StatisticReportTrait;

    public function index()
    {
        //set time format today yyyy-mm-dd 00:00:00.0 UTC (+00:00)
        $_0h_today = now()->setTime(0, 0, 0);
        $_0h_last_day = now()->setTime(-24, 0, 0);

        //Statistic transactions
        $transactions = Transaction::all();
        $total_money_today = $transactions->where('created_at', '>=', $_0h_today)->sum('total');
        $total_money_last_day = $transactions->where('created_at', '<=', now()->subHours(24))->where('created_at', '>=', $_0h_last_day)->sum('total');
        $total_money_today_percent = $this->statisticChangePercent($total_money_today, $total_money_last_day);

        //Statistic orders

        $orders = Order::all();
        $total_orders = $orders->count();
        $total_orders_today =  $orders->where('created_at', '>=', $_0h_today)->count();
        $total_orders_last_day = $orders->where('created_at', '<=', now()->subHours(24))->where('created_at', '>=', $_0h_last_day)->count();
        $total_orders_today_percent = $this->statisticChangePercent($total_orders_today, $total_orders_last_day);
        // dd($total_orders_last_day);
        //Statistic users
        $users = User::all();
        $total_users = $users->count();
        $new_users_amount = $users->where('create_at', '>=', $_0h_today)->count();

        //Statistic sales chart in this month
        $dates = [];
        $days_in_month = now()->daysInMonth;
        for ($i = 1; $i <= $days_in_month; $i++) {
            $dates[] = $i;
        }
        $sales = [];
        $date_now = now()->format('d');
        for ($i = 1; $i <= $date_now; $i++) {
            if ($i < 10) {
                $sales[] = DB::table('orders')->where('created_at', 'like', '%' . now()->format('Y-m-') . 0 . $i . '%')->count();
            } else {
                $sales[] = DB::table('orders')->where('created_at', 'like', '%' . now()->format('Y-m-') . $i . '%')->count();
            }
        }

        //Statistic most order users
        $users = DB::table('users')
            ->leftJoin('transactions', 'transactions.user_id', '=', 'users.id')
            ->selectRaw('users.id, username, fullname, sum(total) as spent')
            ->groupBy('users.id')->orderBy('spent', 'desc')
            ->take(5)
            ->get();

        //Statistic most view products
        $products = DB::table('products')->orderBy('view', 'desc')->take(5)->get();
        
        //Statistic order request
        $transaction_requests = Transaction::latest()->take(10)->get();
        $total_done_transactions = Transaction::where('status', 2)->count();
        $total_approved_transactions = Transaction::where('status', 1)->count();
        $total_waiting_transactions = Transaction::where('status', 0)->count();
        $data = [
            'total_orders_today',
            'total_orders_last_day',
            'total_money_today',
            'total_money_last_day',
            'total_money_today_percent',
            'total_users',
            'new_users_amount',
            'total_orders_today_percent',
            'dates',
            'sales',
            'users',
            'products',
            'transaction_requests',
            'total_done_transactions',
            'total_approved_transactions',
            'total_waiting_transactions'
        ];
        return view('admin.dashboard', compact($data));
    }
}
