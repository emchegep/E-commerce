@extends('layouts.admin')

@section('title')
    Category
@endsection
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="subcategoryModal" data-backdrop="static" data-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{url('subcategory-store')}}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sub-Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="">--Select--</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter name" name="name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" rows="4" class="form-control" placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Priority</label>
                                    <input type="number" class="form-control" name="priority">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-check">
                                    <label for="">Show / Hide</label>
                                    <input type="checkbox" class="form-check-input" name="status">
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body">

                <h6 class="mb-0">
                    <a href="#" target="_blank">Collection</a>
                    <span>/</span>
                    <span>Sub-Category</span>
                    <a href="{{url('subcategory-deleted')}}" class="btn btn-primary float-right ml-2">Deleted Records</a>
                    <a class="btn btn-primary float-right"  data-toggle="modal" data-target="#subcategoryModal">ADD Sub Category</a>
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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Show/Hide</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($subcategories as $subcategory)
                                    <tr>
                                        <td>{{$subcategory->id}}</td>
                                        <td>{{$subcategory->name}}</td>
                                        <td>{{$subcategory->category->name}}</td>
                                        <td>
                                            <img src="{{asset('uploads/subcategory/images/'.$subcategory->image)}}" alt="" class="img-fluid" width="50px">
                                        </td>
                                        <td>
                                            <input type="checkbox" class="checkbox" {{$subcategory->status == '1' ? 'checked': ''}}>
                                        </td>
                                        <td>
                                            <a href="{{url('subcategory-edit/'.$subcategory->id)}}" class="badge badge-primary py-2 px-3">Edit</a>
                                            <a href="{{url('subcategory-delete/'.$subcategory->id)}}" class="badge btn-danger py-2 px-3">Delete</a>
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