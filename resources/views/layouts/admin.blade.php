<html>
<head>
    <title>@yield('title') | FabCart - Admin Panel</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{asset('assets/css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/datatable.min.css')}}">
    <style>
        .sidebar-fixed{height:100vh;width:270px;-webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);z-index:1050;background-color:#fff;padding:0 1.5rem 1.5rem}.sidebar-fixed .list-group .active{-webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);box-shadow:0 2px 5px 0 rgba(0,0,0,.16),0 2px 10px 0 rgba(0,0,0,.12);-webkit-border-radius:5px;border-radius:5px}.sidebar-fixed .logo-wrapper{padding:2.5rem}.sidebar-fixed .logo-wrapper img{max-height:50px}@media (min-width:1200px){.navbar,.page-footer,main{padding-left:270px}}@media (max-width:1199.98px){.sidebar-fixed{display:none}}

        .container-for-admin{
            background-color: #eee!important;
        }

        .map-container{
            overflow:hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
        }
        .map-container iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
    </style>
</head>
<body>
<div class="container-for-admin">
<!--Main Navigation-->
<header>
    @include('layouts.inc.adminnavbar')
    @include('layouts.inc.adminsidebar')
</header>
<!--Main Navigation-->
<!--Main layout-->
<main class="pt-5 mx-lg-5">
    @yield('content')
</main>
    <!--Footer-->
    <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">
        @include('layouts.inc.admin-footer')
    </footer>
</div>
<script src="{{asset('assets/bootstrap/js/jquery.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/mdb.min.js')}}"></script>
<script src="{{asset('assets/js/datatables.min.js')}}"></script>
@yield('scripts')
</body>
</html>