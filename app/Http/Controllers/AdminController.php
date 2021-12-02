<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        Order::latest()->limit(5)->get();
        return view('admin.dashboard');
    }
}
