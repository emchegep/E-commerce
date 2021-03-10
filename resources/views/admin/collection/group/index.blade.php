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
                    <span>Group</span>
                    <a href="{{url('group-deleted-records')}}" class="btn btn-primary float-right ml-2">Deleted Records</a>
                    <a href="{{url('group-add')}}" class="btn btn-primary float-right">ADD GROUPS</a>
                </h6>
            </div>

        </div>
        <!-- Heading -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
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
                                    <a href="{{url('group-edit/'.$group->id)}}" class="badge btn-primary py-2 px-3">Edit</a>
                                    <a href="" class="badge btn-danger py-2 px-3"  data-toggle="modal" data-target="#groupEditModal">Delete</a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal" id="groupEditModal"  data-backdrop="static"  tabindex="-1" aria-labelledby="groupEditModal" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Group</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this Group?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <a href="{{url('group-delete/'.$group->id)}}" type="submit" class="btn btn-primary">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection