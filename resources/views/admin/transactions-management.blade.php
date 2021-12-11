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
                <h5 class="mb-0">All Orders</h5>
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Name
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Phone
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Address
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Total
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($transactions as $transaction)
                    <tr class="text-center pb-10">
                      <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">{{ $transaction->id }}</p>
                      </td>
                      <td class="">
                        <p class="text-xs font-weight-bold mb-0">{{ $transaction->customer_name }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold ">{{ $transaction->customer_contact }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold ">{{ $transaction->deliver_address }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold ">{{ $transaction->total }}</p>
                      </td>
                      <td>
                       <x-transaction-status :status="$transaction->status"></x-transaction-status>
                      </td>
                      <td class="text-center">

                        <div class="d-inline-block mr-3">
                          <form action="{{ route('admin.transactions.update', array($transaction->id)) }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="status" value="{{ number_format($transaction->status +1) }}">
                            <a href="javascript:;" onclick="this.parentNode.submit(); return false;"><i class="fas fa-check text-success"></i></a>
                            </input>
                          </form>
                        </div>


                        <a href="" data-url="{{ route('admin.transactions.destroy', array($transaction->id)) }}" class="action_delete">
                          <i class="fas fa-times text-danger"></i>
                        </a>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
            <div class="pro-pagination-style text-center mt-10">
              <span class="hidden">
                {{ $pages = ceil($transactions->total()/ $transactions->perPage()) }}
              </span>
              <ul>
                <li><a class="prev" href="{{ $transactions->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
                @for ($i = 1; $i <= $pages; $i++) <li>
                  <a href=<?php echo url()->current() . "?page=" . $i ?>>{{ $i }}</a>
                  </li>
                  @endfor
                  <li><a class="next" href="{{ $transactions->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
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
<script src="{{ asset('../../js/admin/admin.js') }}"></script>
@endsection
@endsection