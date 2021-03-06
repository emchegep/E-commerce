<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index(){
        $groups = Group::where('status','!=','2')->get();
        return view('admin.collection.group.index')->with('groups',$groups);
    }

    public function viewpage(){
        return view('admin.collection.group.create');
    }


    public function store(Request $request){
        $group = new Group();
        $group->name = $request->input('name');
        $group->descrip = $request->input('descrip');
        $group->name = $request->input('name');
        if ($request->input('status') == true)
        {
            $group->status = '1';
        } else {
            $group->status = '0';
        }

        $group->save();
        return redirect()->back()->with('status','Group Added Successfully');
    }

    public function edit($id){
        $group = Group::find($id);

        return view('admin.collection.group.edit')->with('group',$group);
    }

    public function update(Request $request, $id){
        $group = Group::find($id);

        $group->name = $request->input('name');
        $group->descrip = $request->input('descrip');
        $group->status = $request->input('status') == true ? '1' : '0';
        $group->update();

        return redirect()->back()->with('status','Group Updated Successfully');
    }

    public function delete($id){
        $group = Group::find($id);

        $group->status = '2'; //0=show, 1=hide, 2=delete

        $group->update();

        return redirect()->back()->with('status','Group Data Deleted Successfully');
    }

    public function deletedrecords(){
        $groups = Group::where('status','2')->get();
        return view('admin.collection.group.deleted')->with('groups',$groups);
    }

    public function deletedrestore($id){
        $group = Group::find($id);

        $group->status = '0';

        $group->update();

        return redirect('group')->with('status','Group Record restored  Successfully');
    }
}
