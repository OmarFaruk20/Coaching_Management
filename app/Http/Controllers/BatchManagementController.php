<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassName;
use App\Batch;
class BatchManagementController extends Controller
{
    public function AddBactch(){
        $classes = ClassName::all();
        return view('admin.settings.batch.add_batch', ['classes'=>$classes]);
    }

    public function SaveBactch(Request $request){
        $this->validate($request, [
            'class_id' => 'required',
            'batch_name' => 'required|string',
            'student_capacity' => 'required',
        ]);

        $Data = new Batch();
        $Data->class_id = $request->class_id;
        $Data->batch_name = $request->batch_name;
        $Data->student_capacity = $request->student_capacity;
        $Data->status = 1;
        $Data->save();
        return back()->with('message','Batch Added Successfully');
    }

    public function Bactchlist(){
        $classes = ClassName::all();
        return view('admin.settings.batch.batch_list', ['classes'=>$classes]);
    }

    public function batchListAjax(Request $request){
        $batches = Batch::where([
            'class_id' => $request->id,
        ])->get();

        if(count($batches)>0){
            return view('admin.settings.batch.batch_list_by_ajax', ['batches'=>$batches]);
        }else{
            return view('admin.settings.batch.batch_empty_error');
        }

    }

    public function batchUnpublished(Request $request){
        $batch = Batch::find($request->batch_id);
        $batch->status = 2;
        $batch->save();

        $batches = Batch::where([
            'class_id' => $request->class_id
        ])->get();
        return view('admin.settings.batch.batch_list_by_ajax', ['batches'=>$batches])->with('message','Batch Un-Publish Successfull');
    }

    public function batchPublished(Request $request){
        $batch = Batch::find($request->batch_id);
        $batch->status = 1;
        $batch->save();

        $batches = Batch::where([
            'class_id' => $request->class_id
        ])->get();
        return view('admin.settings.batch.batch_list_by_ajax', ['batches'=>$batches])->with('message','Batch Publish Successfull');
    }

    public function batchDelete(Request $request){
        $batch = Batch::find($request->batch_id);
        $batch->delete();

        $batches = Batch::where([
            'class_id' => $request->class_id
        ])->get();
        return view('admin.settings.batch.batch_list_by_ajax', ['batches'=>$batches])->with('message','Batch Delete Successfull');
    }

    public function editBatch($id){
        $batch = Batch::find($id);
        $classes = ClassName::all();
        return view('admin.settings.batch.batch_edit_form',[
            'classes' => $classes,
            'batch' => $batch,
        ]);
    }

    public function updateBatch(Request $request){
        $this->validate($request, [
            'class_id' => 'required',
            'batch_name' =>'required|string',
            'student_capacity' => 'required',
        ]);

        $batch = Batch::find($request->batch_id);
        $batch->class_id = $request->class_id;
        $batch->batch_name = $request->batch_name;
        $batch->student_capacity = $request->student_capacity;
        $batch->save();

        return redirect('/batch/list')->with('message','Batch info updated successfully');
    }
}
