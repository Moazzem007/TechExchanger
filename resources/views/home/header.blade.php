



<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="../../../public/home"><img src="{{ asset('home/img/logo.png') }}"></a></h1>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../../../public/home/index.html">Home</a></li>
                    <li><a href="../../../public/home/shop.html">Shop page</a></li>
                    <li><a href="../../../public/home/single-product.html">Single product</a></li>
                    <li><a href="../../../public/home/cart.html">Cart</a></li>
                    <li><a href="../../../public/home/checkout.html">Checkout</a></li>
                    <li><a href="#">Category</a></li>
                    <li><a href="#">Others</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li id="logincss"><a class="btn btn-warning" href="{{ route('product.create') }}">Sell something</a></li>



                    @guest
                        <li id="logincss"><a class="btn btn-primary" href="{{route('login')}}">Log in</a></li>
                        <li id="registercss"><a class="btn btn-success" href="{{route('register')}}">Register</a></li>
                    @else
                        <li id="logincss">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>



                    @endguest

                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->
