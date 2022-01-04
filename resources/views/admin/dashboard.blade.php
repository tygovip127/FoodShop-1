@extends('layouts.admin-app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/soft-ui-dashboard.min.css')}}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css')}}">
@endsection
@section('title','Food Shop VKU | Admin')
@section('content')
<div class="main-content">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <small class="text-sm mb-0 text-capitalize font-weight-bold">Yesterday</small><br>
                <small class="text-sm mb-0 text-capitalize font-weight-bold">{{ $total_money_last_day }}</small>
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $total_money_today }}
                  @if($total_money_today_percent >= 0)
                  <small class="text-success text-sm font-weight-bolder">+{{ $total_money_today_percent }}%</small>
                  @else
                  <small class="text-danger text-sm font-weight-bolder">{{ $total_money_today_percent }}%</small>
                  @endif
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <i class="fas fa-coins"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <small class="text-sm mb-0 text-capitalize font-weight-bold">Yesterday</small><br>
                <small class="text-sm mb-0 text-capitalize font-weight-bold">0</small>
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Users</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $total_users }}
                  <small class="text-success text-sm font-weight-bolder">+{{ $new_users_amount }}</small>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <i class="far fa-eye"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <small class="text-sm mb-0 text-capitalize font-weight-bold">Yesterday</small><br>
                <small class="text-sm mb-0 text-capitalize font-weight-bold">0</small>
                <p class="text-sm mb-0 text-capitalize font-weight-bold">New Clients</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $new_users_amount }}
                  <small class="text-danger text-sm font-weight-bolder">-2%</small>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <i class="fas fa-user-plus"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <small class="text-sm mb-0 text-capitalize font-weight-bold">Yesterday</small><br>
                <small class="text-sm mb-0 text-capitalize font-weight-bold">{{ $total_orders_last_day }}</small>
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's order</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $total_orders_today }}
                  @if($total_orders_today_percent >= 0)
                  <small class="text-success text-sm font-weight-bolder">+{{ $total_orders_today_percent }}%</small>
                  @else
                  <small class="text-danger text-sm font-weight-bolder">{{ $total_orders_today_percent }}%</small>
                  @endif
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <i class="fas fa-file-invoice-dollar"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body px-0">
          <div class="row">
            <div class="col-lg-12">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Avatar
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Title
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      View
                    </th>
                  </tr>
                </thead>
                @foreach($products as $product)
                <tr class="text-center pb-10">
                  <td>
                    <div>
                      <img src="{{ asset($product->feature_image_path) }}" class="avatar avatar-sm me-3">
                    </div>
                  </td>
                  <td class="">
                    <p class="text-left text-xs font-weight-bold mb-0">{{ $product->title }}</p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold ">{{ $product->view }}</p>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-body px-0">
          <div class="row">
            <div class="col-lg-12">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      ID
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Username
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Full name
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                      Spent
                    </th>
                  </tr>
                </thead>
                @foreach( $users as $user)
                <tr class="text-center pb-10">
                  <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{ $user->id }}</p>
                  </td>
                  <td class="">
                    <p class="text-left text-xs font-weight-bold mb-0">{{ $user->username }}</p>
                  </td>
                  <td class="">
                    <p class="text-left text-xs font-weight-bold mb-0">{{ $user->fullname }}</p>
                  </td>
                  <td class="">
                    <p class="text-xs font-weight-bold mb-0">{{ $user->spent ? $user->spent : '0' }}</p>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-5 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="bg-gradient-success border-radius-lg py-3 pe-1 mb-3">
            <div class="chart">
              <canvas id="chart-bars" class="chart-canvas" height="170px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="card">
        <div class="card-header pb-0">
          <h6>Sales overview</h6>
          <p class="text-sm">
            <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">4% more</span> this month
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300px"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row my-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-12 col-7">
              <h6>Order requests</h6>
              <div class="text-sm mb-0">
                <i class="fas fa-circle text-success"></i>
                <span class="font-weight-bold ms-1">{{ $total_done_transactions}} delivered</span>
                <i class="fas fa-circle text-info"></i>
                <span class="font-weight-bold ms-1">{{ $total_approved_transactions}} approved</span>
                <i class="fas fa-circle text-warning"></i>
                <span class="font-weight-bold ms-1">{{ $total_waiting_transactions  }} pending</span>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($transaction_requests as $transaction)
                <tr class="text-center pb-10">
                  <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{ $transaction->id }}</p>
                  </td>
                  <td class="">
                    <p class="text-left text-xs font-weight-bold mb-0">{{ $transaction->customer_name }}</p>
                  </td>
                  <td class="">
                    <p class="text-xs font-weight-bold mb-0">{{ $transaction->number }}</p>
                  </td>
                  <td class="">
                    <p class="text-xs font-weight-bold mb-0">{{ $transaction->total }}</p>
                  </td>
                  <td class="">
                    <x-transaction-status :status="$transaction->status"></x-transaction-status>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card h-100">
        <div class="card-header pb-0">
          <h6>Orders overview</h6>
          <p class="text-sm">
            <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
            <span class="font-weight-bold">24%</span> this month
          </p>
        </div>
        <div class="card-body p-3">
          <div class="timeline timeline-one-side">
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="ni ni-bell-55 text-success text-gradient"></i>
              </span>
              <div class="timeline-content">
                <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
              </div>
            </div>
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="ni ni-html5 text-danger text-gradient"></i>
              </span>
              <div class="timeline-content">
                <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
              </div>
            </div>
            <div class="timeline-block mb-3">
              <span class="timeline-step">
                <i class="ni ni-cart text-info text-gradient"></i>
              </span>
              <div class="timeline-content">
                <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@section('js')
<script>
  var dates = JSON.parse('{!! json_encode($dates) !!}');
  var sales = JSON.parse('{!! json_encode($sales) !!}');
</script>
<script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
<script src="{{ asset('js/plugins/Chart.extension.js') }}"></script>
<script src="{{ asset('js/plugins/chart-view.js') }}"></script>
@endsection
@endsection