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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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


        <div style="height:9.5rem"></div>

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div class="card card-body">
                        <h3 class="mb-0">{{__('messages.login')}}</h3>

                        <form action="{{ url('admin/login') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.userName')}} </label>
                                <div class="col-sm-9">
                                    <input type="text" name="user_name" class="form-control" autocomplete="false"
                                    id="inputEmail3"  >
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.userPassword')}} </label>
                                <div class="col-sm-9">
                                    <input type="password" name="password"  class="form-control" autocomplete="false"
                                  >
                                </div>
                            </div>



                            <div class="form-group mb-0">
                                <div class="offset-sm-3 col-sm-9 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info waves-effect waves-light mt-2 "
                                        style="background-color:#00b9f0">{{__('buttons.login')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>






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
