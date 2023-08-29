
@if(session()->has('success'))
    <script type="text/javascript">
        function codeAddress() {
            alert('Successfully Added to Cart');
        }
        window.onload = codeAddress;
    </script>

@endif

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row" style="margin-top: 50px; margin-bottom: 50px;">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">Latest Products</h2>

                        <div class="container mt-5 mb-5">
                            <div class="d-flex justify-content-center row">
                                <div class="col-md-10">
                                    @foreach($products as $product)
                                        @if($product->status == null)
                                        <div class="row p-2 bg-white border rounded">
                                            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{asset($product->image1)}}"></div>
                                            <div class="col-md-6 mt-1">
                                                <h5>{{$product->brand_name .' '. $product->model }}</h5>
                                                <div class="mt-1 mb-1 spec-1"><span>Category: @foreach($categories as $category) @if($category->id == $product->category_id)  {{$category->category_name}} @endif @endforeach  </span><span class="dot"></span><br></div>
                                                <div class="mt-1 mb-1 spec-1"><span>Condition: {{ $product->condition }}  </span><span class="dot"></span><br></div>
                                                <div class="mt-1 mb-1 spec-1"><span>Authenticity: {{ $product->authenticity }}</span><span class="dot"></span><br></div>
                                                <p class="text-justify text-truncate para mb-0">{{$product->description}}<br><br></p>
                                            </div>
                                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                                <div class="d-flex flex-row align-items-center">
                                                    <h4 class="mr-1">{{$product->price}}<b>৳</b></h4>
                                                </div>
                                                <div class="d-flex flex-column mt-4">

                                                        <a class="btn btn-success" href="{{route('single.product', $product->id)}}" style="margin-top: 25px; margin-bottom: 25px;">Details</a>


                                                        <a class="btn btn-primary" href="{{route('cart.add', $product->id)}}" style="margin-top: 25px; margin-bottom: 25px;">Add to cart</a>


                                                    <a class="btn btn-primary" href="{{route('buy.now', $product->id)}}">Buy Now</a>

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <a class="btn btn-info" href="{{route('product.all')}}"><b>Show all -></b></a>
    </div>
</div> <!-- End main content area -->
