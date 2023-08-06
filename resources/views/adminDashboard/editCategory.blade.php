@extends('adminDashboard.adminDashboard')
@section('adminContent')

    <div class="container my-2">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title">Edit Category</h1>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('category.update', $category->id)}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label">Category name</label>
                                <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}" required>
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
