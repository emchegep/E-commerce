@extends('layouts.frontend')

@section('title')
    Collection - Category - Subcategory - Products
@endsection

@section('content')
    <div class="card mb-3 py-3">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <label class="mb-0">Collection / <a href="{{url('collection/'.$subcategory->category->group->url)}}">{{$subcategory->category->group->name}} </a> / <a href="{{url('collection/'.$subcategory->category->group->url.'/'.$subcategory->category->url)}}">{{$subcategory->category->name}}</a> / {{$subcategory->name}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach($products as $product)
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="">
                                            <img src="{{asset('uploads/products/images/'.$product->image)}}" alt="" class="w-100">
                                        </div>
                                    </div>
                                    <div class="col-md-7 border-right border-left">
                                        <a href="{{url('collection/'.$product->subcategory->category->group->url.'/'.$product->subcategory->category->url).'/'.$product->subcategory->url}}">
                                            <h5 class="mb-2">{{$product->name}}</h5>
                                        </a>
                                        <div class="">
                                            <h6 class="text-dark mb-0">{{$product->small_description}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-right">
                                            <h6 class="font-italic text-dark badge badge-warning px-3 py-1">{{$product->sale_tag}}</h6>
                                            <h6 class="font-italic"><s>Kshs: {{number_format($product->original_price)}}</s></h6>
                                            <h6 class="font-italic font-weight-bold">Kshs: {{number_format($product->offer_price)}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection