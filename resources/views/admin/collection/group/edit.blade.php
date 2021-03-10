@extends('layouts.admin')

@section('title')
    Edit Group
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
                    <span>Group Edit</span>
                    <a href="{{url('group')}}" class="btn btn-danger float-right">back</a>
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
                        <form method="POST" action="{{url('group-update/'.$group->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$group->name}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Custom URL (Slug)</label>
                                        <input type="text" class="form-control" placeholder="Enter Custom URL" name="url" value="{{$group->url}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="descrip" rows="4" class="form-control" placeholder="Enter Description">{{$group->descrip}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-check">
                                        <label for="">Show / Hide</label>
                                        <input type="checkbox" class="form-check-input" name="status" {{$group->status == '1' ? 'checked': ''}}>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">Update</button>
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