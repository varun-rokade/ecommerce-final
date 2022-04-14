<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    public function sliderview()
    {
        $admin = Admin::find(1);
        $slider = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('admin', 'slider'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;
        Slider::insert([
            'title' => $request->title,
            'des' => $request->des,
            'image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Slider inserted successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $admin = Admin::find(1);
        $slider = Slider::findOrfail($id);
        return view('backend.slider.slider_edit', compact('admin', 'slider'));
    }

    public function update(Request $request)
    {
        $slider_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('image')) 
        {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;
            Slider::findOrfail($slider_id)->update([
                'title' => $request->title,
                'des' => $request->des,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider updated successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('manage.slider')->with($notification);
        }
        else
        {
            Slider::findOrfail($slider_id)->update([
                'title' => $request->title,
                'des' => $request->des,
            ]);

            $notification = array(
                'message' => 'Slider updated successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('manage.slider')->with($notification);
        }
    }

    public function delete($id)
    {
        $slider = Slider::findOrfail($id);
        $img = $slider->image;
        unlink($img);
        Slider::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Slider deleted successfully',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Slider::findOrfail($id)->update([
            'status' => 0,
        ]);

        $notification = array(
            'message' => 'Slider Inactive now',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Slider::findOrfail($id)->update([
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Slider Active now',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }
}
