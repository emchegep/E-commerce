@extends('layouts.admin')

@section('title')
    Category
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
                    <span>Category</span>
                    <a href="{{url('category-deleted')}}" class="btn btn-primary float-right ml-2">Deleted Records</a>
                    <a href="{{url('category-add')}}" class="btn btn-primary float-right">ADD Category</a>
                </h6>
            </div>

        </div>
        <!-- Heading -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Group Name</th>
                                <th>Image</th>
                                <th>Icon</th>
                                <th>Show/Hide</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->group->name}}</td>
                                    <td>
                                        <img src="{{asset('uploads/category/images/'.$category->image)}}" alt="" height="50px">
                                    </td>
                                    <td>
                                        <img src="{{asset('uploads/category/icons/'.$category->icon)}}" alt="" height="50px">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" {{$category->status == '1' ? 'checked': ''}}>
                                    </td>
                                    <td>
                                        <a href="{{url('category-edit/'.$category->id)}}" class="badge badge-primary py-2 px-3">Edit</a>
                                        <a href="" class="badge btn-danger py-2 px-3"  data-toggle="modal" data-target="#categoryDeleteModal">Delete</a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal" id="categoryDeleteModal"  data-backdrop="static"  tabindex="-1" aria-labelledby="groupEditModal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Group</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this Category?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <a href="{{url('category-delete/'.$category->id)}}" type="submit" class="btn btn-primary">Delete</a>
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