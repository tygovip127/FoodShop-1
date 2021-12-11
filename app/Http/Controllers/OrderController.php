<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Province;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Voucher;

class OrderController extends Controller
{
    public function index()
    {
        $address = Auth::user() ? AddressController::getUserAddress(Auth::user()->id) : NULL;
        $provinces = Province::all();
        $items = session()->get('cart');

        if (empty($items)) {
            return redirect('/cart');
        }
        return view('order', compact('provinces', 'address', 'items'));
    }

    public function store(OrderRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $items = session()->get('cart');
            $deliver_address = $request->get('address');
            $customer_contact = $request->get('phone');
            $total = $request->get('total');
            $voucher_discount = Voucher::find($request->voucher_id)->discount;

            $transaction = Transaction::create([
                'user_id' => $user->id,
                'customer_name' => $user->fullname,
                'customer_contact' => $customer_contact,
                'deliver_address' => $deliver_address,
                'number' => count($items),
                'total' => $total,
            ]);

            $orders_arr = array();
            foreach ($items as $id => $item) {
                $order = Order::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $id,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'] - $item['price'] * $voucher_discount / 100,
                ]);
                array_push($orders_arr, $order);
            }
            
            //delete voucher after used
            if ($request->voucher_id) {
                Voucher::find($request->voucher_id)->delete();
            }
            DB::commit();
            session()->forget('cart');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return $exception->getMessage();
        }
    }

    public function update(Request $request)
    {
        $voucher = 0;
        if ($request->voucher_id) {
            $voucher = Voucher::find($request->voucher_id)->discount;
        }
        return response()->json([
            'voucher' => $voucher
        ], 200);
    }
}
