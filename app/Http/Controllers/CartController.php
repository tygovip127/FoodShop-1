<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
   public function addToCart($id){
    $product= Product::find($id);
    $cart= session()->get('cart', []);

    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "title" => $product->title,
            "quantity" => 1,
            "price" => $product->sell_value,
            "image" => $product->feature_image_path,
        ];
    }
    session()->put('cart', $cart);
 
    $response= array();
    $cart=session()->get('cart',[]);
    foreach($cart as $id =>$item){
        $newItem=array(
            "id"=> $id,
            "data"=>$item
        );
        array_push($response, $newItem);
    }
    return $response;
   }

   public function update(Request $request)
   {
       if($request->id && $request->quantity){
           $cart = session()->get('cart');
           $cart[$request->id]["quantity"] = $request->quantity;
           session()->put('cart', $cart);
           session()->flash('success', 'Cart updated successfully');
       }
   }

   public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
