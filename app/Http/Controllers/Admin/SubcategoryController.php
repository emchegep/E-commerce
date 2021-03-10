<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class SubcategoryController extends Controller
{
    public function index(){
        $categories = Category::where('status','!=','2')->get();
        $subcategories = Subcategory::where('status','!=','2')->get();
        return view('admin.collection.subcategory.index')->with('subcategories',$subcategories)->with('categories',$categories);
    }

    public function store(Request $request){
        $subcategory = new Subcategory();

        $subcategory->user_id = Auth::user()->id;
        $subcategory->category_id = $request->input('category_id');
        $subcategory->name = $request->input('name');
        $subcategory->url = $request->input('url');
        $subcategory->description = $request->input('description');
        if ($request->hasFile('image')){
            $image_file = $request->file('image');
            $extension = $image_file->getClientOriginalExtension(); //get image extension
            $image_filename = time().'.'.$extension;
            $image_file->move('uploads/subcategory/images/',$image_filename);
            $subcategory->image = $image_filename;
        }
        $subcategory->priority = $request->input('priority');
        $subcategory->status = $request->input('status') == true ? '1':'0';

        $subcategory->save();

        return redirect()->back()->with('status','Subcategory Saved Successfully');
    }

    public function edit($id){
        $categories = Category::where('status','!=','2')->get();
        $subcategory = Subcategory::find($id);
        return view('admin.collection.subcategory.edit')->with('categories',$categories)->with('subcategory',$subcategory);
    }

    public function update(Request $request, $id){
        $subcategory = Subcategory::find($id);

        $subcategory->user_id = Auth::user()->id;
        $subcategory->category_id = $request->input('category_id');
        $subcategory->name = $request->input('name');
        $subcategory->url = $request->input('url');
        $subcategory->description = $request->input('description');
        if ($request->hasFile('image')){
            $destination = 'uploads/subcategory/images/'.$subcategory->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image_file = $request->file('image');
            $extension = $image_file->getClientOriginalExtension(); //get image extension
            $image_filename = time().'.'.$extension;
            $image_file->move('uploads/subcategory/images/',$image_filename); //moving the image to image directory
            $subcategory->image = $image_filename;
        }
        $subcategory->priority = $request->input('priority');
        $subcategory->status = $request->input('status') == true ? '1':'0';

        $subcategory->update();
        return redirect('subcategory')->with('status','Subcategory Updated successfully');
    }

    public function delete($id){
        $subcategory = Subcategory::find($id);

        $subcategory->status = '2';

        $subcategory->update();
        return redirect()->back()->with('status','Subcategory Deleted Successfully');
    }

    public function deletedsubcategories(){
        $subcategories = Subcategory::where('status','2')->get();

        return view('admin.collection.subcategory.deleted')->with('subcategories',$subcategories);
    }

    public function deletedrestore($id){
        $subcategory = Subcategory::find($id);

        $subcategory->status = '0';

        $subcategory->update();
        return redirect()->back()->with('status','Subcategory Deleted Successfully');
    }
}
