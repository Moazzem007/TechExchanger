@extends('userDashboard.userDashboard')

@section('userContent')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Welcome {{$user->name}}, you can edit your profile here.</h4>
                        </div>
                        <div class="content">
                            <form method="post" action="{{ route('profile.update',$user->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="number" class="form-control" name="mobile_no" placeholder="Phone" value="{{$user->mobile_no}}">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Full address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Full Address" value="{{$user->address}}">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>


@endsection

