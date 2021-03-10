@extends('layouts.admin')

@section('title')
    Add Products
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
                    <span>Products / </span>
                    <span>Add Product</span>
                    <a href="{{url('products')}}" class="btn btn-danger float-right">back</a>
                </h6>
            </div>

        </div>
        <!-- Heading -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Hae!</strong> {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            <form action="{{url('store-products')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="true">Product</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Descriptions</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">SEO</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Product Status</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
                                       <div class="row mt-3">
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label for="">Product Name</label>
                                                   <input type="text" class="form-control" name="name" placeholder="Product Name" required>
                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label for="">Select Sub-category (Eg: Brands)</label>
                                                   <select name="subcategory_id" id="" class="form-control" required>
                                                       <option value="">--Select Sub-category--</option>
                                                       @foreach($subcategories as $subcategory)
                                                           <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                           @endforeach
                                                   </select>
                                               </div>
                                           </div>
                                           <div class="col-md-12">
                                               <div class="form-group">
                                                   <label for="">Custom URL (slug)</label>
                                                   <input type="text" class="form-control" name="url" placeholder="Custom URL" required>
                                               </div>
                                           </div>
                                           <div class="col-md-12">
                                               <div class="form-group">
                                                   <label for="">Small Description</label>
                                                   <textarea type="text" class="form-control" name="small_description" placeholder="Small description about product" required></textarea>
                                               </div>
                                           </div>
                                           <div class="col-md-12">
                                               <div class="form-group">
                                                   <label for="">Product Image</label>
                                                   <input type="file" class="form-control" name="image" placeholder="Product Image" required>
                                               </div>
                                           </div>
                                           <div class="col-md-3">
                                               <div class="form-group">
                                                   <label for="">Original Price</label>
                                                   <input type="number" class="form-control" name="original_price" placeholder="Original Price" required>
                                               </div>
                                           </div>
                                           <div class="col-md-3">
                                               <div class="form-group">
                                                   <label for="">Offer Price</label>
                                                   <input type="number" class="form-control" name="offer_price" placeholder="Offer Price" required>
                                               </div>
                                           </div>
                                           <div class="col-md-3">
                                               <div class="form-group">
                                                   <label for="">Quantity</label>
                                                   <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>
                                               </div>
                                           </div>
                                           <div class="col-md-3">
                                               <div class="form-group">
                                                   <label for="">Priority</label>
                                                   <input type="number" class="form-control" name="priority" placeholder="Priority" required>
                                               </div>
                                           </div>
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">High Lights</label>
                                                    <input type="text" class="form-control mb-3" name="p_highlight_heading" placeholder="High-Light Heading">
                                                    <textarea name="p_highlights" id="" cols="30" rows="4" class="form-control" placeholder="High-Light Description" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Product Description</label>
                                                    <input type="text" class="form-control mb-3" name="p_description_heading" placeholder="Product Heading">
                                                    <textarea name="p_description" id="" cols="30" rows="4" class="form-control" placeholder="Product Description" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Product Details/Specification</label>
                                                    <input type="text" class="form-control mb-3" name="p_details_heading" placeholder="Product Details/Specification Heading">
                                                    <textarea name="p_details" id="" cols="30" rows="10" class="form-control" placeholder="Product Details/Specification" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Meta Title</label>
                                                    <textarea name="meta_title" id="" cols="30" rows="4" class="form-control" placeholder="High-Light Description" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Meta Description</label>
                                                    <textarea name="meta_description" id="" cols="30" rows="4" class="form-control" placeholder="Product Description" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Meta Keywords</label>
                                                    <textarea name="meta_keyword" id="" cols="30" rows="10" class="form-control" placeholder="Product Details/Specification" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
                                      <div class="row">
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="">New Arrivals</label>
                                                  <input type="checkbox" class="form-check" name="new_arrival_products" />
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="">Featured Products</label>
                                                  <input type="checkbox" class="form-check" name="featured_products" />
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="">Popular Products</label>
                                                  <input type="checkbox" class="form-check" name="popular_products" />
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="">Offer Products</label>
                                                  <input type="checkbox" class="form-check" name="offers_products" />
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="">Show / Hide</label>
                                                  <input type="checkbox" class="form-check" name="status" />
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3 text-right">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection