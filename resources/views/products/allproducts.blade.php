@extends('products.productpage')
@section('content')


    @include('home.searchbar')

        <div class="maincontent-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-product">
                            <h2 class="section-title">All Products</h2>

                            <div class="container mt-5 mb-5">
                                <div class="d-flex justify-content-center row">
                                    <div class="col-md-10">
                                        @foreach($products as $product)
                                            <div class="row p-2 bg-white border rounded">
                                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{asset($product->image1)}}"></div>
                                                <div class="col-md-6 mt-1">
                                                    <h5>{{$product->brand_name .' '. $product->model }}</h5>
                                                    <div class="mt-1 mb-1 spec-1"><span>Category: @foreach($categories as $category) @if($category->id == $product->category_id)  {{$category->category_name}} @endif @endforeach  </span><span class="dot"></span><br></div>
                                                    <div class="mt-1 mb-1 spec-1"><span>Condition: {{ $product->condition }}  </span><span class="dot"></span><br></div>
                                                    <div class="mt-1 mb-1 spec-1"><span>Authenticity: {{ $product->authenticity }}</span><span class="dot"></span><br></div>
                                                    <div class="mt-1 mb-1 spec-1"><span>Features: {{ $product->features }}</span><span class="dot"></span><br></div>
                                                    <p class="text-justify text-truncate para mb-0">{{$product->description}}<br><br></p>
                                                </div>
                                                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <h4 class="mr-1">{{$product->price}}<b>৳</b></h4>
                                                    </div>
                                                    <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button">
                                                            <a href="{{route('single.product', $product->id)}}">Details</a></button><button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button></div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{ $products->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End main content area -->









@endsection
