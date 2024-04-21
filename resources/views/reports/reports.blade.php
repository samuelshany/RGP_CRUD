<!DOCTYPE html>
@php

$local =Session::get('local');
App::setlocale(Session::get('local'));
    @endphp

<html @if($local=='ar') dir="rtl"@endif lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/Icon.png') }}">
    <title>RGB - @yield('title')</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <!-- This Page CSS -->
    <link href="{{ asset('src/assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('src/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chart Sample</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

<![endif]-->
    <script src="https://kit.fontawesome.com/8c2459f9f4.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="tea lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-lg navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->


                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto float-left">
                        <!-- This is  -->
                        <!--   <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->

                        <!-- ============================================================== -->
                        <!-- Mega Menu -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Mega Menu -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('messages.lang')}}

                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">


                                    <li class="user-list"><a class="px-3 py-2" href="{{ url('/logout') }}"><i
                                                class="fa fa-power-off"></i> Logout</a></li>
                                     <li class="user-list"><form method="POST" action="{{route('changeLang')}}">
                                    @csrf
                                    <select class="form-control"  name="lang" onchange="this.form.submit()">
                                        @php
                                       use function App\Helpers\getLangs;
                                        $langs = getLangs();
                                            @endphp
                                        @endphp
                                        <option>{{__('messages.lang')}}</option>
                                        @foreach ($langs as $lang)
                                        <option value="{{$lang->abbr}}">{{$lang->name}}</option>
                                        @endforeach

                                    </select>
                                    </form></li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->

                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->


                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">{{__('messages.category')}} </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">

                                    <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark"
                                            href="{{ url('admin/categories/') }}">{{__('messages.categories')}}</a>

                                    </li>



                                </ul>
                            </li>

                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                    href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">{{__('messages.products')}} </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">

                                    <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark"
                                            href="{{ url('admin/products/') }}">{{__('messages.products')}}</a>

                                    </li>
                                    <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark"
                                        href="{{ url('admin/products/deleted') }}">{{__('messages.deletedproducts')}}</a>

                                </li>


                                </ul>
                            </li>

                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">{{__('messages.reports')}} </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">

                                <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark"
                                        href="{{ url('admin/reports/') }}">{{__('messages.reports')}}</a>

                                </li>
                                <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark"
                                    href="{{ url('admin/reports/charts') }}">{{__('messages.reportscharts')}}</a>



                            </ul>
                        </li>



                    </ul>
                </nav>

            </div>

        </aside>

        <div style="height:9.5rem"></div>

        @yield('content')
        <div class="container px-4 mx-auto">
<div class="row">
    <div class="col-md-6">
        <div class=" rounded shadow">
            {!! $chart->container() !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class=" rounded shadow">
            {!! $chart2->container() !!}
        </div>
    </div>
</div>


        </div>
        <script src="{{ $chart->cdn() }}"></script>
        <script src="{{ $chart2->cdn() }}"></script>
        {{ $chart->script() }}
        {{ $chart2->script() }}
        <footer class="footer mb-0" style="color:black;background-color:none;">
            <p class="mb-5  w-100 text-center" style="color:black;margin-bottom:5px;margin-top:1px; font-size:12px;">
                Copyright 2024 <i class="far fa-copyright"></i> <a href="https://www.linkedin.com/in/samuel-hany/" target="_blank">
                    <img src="{{ asset('LogoProMina.jpg') }}"
                        style="
    display: inline-block;
    width: 20px;
    margin: 0 5px;


">samuel hany</a>
                All Rights Reserved </p>
        </footer>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- customizer Panel -->
        <!-- ============================================================== -->

        <div class="chat-windows"></div>
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="{{ asset('src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{ asset('src/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('src/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- apps -->
        <script src="{{ asset('dist/js/app.min.js') }}"></script>
        <script src="{{ asset('dist/js/app.init.horizontal.js') }}"></script>
        <script src="{{ asset('dist/js/app-style-switcher.horizontal.js') }}"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{{ asset('src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
        <script src="{{ asset('src/assets/extra-libs/sparkline/sparkline.js') }}"></script>
        <!--Wave Effects -->
        <script src="{{ asset('dist/js/waves.js') }}"></script>
        <!--Menu sidebar -->
        <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
        <!--Custom JavaScript -->
        <script src="{{ asset('dist/js/custom.min.js') }}"></script>
        <!-- This Page JS -->
        <script src="{{ asset('src/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('src/assets/libs/magnific-popup/meg.init.js') }}"></script>

        <script src="{{ asset('src/assets/libs/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('dist/js/pages/datatable/custom-datatable.js') }}"></script>
        <!-- start - This is for export functionality only -->
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        <script src="{{ asset('dist/js/pages/datatable/datatable-advanced.init.js') }}"></script>
        <script src="{{ asset('src/assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
        <script src="{{ asset('src/assets/extra-libs/jquery.repeater/repeater-init.js') }}"></script>
        <script src="{{ asset('src/assets/extra-libs/jquery.repeater/dff.js') }}"></script>
</body>

</html>
