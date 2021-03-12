<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use Intervention\Image\Facades\Image;
class SliderController extends Controller
{
    public function AddSlider(){
        return view('admin.slider.add_slider');
    }

    public function UploadSlide(Request $request){

        $this->validate($request, [
            'slide_image' =>'required',
            'slide_title' =>'required',
            'slide_description' =>'required',
            'status' =>'required',
        ]);

        $file = $request->file('slide_image');
        $ext = time().'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(1400, 570)->save(public_path('/slider/'.$ext));

        Slide::insert([
            'slide_image'  => $ext,
            'slide_title'  => $request->slide_title,
            'slide_description'  => $request->slide_description,
            'status'  => $request->status,
        ]);
        return redirect('/home')->with('message', 'Slider Added Successfully');
    }

        public function ManageSlider(){
            $manageslide = Slide::all();

            return view('admin.slider.manage_slider', ['manageslide'=>$manageslide]);
        }

        public function SliderUnpublish($id){
            $slider = Slide::find($id);
            $slider->status = 2;
            $slider->save();
            return redirect('/manage_slider')->with('error_message', 'Slider Unpublish Successfully');
        }

        public function SliderPublish($id){
            $slider = Slide::find($id);
            $slider->status=1;
            $slider->save();
            return redirect('/manage_slider')->with('message', 'Slider Publish Successfully');
        }

        public function EditSlider($id){
            $slide = Slide::find($id);
            return view('admin.slider.edit_slider', ['slide'=>$slide]);
        }

        public function UpdateSlider(request $request){
           $id = $request->slide_id;
           $old_img = $request->slide_image;

           if($request->hasFile('slide_image')){
            $file = $request->file('slide_image');
            $ext = time().'.'.$file->getClientOriginalExtension();

            if(file_exists(public_path('/slider/').$old_img)){
                unlink(public_path('/slider/').$old_img);
            }
            Image::make($file)->resize(1400, 570)->save(public_path('/slider/'.$ext));

           Slide::where('id', $id)->update([
            'slide_image'  => $ext,
            'slide_title'  => $request->slide_title,
            'slide_description'  => $request->slide_description,
            'status'  => $request->status,
           ]);
           }else{
            Slide::where('id', $id)->update([
                'slide_title'  => $request->slide_title,
                'slide_description'  => $request->slide_description,
                'status'  => $request->status,
               ]);
            return redirect('/home')->with('message', 'Slider Update Successfully');
           }
        }

        public function DeleteSlider($id){
            $slider = Slide::find($id);
            $slider->delete();
            return redirect('/manage_slider')->with('message', 'Slider Delete Successfully');
        }

        public function PhotoGallery(){
            $slider = Slide::all();
            return view('admin.slider.photo_gallery', ['slider'=>$slider]);
        }
}
