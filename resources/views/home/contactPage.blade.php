<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tech Exchanger</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('home/style.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/responsive.css')}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- summernote -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

@include('home.header')


<div class="container" >
    <div class="footer-top-area" style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6">
                    <h1>Contact Us</h1>
                    <div>

                            <h3 class="my-5"><i class="fa-solid fa-location-dot" style="color: #4180ec;"></i>  Address: House - 19,
                                <br>Nikunja - 2, Road - 8, <br>Khilkhet, Dhaka, Bangladesh</h3>
                            <h3 class="my-5"><i class="fa-solid fa-phone" style="color: #3677e7;"></i>  Phone: +8801719811582</h3>
                            <h3 class="my-5"><i class="fa-solid fa-envelope" style="color: #3e79e0;"></i>  Email: contact.techexchanger@gmail.com</h3>

                    </div>
                </div>



                <div class="col-md-5 col-sm-6">
                    <div class="footer-newsletter">
                        <h2>Mail Us:</h2>
                        <h3>Email us anytime about your experience with us or for any kind of query.</h3>
                        <div class="newsletter-form">
                            <form action="#" class="form">
                                <input type="text" class="form-control" placeholder="Your name" style="border: 2px black solid; margin-bottom: 20px;">
                                <input type="email" class="form-control" placeholder="Your email" style="border: 2px black solid; margin-bottom: 20px;">
                                <input type="text" class="form-control" placeholder="Subject" style="border: 2px black solid; margin-bottom: 20px;">
                                <textarea class="form-control" name="description" placeholder="Description" id="summernote" cols="30" rows="10" style="border: 2px black solid; margin-bottom: 20px;"></textarea>
                                <input type="submit" value="Send">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
</div>





{{--@include('home.productwidget')--}}

@include('home.footer')

<script src="https://kit.fontawesome.com/184ebe4786.js" crossorigin="anonymous"></script>

<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('home/js/jquery.sticky.js')}}"></script>

<!-- jQuery easing -->
<script src="{{asset('home/js/jquery.easing.1.3.min.js')}}"></script>

<!-- Main Script -->
<script src="{{asset('home/js/main.js')}}"></script>

<!-- Slider -->
<script type="text/javascript" src="{{asset('home/js/bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('home/js/script.slider.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{asset('backend/')}}plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>
</body>
</html>
