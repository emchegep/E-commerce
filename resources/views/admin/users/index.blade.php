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

                <h6 class="mb-2 mb-sm-0 pt-1">
                    <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
                    <span>/</span>
                    <span>Registered Users</span>
                </h6>

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
            <div class="col-md-6">
                <form action="{{url('registered-user')}}" method="GET">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <select name="roles" id="" class="form-control">
                                    @if(isset($_GET['roles']))
                                        <option value="{{$_GET['roles']}}">{{$_GET['roles']}}</option>
                                        <option value="">Default</option>
                                        <option value="admin">admin</option>
                                        <option value="vendor">vendor</option>
                                    @else
                                        <option value="">Default</option>
                                        <option value="admin">admin</option>
                                        <option value="vendor">vendor</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary py-2">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card p-3">
                <h5>
                    Total Users Online:
                    @php $u_total = '0'; @endphp
                    @foreach($users as $user)
                        @php
                            if ($user->isUserOnline())
                                $u_total = $u_total + 1;
                        @endphp
                    @endforeach
                    <span class="badge badge-success">{{ $u_total }}</span>
                </h5>
            </div>
            </div>
            <!--Grid column-->
            <div class="col-md-12 mb-4">

                <!--Card-->
                <div class="card">

                    <!--Card content-->
                    <div class="card-body">

                        <table id="datatable1" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-center">Online/Offline</th>
                                <th class="text-center">isBan/unBan</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role_as}}</td>
                                <td class="text-center">
                                    @if($user->isUserOnline())
                                        <label class="badge btn-success py-2 px-3">Online</label>
                                    @else
                                        <label class="badge btn-warning py-2 px-3">Offline</label>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($user->isban == '0')
                                        <label class="badge btn-success py-2 px-3">Not Banned</label>
                                    @elseif($user->isban == '1')
                                        <label class="badge btn-danger py-2 px-3">Banned</label>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{url('role-edit/'.$user->id)}}" class="badge badge-pill btn-primary px-3 py-2">EDIT</a>
                                    <a href="" class="badge badge-pill btn-danger px-3 py-2">Delete</a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{--{{$users->links()}}--}}
                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable1').DataTable();
        } );
    </script>
    @endsection