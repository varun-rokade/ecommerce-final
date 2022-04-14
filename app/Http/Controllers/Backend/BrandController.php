<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function allbrand()
    {
        $admin = Admin::find(1);
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('admin','brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'Field Brand Name(English) empty',
            'brand_name_hin.required' => 'Field Brand Name(Hindi) empty',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin' => strtolower(str_replace(' ', '-', $request->brand_name_hin)),
            'brand_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Brand inserted successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $admin = Admin::find(1);
        $brands = Brand::findOrfail($id);
        return view('backend.brand.brand_edit', compact('admin', 'brands'));
    }

    public function update(Request $request)
    {
        $brand_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('brand_image')) 
        {
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;
            Brand::findOrfail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => strtolower(str_replace(' ', '-', $request->brand_name_hin)),
                'brand_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Brand updated successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.brand')->with($notification);
        }
        else
        {
            Brand::findOrfail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => strtolower(str_replace(' ', '-', $request->brand_name_hin)),
            ]);

            $notification = array(
                'message' => 'Brand updated successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('all.brand')->with($notification);
        }
    }
    
    public function delete($id)
    {
        $brand = Brand::findOrfail($id);
        $img = $brand->brand_image;
        unlink($img);
        Brand::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Brand deleted successfully',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }
}
