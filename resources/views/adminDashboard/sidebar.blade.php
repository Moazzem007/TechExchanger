

<div class="sidebar" data-color="blue" data-image="{{ asset('userDashboard/img/sidebar-5.jpg') }}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Creative Tim
            </a>
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
                    <i class="pe-7s-note2"></i>
                    <p>All Products</p>
                </a>
            </li>
            <li>
                <a href="{{route('user.cart')}}">
                    <i class="pe-7s-cart"></i>
                    <p>My cart</p>
                </a>
            </li>
        </ul>
    </div>
</div>
