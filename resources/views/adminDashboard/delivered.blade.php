@extends('adminDashboard.adminDashboard')
@section('adminContent')

    <div class="container">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>All Deliveries</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>

                                            <th>Id</th>
                                            <th>Brand Name</th>
                                            <th>Model</th>
                                            <th>Image</th>
                                            <th>Product status</th>
                                            <th>Buyer</th>
                                            <th>Buyer's Phone</th>
                                            <th>Seller</th>
                                            <th>Seller's Phone</th>
                                            <th>Contacted status</th>
                                            <th>Invoice</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($deliveredProducts as $deliveredProduct)
                                                <tr>
                                                    <td>{{$deliveredProduct->id}}</td>
                                                    <td>{{$deliveredProduct->brand_name}}</td>
                                                    <td>{{$deliveredProduct->model}}</td>
                                                    <td><img style="height: 100px; width: auto;" src="{{ asset($deliveredProduct->image) }}" alt="Image not available"></td>
                                                    <td>@if($deliveredProduct->product_delivered == null) Processing @else Delivered @endif</td>
                                                    <td>@foreach($users as $user) @if($user->id == $deliveredProduct->buyer_id) {{ $user->name }} @endif @endforeach</td>
                                                    <td>@foreach($users as $user) @if($user->id == $deliveredProduct->buyer_id) {{ $user->mobile_no }} @endif @endforeach</td>
                                                    <td>@foreach($users as $user) @if($user->id == $deliveredProduct->seller_id) {{ $user->name }} @endif @endforeach</td>
                                                    <td>@foreach($users as $user) @if($user->id == $deliveredProduct->seller_id) {{ $user->mobile_no }} @endif @endforeach</td>
                                                    <td>Contacted</td>
                                                    <td>
                                                        <a href="{{route('download.invoice', $deliveredProduct->id)}}" class="btn btn-sm btn-success">Download Invoice</a>
                                                    </td>
                                                </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
        </div>


@endsection
