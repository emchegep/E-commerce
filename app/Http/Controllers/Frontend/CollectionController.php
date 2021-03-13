<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function index(){
        $groups = Group::where('status','0')->get();
        return view('frontend.collection.index')->with('groups',$groups);
    }

    public function groupview($group_url){
        $group = Group::where('url',$group_url)->first();
        $group_id = $group->id;

        $categories = Category::where('group_id',$group_id)->where('status','!=','2')->where('status','0')->get();
        return view('frontend.collection.category')->with('categories',$categories)->with('group',$group);
    }

    public function categoryview($group_url,$category_url){
        $category = Category::where('url',$category_url)->first();
        $category_id = $category->id;

        $subcategories = Subcategory::where('category_id',$category_id)->where('status','!=','2')->where('status','0')->get();
        return view('frontend.collection.subcategory')->with('subcategories',$subcategories)->with('category',$category);
    }

    public function subcategoryview($group_url,$category_url,$subcategory_url){
        $subcategory = Subcategory::where('url',$subcategory_url)->first();
        $subcategory_id = $subcategory->id;

        $products = Product::where('subcategory_id',$subcategory_id)->where('status','!=','2')->where('status','0')->get();
        return view('frontend.collection.product')->with('products',$products)->with('subcategory',$subcategory);
    }
}
