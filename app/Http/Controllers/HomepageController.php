<?php

namespace App\Http\Controllers;

use App\HeaderFooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function AddHeaderFooter(){

        $headerfooter = DB::table('header_footers')->first();
        if(isset($headerfooter)){
            return view('admin.homepage.manage_header_footer');
        }else{
            return view('admin.homepage.add_header_footer');
        }

    }

    public function SaveHeaderFooter(Request $request){

        $this->HeaderFooterValidation($request);

        HeaderFooter::insert([
            'title' =>$request->title,
            'sub_title' =>$request->sub_title,
            'address' =>$request->address,
            'mobile' =>$request->mobile,
            'copyright' =>$request->copyright,
            'status' =>$request->status,
        ]);
        return redirect('/home')->with('message', 'Header & Footer Added Successfully');
    }

    public function ManageHeaderFooter(){
        //$Header = HeaderFooter::all();

        return view('admin.homepage.manage_header_footer');
    }

    public function UpdateHeaderFooter(Request $request){

        $this->HeaderFooterValidation($request);

        $id = $request->id;

        HeaderFooter::where('id', $id)->update([
            'title' =>$request->title,
            'sub_title' =>$request->sub_title,
            'address' =>$request->address,
            'mobile' =>$request->mobile,
            'copyright' =>$request->copyright,
       ]);
       return redirect('/home')->with('message', 'Header & Footer Update Successfully');
    }
// This code is for validation, when insert and update data.
        protected function HeaderFooterValidation($request){
            $this->validate($request,[
                'title' => 'required',
                'sub_title' => 'required',
                'address' => 'required',
                'mobile' => 'required',
                'copyright' => 'required',
                'status' => 'required',
            ]);
        }
}
