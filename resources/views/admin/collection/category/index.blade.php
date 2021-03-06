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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-striped">
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
                                        <img src="{{asset('uploads/category/images/'.$category->image)}}" alt="" width="50px">
                                    </td>
                                    <td>
                                        <img src="{{asset('uploads/category/icons/'.$category->icon)}}" alt="" width="50px">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" {{$category->status == '1' ? 'checked': ''}}>
                                    </td>
                                    <td>
                                        <a href="{{url('category-edit/'.$category->id)}}" class="badge badge-primary py-2 px-3">Edit</a>
                                        <a href="{{url('category-delete/'.$category->id)}}" class="badge btn-danger py-2 px-3">Delete</a>
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