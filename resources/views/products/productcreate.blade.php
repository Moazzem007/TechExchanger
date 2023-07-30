@extends('products.productpage')
@section('content')

    <div class="container my-2">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title">Add Product</h1>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Select Category</label>
                            <select class="form-control" name="category_id">
                                <option disabled selected>Choose category</option>
                                @foreach($categories as $category)

                                    <option value="{{$category->id}}">{{$category->category_name}}</option>

                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Condition</label>
                            <select class="form-control" name="condition">
                                <option disabled selected>Choose condition</option>
                                <option value="New">New</option>
                                <option value="Used">Used</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Authenticity</label>
                            <select class="form-control" name="authenticity">
                                <option disabled selected>Choose authenticity</option>
                                <option value="Original">Original</option>
                                <option value="Refurbished">Refurbished</option>
                            </select>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label">Brand name</label>
                                <input type="text" class="form-control" name="brand_name" placeholder="Brand name" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Model</label>
                                <input type="text" class="form-control" name="model" placeholder="Model" required>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Release Date</label>
                                <input type="date" class="form-control" name="release_date" placeholder="Release date" required>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Features</label>
                                <input type="text" class="form-control" name="features" placeholder="Ex. product features like battery capacity, connectivity etc." required>
                            </div>



                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" name="description" id="summernote" cols="30" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Price</label>
                                <input type="text" class="form-control" name="price" placeholder="Price" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Image upload (At least one picture must be uploaded):</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image1" required>
                                    </div>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image2">
                                    </div>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>



@endsection
