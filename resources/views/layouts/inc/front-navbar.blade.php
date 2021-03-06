<div class="white scrolling-navbar sticky-top  bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg">
                    <div class="container">

                        <!-- Brand -->
                        <a class="navbar-brand waves-effect" href="/">
                            <strong class="blue-text">FabCart</strong>
                        </a>

                        <!-- Collapse -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Links -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <!-- Left -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right -->
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link waves-effect" href="#">
                                        <i class="fa fa-home pr-1"></i>Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
                                        <i class="fas fa-compress-arrows-alt pr-1"></i>Collections</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank">
                                        <i class="fa fa-cart-plus pr-1"></i>New Arrivals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">
                                        <i class="fa fa-align-justify pr-1"></i>All Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link waves-effect">
                                        <span class="badge red z-depth-1 mr-1"> 1 </span>
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="clearfix d-none d-sm-inline-block"> Cart </span>
                                    </a>
                                </li>
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa fa-user pr-1"></i>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a href="{{url('my-profile')}}" class="dropdown-item">
                                                My Profile
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>

                        </div>

                    </div>
                </nav>
                <!-- Navbar -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 py-2 bg-info shadow">
                @php
                $groups = App\Models\Group::where('status','!=','2')->get();
                @endphp
                @foreach($groups as $group)
                    <a href="{{url('collection/'.$group->url)}}" class="px-4 text-white">{{$group->name}}</a>
                    @endforeach
            </div>
        </div>
    </div>
</div>
