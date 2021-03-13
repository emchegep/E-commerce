@extends('layouts.frontend')

@section('title')
    Collection - Category - Subcategory
@endsection

@section('content')
    <div class="card mb-3 py-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <label class="mb-0">Collection / <a href="{{url('collection/'.$category->group->url)}}">{{$category->group->name}} </a> / {{$category->name}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach($subcategories as $subcategory)
                        <div class="col-md-2 mb-4">
                            <a href="{{url('collection/'.$subcategory->category->group->url.'/'.$subcategory->category->url.'/'.$subcategory->url)}}">
                            <div class="card">
                                    <img src="{{asset('uploads/subcategory/images/'.$subcategory->image)}}" alt="" class="w-100">
                                <div class="card-body bg-light">
                                        <h6 class="mb-0 text-center"><small>{{$subcategory->name}}</small></h6>
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