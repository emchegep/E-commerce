@extends('layouts.admin')

@section('title')
    Edit Category
@endsection
@section('content')
    <div class="container-fluid mt-5">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">
            <!--Card content-->
            <div class="card-body">
                <h6 class="mb-2 mb-sm-0 pt-1">
                    <a href="#" target="_blank">Collection</a>
                    <span>/</span>
                    <span>Sub-Category Edit</span>
                    <a href="{{url('subcategory')}}" class="btn btn-danger float-right">back</a>
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
                        <form method="POST" action="{{url('subcategory-update/'.$subcategory->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Category Name</label>
                                        <select name="category_id" id="" class="form-control">
                                            <option value="{{$subcategory->category_id}}">{{$subcategory->category->name}}</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$subcategory->name}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Custom URL (Slug)</label>
                                        <input type="text" class="form-control" placeholder="Enter url" name="url" value="{{$subcategory->url}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" rows="4" class="form-control" placeholder="Enter Description">{{$subcategory->description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control" name="image">

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="mb-2">Current Image</div>
                                        <img src="{{asset('uploads/subcategory/images/'.$subcategory->image)}}" alt="" width="50px">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Priority</label>
                                        <input type="number" class="form-control pl-3" name="priority" value="{{$subcategory->priority}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-check">
                                        <label for="">Show / Hide</label>
                                        <input type="checkbox" class="form-check-input" name="status" {{$subcategory->priority == '1'? 'checked': ''}}>
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