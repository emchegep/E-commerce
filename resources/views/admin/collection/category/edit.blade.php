@extends('layouts.admin')

@section('title')
    Edit Category
@endsection
@section('content')
    <div class="container-fluid mt-5">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
            <!--Card content-->
            <div class="card-body d-sm-flex justify-content-between">
                <h6 class="mb-2 mb-sm-0 pt-1">
                    <a href="#" target="_blank">Collection</a>
                    <span>/</span>
                    <span>Category Edit</span>
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
                        <form method="POST" action="{{url('category-update/'.$category->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Group Name</label>
                                        <select name="group_id" id="" class="form-control">
                                            <option value="{{$category->group_id}}">{{$category->group->name}}</option>
                                            @foreach($groups as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$category->name}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" rows="4" class="form-control" placeholder="Enter Description">{{$category->description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control mb-2" name="category_img">
                                        <img src="{{asset('uploads/category/images/'.$category->image)}}" alt="" width="50px" class="img-fluid pl-3">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Icon</label>
                                        <input type="file" class="form-control mb-2" name="category_icon">
                                        <img src="{{asset('uploads/category/icons/'.$category->icon)}}" alt="" width="50px" class="img-fluid pl-3">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-check">
                                        <label for="">Show / Hide</label>
                                        <input type="checkbox" class="form-check-input" name="status" {{$category->status == '1'?'checked':''}}>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection