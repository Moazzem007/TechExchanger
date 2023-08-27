

<div class="sidebar" data-color="blue" data-image="{{ asset('userDashboard/img/sidebar-5.jpg') }}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <h1><a href="../../../public/home"><img src="{{ asset('home/img/logo.png') }}"></a></h1>
        </div>

        <ul class="nav">
            <li>
                <a href="{{route('user.all')}}">
                    <i class="pe-7s-user"></i>
                    <p>All Users</p>
                </a>
            </li>
            <li>
                <a href="{{route('products.all')}}">
                    <i class="pe-7s-shopbag"></i>
                    <p>All Products</p>
                </a>
            </li>
            <li>
                <a href="{{route('category.all')}}">
                    <i class="pe-7s-note2"></i>
                    <p>All Categories</p>
                </a>
            </li>
            <li>
                <a href="{{ route('request.delivery') }}">
                    <i class="pe-7s-note2"></i>
                    <p>Request Delivery</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.inventory') }}">
                    <i class="pe-7s-note2"></i>
                    <p>Inventory(Tech Exchanger)</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-note2"></i>
                    <p>Delivered Products(Customer)</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-note2"></i>
                    <p>Refunded</p>
                </a>
            </li>
        </ul>
    </div>
</div>
