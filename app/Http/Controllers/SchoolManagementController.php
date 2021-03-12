<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
class SchoolManagementController extends Controller
{
    public function AddSchool(){
        return view('admin.settings.school.add_school');
    }

    public function SaveSchool(Request $request){
        $this->validate($request,[
            'school_name' => 'required|string',
        ]);
        $data = new School;
        $data->school_name = $request->school_name;
        $data->status = 1;
        $data->save();

        return back()->with('message', 'School Added Successfully');
    }

    public function AllSchool(){
        $school_list = School::all();
        return view('admin.settings.school.all_school', ['school_list'=>$school_list]);
    }

    public function Unpublished($id){
        $School = school::find($id);
        $School->status = 2;
        $School->save();
        return redirect('/School/list')->with('message','School Unpublished Successfully');
    }

    public function Published($id){
        $School = school::find($id);
        $School->status = 1;
        $School->save();
        return redirect('/School/list')->with('message','School Published Successfully');
    }

    public function SchoolEdit($id){
        $School = school::find($id);
        return view('admin.settings.school.edit_school', ['School'=>$School]);
    }

    public function SchoolUpdate(Request $request){
            $this->validate($request,[
                'school_name' => 'required|string',
            ]);

            $School = School::find($request->school_id);
            $School->school_name = $request->school_name;
            $School->save();
            return redirect('/School/list')->with('message','School Updated Successfully');
    }

    public function SchoolDelete($id){
        $School = school::find($id);
        $School->delete();
        return redirect('/School/list')->with('message','School Deleted Successfully');
    }
}
