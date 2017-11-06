<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'O.I.S') }}</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('css/lib/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/lib/font-awesome.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/lib/jquery.dataTables.min.css') }}">
        
        <link rel="stylesheet" href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}">
        
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/template/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/template/_all-skins.min.css') }}">
        
        <!-- Application Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini" ng-app="yukon">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">{{ config('app.name', 'O.I.S') }}</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>{{ config('app.name', 'O.I.S') }}</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    
                    @if(Auth::check())
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown user user-menu">
                                <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs">Home</span>
                                </a>
                            </li>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs">{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                    </div>
                    @endif
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                   @include('partials.menu')
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
        </div>
        <script> var Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token()]);?></script>
        <script src="{{ asset('js/lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('js/lib/jquery/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/lib/jquery/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/lib/template/adminlte.min.js') }}"></script>

        
        @yield('modulescripts')
    </body>
</html>
