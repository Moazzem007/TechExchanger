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
                            <h1>My products</h1>
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

                                            <th>Category</th>
                                            <th>Condition</th>
                                            <th>Authenticity</th>
                                            <th>Brand Name</th>
                                            <th>Model</th>
                                            <th>Release Date</th>
                                            <th>Features</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            @if($product->status == null)
                                            <tr>
                                                <td>
                                                @foreach($categories as $category)
                                                    @if($product->category_id == $category->id) {{$category->category_name}} @endif
                                                @endforeach
                                                </td>
                                                <td>{{$product->condition}}</td>
                                                <td>{{$product->authenticity}}</td>
                                                <td>{{$product->brand_name}}</td>
                                                <td>{{$product->model}}</td>
                                                <td>{{$product->release_date}}</td>
                                                <td>{{$product->features}}</td>
                                                <td>{{$product->description}}</td>
                                                <td>{{$product->price}}</td>
                                                <td><img style="height: 50%; width: auto;" src="{{ asset($product->image1) }}" alt=""></td>


                                                <td>
                                                    <a href="{{route('userProducts.edit', $product->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('userProd.delete', $product->id) }}" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a>
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
