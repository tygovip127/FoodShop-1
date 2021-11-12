@extends('layouts.app')
@section('title','Food Shop VKU | Account')

@section('content')
<x-breadcrumb currentPage="Account"></x-breadcrumb>
<!-- my account wrapper start -->
<div class="my-account-wrapper pt-50 pb-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- My Account Page Start -->
        <div class="myaccount-page-wrapper">
          <!-- My Account Tab Menu Start -->
          <div class="row">
            <div class="col-lg-3 col-md-4">
              <div class="myaccount-tab-menu nav" role="tablist">
                <a href="#dashboad" data-toggle="tab"><i class="fa fa-dashboard"></i>
                  Dashboard
                </a>
                <a href="#account-info" class="active" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>
                <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
              </div>
            </div>
            <!-- My Account Tab Menu End -->
            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-md-8">
              <div class="tab-content" id="myaccountContent">
                <!-- Single Tab Content Start -->
                <div class="tab-pane fade" id="dashboad" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Dashboard</h3>
                    <div class="welcome">
                      <p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni !</strong><a
                          href="login-register.html" class="logout"> Logout</a>)</p>
                    </div>

                    <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage
                      your shipping and billing addresses and edit your password and account details.</p>
                  </div>
                </div>
                <!-- Single Tab Content End -->
                <!-- Single Tab Content Start -->
                <div class="tab-pane fade" id="orders" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Orders</h3>
                    <div class="myaccount-table table-responsive text-center">
                      <table class="table table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th>Order</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Aug 22, 2018</td>
                            <td>Pending</td>
                            <td>$3000</td>
                            <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>July 22, 2018</td>
                            <td>Approved</td>
                            <td>$200</td>
                            <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>June 12, 2017</td>
                            <td>On Hold</td>
                            <td>$990</td>
                            <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Single Tab Content End -->

                <!-- Single Tab Content Start -->
                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Billing Address</h3>
                    <address>
                      <p><strong>{{ Auth::user()->fullname }}</strong></p>
                      @if ($address)
                        <p>
                          {{ Auth::user()->address }}- {{ $address[2] ? $address[2]->name:null}}<br>
                          {{$address[1] ?$address[1]->name : null }}- {{ $address[0] ? $address[0]->name : null}}
                        </p>
                      @endif
                      <p>Mobile: {{ Auth::user()->phone }}</p>
                    </address>
                    <div class="account-details-form">
                      <form action="{{ route('address.update', Auth::user()->id)}}" method="post"
                        enctype="multipart/form">
                        @csrf
                        @method('PUT')
                        <fieldset>
                          <legend>Address change</legend>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="province" class="required">Province</label>
                                <select class="px-2 py-20" name="province" id="province">
                                  <option value="0">---- Select your province ----</option>
                                  @foreach ( $provinces as $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                                <span class="text-danger">
                                  @error('province'){{ $message }}@enderror
                                </span>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="district" class="required">District</label>
                                <select name="district" id="district">
                                  <option value="0">---- Select your district ----</option>
                                </select>
                                <span class="text-danger">
                                  @error('district'){{ $message }}@enderror
                                </span>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="ward" class="required">Ward</label>
                                <select name="ward" id="ward">
                                  <option value="0">---- Select your ward ----</option>
                                </select>
                                <span class="text-danger">
                                  @error('ward'){{ $message }}@enderror
                                </span>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="street" class="required">Street</label>
                                <input type="text" name="street" id="street">
                                <span class="text-danger">
                                  @error('street'){{ $message }}@enderror
                                </span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        @if (session()->has('address_success'))
                        <div class="alert alert-success">
                          {{ session('address_success') }}
                        </div>
                        @endif
                        @if (session()->has('address_fail'))
                        <div class="alert alert-success">
                          {{ session('address_fail') }}
                        </div>
                        @endif
                        <div class="single-input-item">
                          <button class="check-btn sqr-btn ">Change Address</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Single Tab Content End -->
                <!-- Single Tab Content Start -->
                <div class="tab-pane fade show active" id="account-info" role="tabpanel">
                  <div class="myaccount-content">
                    <h3>Account Details</h3>
                    <div class="account-details-form">
                      <form action="/users/{{ Auth::user()->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="profile-header">
                          <div class="row align-items-center">
                            <div class="col-auto profile-image">
                              <a href="#">
                                <img class="rounded-circle" style="width:5rem" alt="User Image"
                                  src="{{ (Auth::user() && Auth::user()->avatar)? Auth::user()->avatar : asset('../images/users/usersavatardefault_92824.png') }}">
                              </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                              <h4 class="user-name mb-0">{{ Auth::user()->fullname }}</h4>
                              <h6 class="text-muted">{{ Auth::user()->email }}</h6>
                              <div class="user-Location"><i class="fa fa-map-marker"></i>{{ Auth::user()->address }}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-15">
                          <div class="col-lg-6">
                            <div class="single-input-item">
                              <label for="username" class="required">Username</label>
                              <input type="text" name="username" id="username" value="{{ Auth::user()->username }}" />
                              <span class="text-danger">
                                @error('username'){{ $message }}@enderror
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="single-input-item">
                              <label for="fullname" class="required">Fullname</label>
                              <input type="text" name="fullname" id="fullname" value="{{  Auth::user()->fullname }}" />
                              <span class="text-danger">
                                @error('fullname'){{ $message }}@enderror
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="single-input-item">
                              <label for="email" class="required">Email Address</label>
                              <input type="email" name="email" id="email" value="{{  Auth::user()->email }}" />
                              <span class="text-danger">
                                @error('email'){{ $message }}@enderror
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="single-input-item">
                              <label for="phone" class="required">Your phone number</label>
                              <input type="text" name="phone" id="phone" value="{{  Auth::user()->phone }}" />
                              <span class="text-danger">
                                @error('phone'){{ $message }}@enderror
                              </span>
                            </div>
                          </div>
                        </div>
                        @if (session()->has('user_success'))
                        <div class="alert alert-success">
                          {{ session('user_success') }}
                        </div>
                        @endif

                        <div class="single-input-item">
                          <button class="check-btn sqr-btn ">Save Changes</button>
                        </div>
                      </form>
                      {{-- Form change password --}}
                      <form action="{{ route('reset-password') }}" method="post" enctype="multipart/form">
                        @csrf
                        @method('put')
                        <fieldset>
                          <legend class="pt-15">Password change</legend>
                          <div class="single-input-item">
                            <label for="current-pwd" class="required">Current Password</label>
                            <input type="password" name="current-pwd" id="current-pwd"
                              value="{{ old('current-pwd') }}" />
                            <span class="text-danger">
                              @error('current-pwd'){{ $message }}@enderror
                            </span>
                          </div>
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="new-pwd" class="required">New Password</label>
                                <input type="password" name="new-pwd" id="new-pwd" />
                                <span class="text-danger">
                                  @error('new-pwd'){{ $message }}@enderror
                                </span>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="single-input-item">
                                <label for="confirm-pwd" class="required">Confirm Password</label>
                                <input type="password" name="confirm-pwd" id="confirm-pwd" />
                                <span class="text-danger">
                                  @error('confirm-pwd'){{ $message }}@enderror
                                </span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        @if (session()->has('pwd_success'))
                        <div class="alert alert-success">
                          {{ session('pwd_success') }}
                        </div>
                        @endif
                        @if (session()->has('pwd_fail'))
                        <div class="alert alert-danger">
                          {{ session('pwd_fail') }}
                        </div>
                        @endif
                        <div class="single-input-item">
                          <button class="check-btn sqr-btn ">Change Password</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> <!-- Single Tab Content End -->
              </div>
            </div> <!-- My Account Tab Content End -->
          </div>
        </div> <!-- My Account Page End -->
      </div>
    </div>
  </div>
</div>
<!-- my account wrapper end -->
@endsection
@section('script')
<script src="{{ asset('../../js/account/address.js') }}"></script>
@endsection