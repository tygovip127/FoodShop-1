@extends('layouts.admin-app')

@section('css')
<link rel="stylesheet" href="{{ asset('../../css/role.css')}}">
@endsection
@section('title','Food Shop VKU | Admin')
@section('content')
<div class="main-content">
    <div class="myaccount-content mb-5">
        <h3>Create new voucher</h3>
        <div class="account-details-form">
            <form action="{{ route('admin.vouchers.store') }}" method="post">
                @csrf
                <div class="row mt-15">
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="name">Name</label>
                            <input type="text" name="name">
                            @error('name')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="single-input-item">
                            <label for="discount">Discount</label>
                            <input type="text" name="discount">
                            @error('discount')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="single-input-item">
                            <label for="started_time">Started time</label>
                            <input type="date" name="started_time" value="{{ now()->format('Y-m-d') }}">
                            @error('started_time')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="single-input-item">
                            <label for="expired_time">Expired time</label>
                            <input type="date" name="expired_time">
                            @error('expired_time')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="multiple-input-item">
                            <label for="user_id[]">Apply for user</label>
                            <select name="user_id[]" multiple size="16">
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->id . '. ' . $user->username . ' - ' . $user->email . ' - ' . $user->phone }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                @if (session()->has('voucher_success'))
                <div class="alert alert-success">
                    {{ session('voucher_success') }}
                </div>
                @endif
                @if (session()->has('voucher_fail'))
                <div class="alert alert-danger">
                    {{ session('voucher_fail') }}
                </div>
                @endif
                <div class="single-input-item mt-2">
                    <button class="check-btn sqr-btn">Create</button>
                </div>
            </form>
        </div>
    </div>
    <div class="myaccount-content">
        <div class="account-details-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">All Vouchers</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Discount
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Amount
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Start
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Expire
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $vouchers as $voucher)
                                        <x-voucher-list-card :name="$voucher->name" :discount="$voucher->discount" :amount="$voucher->amount" :startedTime="$voucher->started_time" :expiredTime="$voucher->expired_time">
                                        </x-voucher-list-card>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/admin/admin.js') }}"></script>
<script src="{{ asset('js/role.js')}}"></script>
@endsection
@endsection