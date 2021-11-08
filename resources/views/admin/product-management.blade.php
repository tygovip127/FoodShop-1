@extends('layouts.admin-app')
@section('title', 'Food Shop VKU | Products')
@section('content')
<div class="main-content">
    <div class="myaccount-content">
        <div class="account-details-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">All Products</h5>
                            </div>
                            <div class="single-input-item m-0">
                                <a href="{{ route('admin.products.create') }}">Add product</a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Photo
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Category
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Restock value
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Sell value
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Rate
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                View
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Created at
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Updated at
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $products as $product)
                                        <x-product-list-card id="{{ $product->id }}" image="{{ $product->feature_image_path }}" title="{{ $product->title }}" categoryId="{{ $product->category_id }}" restockValue="{{ $product->restock_value }}" sellValue="{{$product->sell_value}}" rate="{{$product->rate}}" view="{{$product->view}}" createdAt="{{$product->created_at}}" updatedAt="{{$product->updated_at}}">
                                        </x-product-list-card>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="pro-pagination-style text-center mt-10">
                <span class="hidden">
                    {{ $pages = ceil($products->total()/ $products->perPage()) }}
                </span>
                <ul>
                    <li><a class="prev" href="{{ $products->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
                    @for ($i = 1; $i <= $pages; $i++) <li>
                        <a href='{{ "http://127.0.0.1:8000/admin/product-management?page=".$i }}'>{{ $i }}</a>
                        </li>
                        @endfor
                        <li><a class="next" href="{{ $products->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('../../js/admin/admin.js') }}"></script>
@endsection
@endsection