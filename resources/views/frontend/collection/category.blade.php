@extends('layouts.frontend')

@section('title')
    Collection - Category
@endsection

@section('content')
    <div class="card mb-3 py-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <label class="mb-0">Collection / {{$group->name}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    @foreach($categories as $category)
                            <div class="col-md-2 mb-4">
                                <a href="{{url('collection/'.$category->group->url.'/'.$category->url)}}">
                                <div class="card">
                                        <img src="{{asset('uploads/category/images/'.$category->image)}}" alt="" class="w-100 card-img-top">
                                    <div class="card-body bg-light">
                                            <h6 class="mb-0 card-title text-center"><small>{{$category->name}}</small></h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection