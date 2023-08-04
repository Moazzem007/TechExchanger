@extends('userDashboard.userDashboard')
@section('userContent')


    <style>
        body {
            margin: 100px;
        }

        #file-input {
            display: none;
        }

        #file-input-2 {
            display: none;
        }

        #file-input-3 {
            display: none;
        }

        #file-input-label {
            font-size: 1.3em;
            padding: 10px 15px;
            border: 1px solid black;
            border-radius: 4%;
        }

        #file-input-label-2 {
            font-size: 1.3em;
            padding: 10px 15px;
            border: 1px solid black;
            border-radius: 4%;
        }

        #file-input-label-3 {
            font-size: 1.3em;
            padding: 10px 15px;
            border: 1px solid black;
            border-radius: 4%;
        }
    </style>

    <div class="container my-2">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title">Edit Product</h1>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Select Category</label>
                            <select class="form-control" name="category_id">
                                <option disabled selected>Choose category</option>
                                @foreach($categories as $category)

                                    <option value="{{$category->id}} " @if($category->id == $product->category_id) selected @endif>{{$category->category_name}}</option>

                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Condition</label>
                            <select class="form-control" name="condition">
                                <option disabled>Choose condition</option>
                                <option value="New" @if($product->condition == 'New') selected @endif>New</option>
                                <option value="Used" @if($product->condition == 'Used') selected @endif>Used</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Authenticity</label>
                            <select class="form-control" name="authenticity">
                                <option disabled selected>Choose authenticity</option>
                                <option value="Original" @if($product->authenticity == 'Original') selected @endif>Original</option>
                                <option value="Refurbished" @if($product->authenticity == 'Refurbished') selected @endif>Refurbished</option>
                            </select>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label">Brand name</label>
                                <input type="text" class="form-control" name="brand_name" value="{{$product->brand_name}}" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Model</label>
                                <input type="text" class="form-control" name="model" value="{{$product->model}}" required>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Release Date</label>
                                <input type="date" class="form-control" name="release_date" value="{{$product->release_date}}" required>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Features</label>
                                <input type="text" class="form-control" name="features" value="{{$product->features}}" required>
                            </div>



                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" name="description" id="summernote" cols="30" rows="10">{{$product->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Price</label>
                                <input type="text" class="form-control" name="price" value="{{$product->price}}" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Image upload (At least one picture must be uploaded):</label>
                                <div class="card-group">
                                    <div class="custom-file">
                                        <div class="card" style="width: 18rem;">
                                            <img id="file-ip-1-preview" src="{{asset($product->image1)}}">
                                            <div class="card-body">
                                                <input type="file" id="file-input" name="image1" accept="image/*" onchange="showPreview1(event);">
                                                <label id="file-input-label" for="file-input">Change image</label>
                                                <input type="hidden" name="old_image_1" value="{{ $product->image1 }}">
                                            </div>
                                        </div>
                                    </div>
                                    @if($product->image2)
                                        <div class="custom-file">
                                            <div class="card" style="width: 18rem;">
                                                <img id="file-ip-1-preview-2" src="{{asset($product->image2)}}">
                                                <div class="card-body">
                                                    <input type="file" id="file-input-2" name="image2" accept="image/*" onchange="showPreview2(event);">
                                                    <label id="file-input-label-2" for="file-input-2">Change image</label>
                                                    <input type="hidden" name="old_image_2" value="{{ $product->image2 }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($product->image3)
                                        <div class="custom-file">
                                            <div class="card" style="width: 18rem;">
                                                <img id="file-ip-1-preview-3" src="{{asset($product->image3)}}">
                                                <div class="card-body">
                                                    <input type="file" id="file-input-3" name="image3" accept="image/*" onchange="showPreview3(event);">
                                                    <label id="file-input-label-3" for="file-input-3">Change image</label>
                                                    <input type="hidden" name="old_image_3" value="{{ $product->image3 }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
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

    <script type="text/javascript">
        function showPreview1(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
        function showPreview2(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview-2");
                preview.src = src;
                preview.style.display = "block";
            }
        }
        function showPreview3(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview-3");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>

@endsection
