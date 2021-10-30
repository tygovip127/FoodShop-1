@extends('layouts.app')
@section('title','Food Shop VKU | Wishlist')

@section('content')
<x-breadcrumb currentPage="Wishlist"></x-breadcrumb>
<div class="cart-main-area pt-115 pb-120">
    <div class="container">
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <x-wishlist-simple-card title="Simple Black T-Shirt" price="260.00" quantity="1" image="#" link="product-details.html"></x-wishlist-simple-card>
                                <x-wishlist-simple-card title="Norda Simple Backpack" price="150.00" quantity="2" image="#" link="product-details.html"></x-wishlist-simple-card>
                                <x-wishlist-simple-card title="Simple Black T-Shirt" price="260.00" quantity="1" image="#" link="product-details.html"></x-wishlist-simple-card>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection