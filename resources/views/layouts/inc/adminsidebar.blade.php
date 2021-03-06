
<!-- Sidebar -->
<div class="sidebar-fixed position-fixed">

    <a class="logo-wrapper waves-effect">
        <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid mt-2" alt="">
    </a>

    <div class="list-group list-group-flush mt-3">
        <a href="#" class="list-group-item active waves-effect">
            <i class="fa fa-pie-chart mr-3"></i>Dashboard
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-user mr-3"></i>Profile</a>
        <a href="#submenu" class="list-group-item list-group-item-action waves-effect dropdown-toggle" id="navbarScrollingDropdown" data-toggle="collapse">
            <i class="fa fa-table mr-3"></i>Collections</a>
        <ul class="collapse" aria-labelledby="navbarScrollingDropdown" id="submenu">
            <a class="dropdown-item" href="{{url('group')}}"><i class="fa fa-user mr-2"></i> Group</a>
            <a class="dropdown-item" href="{{url('category')}}"><i class="fa fa-user mr-2"></i>Category</a>
            <a class="dropdown-item" href="{{url('subcategory')}}"><i class="fa fa-user mr-2"></i>Sub-Category</a>
            <a class="dropdown-item" href="{{url('products')}}"><i class="fa fa-user mr-2"></i>Products</a>
        </ul>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-map mr-3"></i>Maps</a>
        <a href="{{url('registered-user')}}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-users mr-3"></i>Registered Users</a>
    </div>

</div>
<!-- Sidebar -