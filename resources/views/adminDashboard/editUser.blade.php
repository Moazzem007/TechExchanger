@extends('adminDashboard.adminDashboard')
@section('adminContent')


    <div class="container my-2">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h1 class="card-title">Edit User</h1>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('user.update', $user->id)}}">
                        @csrf

                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{$user->email}}" required>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Mobile</label>
                                <input type="text" class="form-control" name="mobile_no" value="{{$user->mobile_no}}" required>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Address</label>
                                <input type="text" class="form-control" name="address" value="{{$user->address}}" required>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>


@endsection
