<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;
class ClassManagementController extends Controller
{
    public function AddClass(){
        return view('admin.settings.class.add_class');
    }

    public function SaveClass(Request $request){
        $this->validate($request, [
            'class_name' => 'required|string',
        ]);

        $Class = new ClassName();
        $Class->class_name = $request->class_name;
        $Class->status = 1;
        $Class->save();
        return back()->with('message', 'Class Added Successfully!');
    }

    public function ClassList(){
        $class_list = ClassName::all();
        return view('admin.settings.class.class_list', ['class_list'=>$class_list]);
    }

    public function Unpublished($id){
        $Class = ClassName::find($id);
        $Class->status = 2;
        $Class->save();
        return redirect('/Class/List')->with('message','Class Unpublish Successfully!');
    }

    public function Publish($id){
        $Class = ClassName::find($id);
        $Class->status = 1;
        $Class->save();
        return redirect('/Class/List')->with('message','Class Publish Successfully!');
    }

    public function ClassEdit($id){
        $ClassEdit = ClassName::find($id);
        return view('admin.settings.class.edit_class', ['ClassEdit'=>$ClassEdit]);
    }

    public function UpdateClass(Request $request){
        $this->validate($request, [
            'class_name' => 'required|string',
        ]);
        $update = ClassName::find($request->class_id);
        $update->class_name = $request->class_name;
        $update->save();
        return redirect('/Class/List')->with('message','Class Updated Successfully!');
    }
    public function DeleteClass($id){
        $delete = ClassName::find($id);
        $delete->delete();
        return redirect('/Class/List')->with('message','Class Delete Successfully!');
    }
}
