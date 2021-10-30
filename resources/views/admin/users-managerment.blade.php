@extends('layouts.admin-app')

@section('title','Food Shop VKU | Admin')

@section('content')
<x-breadcrumb currentPage="Dashboard"></x-breadcrumb>
<div class="shop-area pt-120 pb-120 section-padding-2">
  <div class="container-fluid">
    <div class="row">
      @include('layouts.admin-sidebar')
      <div class="col-lg-9 col-md-8">
        <div class="myaccount-content">
          <h3>Users</h3>
          <div class="myaccount-table table-responsive text-center">
            <table class="table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Phone</th>
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
    </div>
  </div>
</div>
</div>

@endsection