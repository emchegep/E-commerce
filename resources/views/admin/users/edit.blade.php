@extends('layouts.admin')

@section('title')
    Dashboard
@endsection
@section('content')
    <div class="container-fluid mt-5">

        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">

                <h4 class="mb-2 mb-sm-0 pt-1">
                    <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
                    <span>/</span>
                    <span>Registered users - Edit Role</span>
                </h4>

                <form class="d-flex justify-content-center">
                    <!-- Default input -->
                    <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                    <button class="btn btn-primary btn-sm my-0 p" type="submit">
                        <i class="fa fa-search"></i>
                    </button>

                </form>

            </div>

        </div>
        <!-- Heading -->

        <!--Grid row-->
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-12 mb-4">

                <!--Card-->
                <div class="card">

                    <!--Card content-->
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>Current Role: {{$user_roles->role_as}}</h4>
                            isBan Status:
                            @if($user_roles->isban == '0')
                                <label class="badge btn-success py-2 px-3">Not Banned</label>
                            @elseif($user_roles->isban == '1')
                                <label class="badge btn-danger py-2 px-3">Banned</label>
                            @endif
                        <form action="{{ url('role-update/'.$user_roles->id) }}" method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{$user_roles->name}}">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" readonly value="{{$user_roles->email}}">
                            </div>
                            <div class="form-group">
                                <select name="roles" class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="">Default</option>
                                    <option value="admin">Admin</option>
                                    <option value="vendor">Vendor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="isban" class="form-control">
                                    <option value="{{$user_roles->isban}}">--Select Ban and Un-Ban--</option>
                                    <option value="0">Un-Ban</option>
                                    <option value="1">Ban now</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">update</button>
                            </div>
                        </form>

                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>
@endsection