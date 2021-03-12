<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coaching | Home</title>
    <!--    Font Awesome Stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/fa/css/all.min.css')}}">
    <!--    Animate CSS-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/animate.css')}}">
    <!--    Owl Carosel Stylesheets-->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/owl-carosel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/owl-carosel/css/owl.theme.default.css')}}">
    <!--    Magnetic Popup-->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/magnific-popup/css/magnific-popup.css')}}">
    <!--    Bootstrap-4.3 Stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/sub-dropdown.css')}}">
    <!--    Data Table CSS-->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/data-table/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/data-table/css/fixedHeader.bootstrap4.min.css')}}">
    <!--    Theme Stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
     <!--    jQuery-->
    {{-- <script src="{{asset('admin/assets/js/jquery-3.3.1.slim.min.js')}}"></script> --}}
    <script src="{{asset('admin/assets/js/jquery-3.5.1.js')}}"></script>
    <!--    Favicon-->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" type="image/x-icon">
</head>
<body>
<!--Header Start-->

{{-- @php
    $Header = \App\HeaderFooter::all();
@endphp --}}

@if(isset($header))
<section>
    <div class="col-sm-12 text-center header pb-1">
        <h2 class="font-weight-bold p-1 m-0">{{$header->title}}</h2>
        <h5 class="menu-bg p-2 pl-3 pr-3 mb-1">{{$header->sub_title}}</h5>
        <p class="font-weight-bold mb-0">{{$header->address}}</p>
        <p class="font-weight-bold mb-0">Mobile: +{{$header->mobile}}</p>
    </div>
</section>
@else
<section>
    <div class="col-sm-12 text-center header pb-1">
        <h2 class="font-weight-bold p-1 m-0">Web Site Title</h2>
        <h5 class="menu-bg p-2 pl-3 pr-3 mb-1">Web Sub Title</h5>
        <p class="font-weight-bold mb-0">215/4/A/3, East-Rampura, Dhaka-1209</p>
        <p class="font-weight-bold mb-0">Mobile: 880-1722454519</p>
    </div>
</section>
@endif

<!--Header End-->

<!--User Avatar Start-->
<img class="avatar" src="@if(Auth::user()->avatar){{ asset('/avatar/').'/'.Auth::user()->avatar }}@else{{asset('admin/asset/images/avatar.png')}} @endif" alt="Avatar">
<!--User Avatar Start-->

<!--Main Menu Start-->
<nav class="navbar navbar-expand-lg menu-bg">
    <!--    <a class="navbar-brand" href="#">LOGO</a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="mobile-menu-icon fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}"><span class="fa fa-home"></span> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Student
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class=""><a class="dropdown-item" href="form.html">Registration</a></li>
                    <li class=""><a class="dropdown-item" href="table.html">Batch Wise List</a></li>
                    <li class=""><a class="dropdown-item" href="#">Class Wise List</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('photo_gallery')}}">Gallery</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Setting
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">School</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add_school')}}" class="dropdown-item">Add School</a></li>
                            <li><a href="{{route('all_school')}}" class="dropdown-item">School List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Class</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add_class')}}" class="dropdown-item">Add Class</a></li>
                            <li><a href="{{route('class_list')}}" class="dropdown-item">Class List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Batch</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add_batch')}}" class="dropdown-item">Add Batch</a></li>
                            <li><a href="{{route('batch_list')}}" class="dropdown-item">Batch List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item" href="{{route('student_type')}}">Student Type</a>
                    </li>


                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Slider</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add_slider')}}" class="dropdown-item">Add Slider</a></li>
                            <li><a href="{{route('manage_slider')}}" class="dropdown-item">Manage Slider</a></li>
                        </ul>
                    </li>


                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">General</a>
                        <ul class="dropdown-menu">
                        @if(!isset($Header))
                            <li><a href="{{route('add.header_footer')}}" class="dropdown-item">Header & Footer</a></li>
                        @endif
                        @if(isset($Header))
                            <li><a href="{{route('manage.header_footer')}}" class="dropdown-item">Manage Header & Footer</a></li>
                        @endif
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Users</a>
                        <ul class="dropdown-menu">
                            @if (Auth::User()->role=='Admin')
                            <li><a href="{{route('user_registration')}}" class="dropdown-item">Add User</a></li>
                            <li><a href="{{url('/user_list')}}" class="dropdown-item">User List</a></li>
                            @endif
                            <li><a href="{{route('user_profile', ['userId'=> Auth::user()->id])}}" class="dropdown-item">User Profile</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
        </ul>

        {{-- <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="#">Logout</a> --}}
        <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->
    </div>
</nav>
<!--Main Menu End-->

<!--Slider Start-->
@yield('content')
<!--Slider End-->

<!--Footer Start-->
<footer class="container-fluid">
    <div class="row footer">
        <div class="col-12">
            <p class="pt-2 mb-2 text-center">Copyright &copy; <a class="footer-link" href="">@if(isset($header)) {{$footer->copyright}} @else Owner @endif</a> || Developed  by:
                <a class="footer-link" href="http://www.fnfaruk.blogspot.com">Omar_Faruk</a></p>
        </div>
    </div>
</footer>
<!--Footer End-->


    <!--    magnific popup-->
    <script src="{{asset('admin/assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
    <!--    Carousel-->
    <script src="{{asset('admin/assets/plugins/owl-carosel/js/owl.carousel.min.js')}}"></script>
    <!--    Bootstrap-4.3-->
    <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/sub-dropdown.js')}}"></script>
    <!--Data table-->
    <script src="{{asset('admin/assets/plugins/data-table/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/data-table/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/data-table/js/dataTables.fixedHeader.min.js')}}"></script>
    <!--    Theme Script-->
    <script src="{{asset('admin/assets/js/script.js')}}"></script>
</body>
</html>
