<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    public function index(){
        $categories = Category::where('status','!=','2')->get();
        return view('admin.collection.category.index')->with('categories',$categories);
    }

    public function create(){
        $groups = Group::where('status','!=','2')->get();
        return view('admin.collection.category.create')->with('groups',$groups);
    }

    public function store(Request $request){
        $category = new Category();

        $category->group_id = $request->input('group_id');
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        if ($request->hasFile('category_img')){
//            $destination = 'uploads/category/images/'.$category->image;
//            if(File::exists($destination)){
//                File::delete($destination);
//            }
            $image_file = $request->file('category_img');
            $extension = $image_file->getClientOriginalExtension(); //get image extension
            $image_filename = time().'.'.$extension;
            $image_file->move('uploads/category/images/',$image_filename);
            $category->image = $image_filename;
        }

        if ($request->hasFile('category_icon')){
//            $destination = 'uploads/category/icons/'.$category->icon;
//            if(File::exists($destination)){
//                File::delete($destination);
//            }
            $icon_file = $request->file('category_icon');
            $extension = $icon_file->getClientOriginalExtension(); //get image extension
            $icon_filename = time().'.'.$extension;
            $icon_file->move('uploads/category/icons/',$icon_filename);
            $category->icon = $icon_filename;
        }

        $category->status = $request->input('status') == true ? '1' : '0';

        $category->save();

        return redirect()->back()->with('status','Category Data added successfully');
    }

    public function edit($id){
        $groups = Group::where('status','!=','2')->get();
        $category = Category::find($id);
        return view('admin.collection.category.edit')->with('category',$category)->with('groups',$groups);
    }

    public function update(Request $request, $id){
        $category = Category::find($id);

        $category->group_id = $request->input('group_id');
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        if ($request->hasFile('category_img')){
            $destination = 'uploads/category/images/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image_file = $request->file('category_img');
            $extension = $image_file->getClientOriginalExtension(); //get image extension
            $image_filename = time().'.'.$extension;
            $image_file->move('uploads/category/images/',$image_filename);
            $category->image = $image_filename;
        }

        if ($request->hasFile('category_icon')){
            $destination = 'uploads/category/icons/'.$category->icon;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $icon_file = $request->file('category_icon');
            $extension = $icon_file->getClientOriginalExtension(); //get image extension
            $icon_filename = time().'.'.$extension;
            $icon_file->move('uploads/category/icons/',$icon_filename);
            $category->icon = $icon_filename;
        }

        $category->status = $request->input('status') == true ? '1' : '0';

        $category->update();

        return redirect()->back()->with('status','Category Data Upated successfully');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->status = '2'; //2=deleted 0=show 1=hide

        $category->update();

        return redirect()->back()->with('status','Category Deleted Successfully');
    }

    public function deletedcategories(){
        $categories = Category::where('status','2')->get();

        return view('admin.collection.category.deleted')->with('categories',$categories);
    }

    public function deletedrestore($id){
        $category = Category::find($id);
        $category->status = '0'; //2=deleted 0=show 1=hide

        $category->update();

        return redirect('category')->with('status','Category Restored Successfully');
    }
}
