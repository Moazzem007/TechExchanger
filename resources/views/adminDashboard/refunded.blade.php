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
                            <h1>All Refunds</h1>
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
                                            <th>Buyer</th>
                                            <th>Buyer's Phone</th>
                                            <th>Seller</th>
                                            <th>Seller's Phone</th>
                                            <th>Contacted status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->brand_name}}</td>
                                                <td>{{$product->model}}</td>
                                                <td><img style="height: 100px; width: auto;" src="{{ asset($product->image) }}" alt="Image not available"></td>
                                                <td>@foreach($users as $user) @if($user->id == $product->buyer_id) {{ $user->name }} @endif @endforeach</td>
                                                <td>@foreach($users as $user) @if($user->id == $product->buyer_id) {{ $user->mobile_no }} @endif @endforeach</td>
                                                <td>@foreach($users as $user) @if($user->id == $product->seller_id) {{ $user->name }} @endif @endforeach</td>
                                                <td>@foreach($users as $user) @if($user->id == $product->seller_id) {{ $user->mobile_no }} @endif @endforeach</td>
                                                <td>Contacted</td>
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
