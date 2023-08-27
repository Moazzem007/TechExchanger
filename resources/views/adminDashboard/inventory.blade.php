@extends('adminDashboard.adminDashboard')
@section('adminContent')

    <div class="container">

        <div class="row height d-flex justify-content-center align-items-center">

            <div class="col-md-8">

                <div class="search">
                    <form action="{{route('inventory.add')}}" method="post">
                        @csrf
                        <input type="number" class="form-control" name="productId" placeholder="Add to inventory by product ID.">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>

                </div>

            </div>

        </div>
    </div>


    <div class="container">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Our Inventory</h1>
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
                                            <th>Refund</th>
                                            <th>Delivery status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($inventory_products as $order_histry)
                                            @if($order_histry->product_delivered == null)
                                                <tr>
                                                    <td>{{$order_histry->id}}</td>
                                                    <td>{{$order_histry->brand_name}}</td>
                                                    <td>{{$order_histry->model}}</td>
                                                    <td><img style="height: 100px; width: auto;" src="{{ asset($order_histry->image) }}" alt="Image not available"></td>
                                                    <td>@if($order_histry->product_delivered == null) Processing @else Delivered @endif</td>
                                                    <td>@foreach($users as $user) @if($user->id == $order_histry->buyer_id) {{ $user->name }} @endif @endforeach</td>
                                                    <td>@foreach($users as $user) @if($user->id == $order_histry->buyer_id) {{ $user->mobile_no }} @endif @endforeach</td>
                                                    <td>@foreach($users as $user) @if($user->id == $order_histry->seller_id) {{ $user->name }} @endif @endforeach</td>
                                                    <td>@foreach($users as $user) @if($user->id == $order_histry->seller_id) {{ $user->mobile_no }} @endif @endforeach</td>
                                                    <td>
                                                        <a href="{{ route('product.refund', $order_histry->id) }}" class="btn btn-sm btn-warning">Refund</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('product.delivered', $order_histry->product_id)}}" class="btn btn-sm btn-success">Delivered</a>
                                                    </td>
                                                </tr>
                                            @endif
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
