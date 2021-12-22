<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Province;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $address= Auth::user() ?AddressController::getUserAddress(Auth::user()->id): NULL;
        $provinces = Province::all();
        return view('cart', compact('provinces', 'address'));
    }


    public function addToCart($id)
    {
        $product = Product::find($id);
        $product->view++;
        $product->save();
        $cart = session()->get('cart', []);

        $discount = $product->discount;
        $price= $product->sell_value*(100-$discount)/100.0;
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title" => $product->title,
                "quantity" => 1,
                "price" => $price,
                "image" => $product->feature_image_path,
                "discount" => $discount,
            ];
        }
        session()->put('cart', $cart);

        $response = array();
        $cart = session()->get('cart', []);
        foreach ($cart as $id => $item) {
            $newItem = array(
                "id" => $id,
                "data" => $item
            );
            array_push($response, $newItem);
        }
        return $response;
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function removeAll(Request $request){
        session()->forget('cart');
    }
}
