@extends('layouts.admin')

@section('title')
    Group
@endsection
@section('content')
    <div class="container-fluid mt-5">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body">

                <h6 class="mb-0">
                    <a href="#" target="_blank">Collection</a>
                    <span>/</span>
                    <span>Group Deleted Records</span>
                    <a href="{{url('group')}}" class="btn btn-danger float-right">back</a>
                </h6>
            </div>

        </div>
        <!-- Heading -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Show/Hide</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <td>{{$group->id}}</td>
                                    <td>{{$group->name}}</td>
                                    <td>{{$group->descrip}}</td>
                                    <td>
                                        <input type="checkbox" class="checkbox" {{$group->status == '1' ? 'checked': ''}}>
                                    </td>
                                    <td>
                                        <a href="{{url('group-restore/'.$group->id)}}" class="badge btn-danger py-2 px-3">Restore</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection