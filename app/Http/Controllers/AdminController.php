<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $order = Order::all();
        $totalOrder = $order->count('number');
        dd($totalOrder);
        return view('admin.dashboard', compact('order'));
    }
}
