@extends('userDashboard.userDashboard')
@section('userContent')

    <div class="container">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Order History</h1>
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
                                            <th>Contact us</th>
                                            <th>Invoice</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order_histries as $order_histry)
                                                    <tr>
                                                        <td>{{$order_histry->id}}</td>
                                                        <td>{{$order_histry->brand_name}}</td>
                                                        <td>{{$order_histry->model}}</td>
                                                        <td><img style="height: 100px; width: auto;" src="{{ asset($order_histry->image) }}" alt="Image not available"></td>
                                                        <td>
                                                            @if($order_histry->product_delivered == null && $order_histry->product_refunded == null)
                                                                Processing
                                                            @elseif($order_histry->product_refunded == 1)
                                                                Refunded
                                                            @else
                                                                Delivered
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-sm btn-info">Contact Us</a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('download.invoice', $order_histry->id)}}" class="btn btn-sm btn-success">Download Invoice</a>
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
