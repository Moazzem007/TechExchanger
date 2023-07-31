@extends('products.productpage')
@section('content')




        <div class="container mt-100" style="margin-top: 50px; margin-bottom: 50px">
            <div class="row">
                @foreach($categories as $category)
                    <form id="categoryForm" action="{{route('search')}}" method="post">
                        @csrf
                        <input type="hidden" name="search" value="{{$category->id}}" >


                    <div class="col-md-4 col-sm-6">
                        <div class="card mb-30 categoryCard">
                            <div class="card-header text-center">
                                <h4 class="card-title">{{$category->category_name}}</h4>
                                <button class="btn btn-info" type="submit">View Products</button>
                            </div>
                        </div>
                    </div>

                    </form>
                @endforeach

            </div>
        </div>




@endsection
