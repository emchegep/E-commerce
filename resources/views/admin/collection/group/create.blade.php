@extends('layouts.admin')

@section('title')
    Add Group
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
                    <span>Group</span>
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
                        <form method="POST" action="{{url('group-store')}}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Custom URL (Slug)</label>
                                        <input type="text" class="form-control" placeholder="Enter Custom URL" name="url">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="descrip"rows="4" class="form-control" placeholder="Enter Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-check">
                                        <label for="">Show / Hide</label>
                                        <input type="checkbox" class="form-check-input" name="status">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
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