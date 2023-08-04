@extends('products.productpage')
@section('content')


    @if(session()->has('success'))
        <script type="text/javascript">
            function codeAddress() {
                alert('Successfully Added to Cart');
            }
            window.onload = codeAddress;
        </script>

    @endif

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">@foreach($categories as $category) @if($category->id == $product->category_id)  {{$category->category_name}} @endif @endforeach  </a>
                            <a href="">{{$product->name}}</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{ asset($product->image1) }}" alt="">
                                    </div>

                                    <div class="product-gallery">
                                        <img src="{{ asset($product->image1) }}" alt="">
                                        <img src="{{ asset($product->image2) }}" alt="">
                                        <img src="{{ asset($product->image3) }}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{ $product->name }}</h2>
                                    <div class="product-inner-price">
                                        <h1>Price: {{ $product->price }} ৳</h1>
                                    </div>

                                    <form action="" class="cart">

                                        <button class="add_to_cart_button" type="submit">Buy now</button>
                                        <button class="btn btn-outline-primary btn-sm mt-2" type="button"><a href="{{route('cart.add', $product->id)}}">Add to cart</a></button>
                                    </form>

                                    <div class="product-inner-category">
                                        <p>Category: @foreach($categories as $category) @if($category->id == $product->category_id)  {{$category->category_name}} @endif @endforeach. </p>
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>
                                                <p>{{$product->description}}</p>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
