

<div class="sidebar" data-color="blue" data-image="{{ asset('userDashboard/img/sidebar-5.jpg') }}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <h1><a href="{{route('home')}}"><img src="{{ asset('home/img/logo.png') }}"></a></h1>
        </div>

        <ul class="nav">
            <li>
                <a href="{{route('user.dashboard')}}">
                    <i class="pe-7s-user"></i>
                    <p>My Profile</p>
                </a>
            </li>
            <li>
                <a href="{{route('user.products')}}">
                    <i class="pe-7s-note2"></i>
                    <p>My Products</p>
                </a>
            </li>
            <li>
                <a href="{{route('user.cart')}}">
                    <i class="pe-7s-cart"></i>
                    <p>My cart</p>
                </a>
            </li>
            <li>
                <a href="{{route('order.histry')}}">
                    <i class="pe-7s-cart"></i>
                    <p>Order History</p>
                </a>
            </li>
        </ul>
    </div>
</div>
