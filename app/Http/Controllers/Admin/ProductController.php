<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function index(){
        $products = Product::where('status','!=','2')->get();
        return view('admin.collection.product.index')->with('products',$products);
    }

    public function create(){
        $subcategories = Subcategory::where('status','!=','2')->get();
        return view('admin.collection.product.create')->with('subcategories',$subcategories);
    }

    public function store(Request $request){
        $product = new Product();

        $product->user_id = Auth::user()->id;
        $product->subcategory_id = $request->input('subcategory_id');
        $product->name = $request->input('name');
        $product->url = $request->input('url');
        $product->small_description = $request->input('small_description');
        $product->priority = $request->input('priority');
        if ($request->hasFile('image')){
            $image_file = $request->file('image');
            $extension = $image_file->getClientOriginalExtension(); //get image extension
            $image_filename = time().'.'.$extension;
            $image_file->move('uploads/products/images/',$image_filename);
            $product->image = $image_filename;
        }

        $product->original_price = $request->input('original_price');
        $product->offer_price = $request->input('offer_price');
        $product->quantity = $request->input('quantity');

        $product->new_arrival_products = $request->input('new_arrival_products') == true ? '1': '0';
        $product->featured_products = $request->input('featured_products') == true ? '1': '0';
        $product->popular_products = $request->input('popular_products') == true ? '1': '0';
        $product->offers_products = $request->input('offers_products') == true ? '1': '0';
        $product->status = $request->input('status') == true ? '1': '0';

        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keyword = $request->input('meta_keyword');

        $product->save();

        return redirect()->back()->with('status','Product Added Successfully');
    }

    public function edit($id){
        $product = Product::find($id);
        $subcategories = Subcategory::where('status','!=','2')->get();
        return view('admin.collection.product.edit')->with('product',$product)->with('subcategories',$subcategories);
    }

    public function update(Request $request,$id){
        $product = Product::find($id);
        $product->user_id = Auth::user()->id;
        $product->subcategory_id = $request->input('subcategory_id');
        $product->name = $request->input('name');
        $product->url = $request->input('url');
        $product->small_description = $request->input('small_description');
        $product->priority = $request->input('priority');
        if ($request->hasFile('image')){
            $destination = 'uploads/products/images/'.$product->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image_file = $request->file('image');
            $extension = $image_file->getClientOriginalExtension(); //get image extension
            $image_filename = time().'.'.$extension;
            $image_file->move('uploads/products/images/',$image_filename);
            $product->image = $image_filename;
        }

        $product->original_price = $request->input('original_price');
        $product->offer_price = $request->input('offer_price');
        $product->quantity = $request->input('quantity');

        $product->new_arrival_products = $request->input('new_arrival_products') == true ? '1': '0';
        $product->featured_products = $request->input('featured_products') == true ? '1': '0';
        $product->popular_products = $request->input('popular_products') == true ? '1': '0';
        $product->offers_products = $request->input('offers_products') == true ? '1': '0';
        $product->status = $request->input('status') == true ? '1': '0';

        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keyword = $request->input('meta_keyword');

        $product->update();

        return redirect()->back()->with('status','Product Updated Successfully');
    }

    public function delete($id){
        $product = Product::find($id);

        $product->status = '2';

        $product->update();

        return redirect()->back()->with('status','Product delete Successfully');
    }

    public function deletedproducts(){
        $products = Product::where('status','2')->get();

        return view('admin.collection.product.deleted')->with('products',$products);
    }

    public function restoreproducts($id){
        $product = Product::find($id);

        $product->status = '0';

        $product->update();

        return redirect()->back()->with('status','Product Restored Successfully');
    }
}
