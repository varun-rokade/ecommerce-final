<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImgs;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function addproduct()
    {
        $admin = Admin::find(1);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('admin', 'categories', 'brands'));
    }

    public function store(Request $request)
    {
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(600, 1000)->save('upload/products/thumbnails/'.$name_gen);
        $save_url = 'upload/products/thumbnails/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => strtolower(str_replace(' ', '-', $request->product_name_hin)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_des_en' => $request->short_des_en,
            'short_des_hin' => $request->short_des_hin,
            'long_des_en' => $request->long_des_en,
            'long_des_hin' => $request->long_des_hin,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        //multi image upload

        $images = $request->file('multi_img');
        foreach($images as $img)
        {
            $name_gen1 = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(400, 500)->save('upload/products/images/'.$name_gen1);
            $save_url1 = 'upload/products/images/'.$name_gen1;

            MultiImgs::insert([
                'product_id' => $product_id,
                'photo' => $save_url1,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product inserted successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('manage.product')->with($notification);
        //end multi image upload
    }

    public function manage()
    {
        $admin = Admin::find(1);
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('admin', 'products'));
    }

    public function editproduct($id)
    {
        $multiimg = MultiImgs::where('product_id', $id)->get();
        $admin = Admin::find(1);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $sub = SubCategory::latest()->get();
        $subsub = SubSubCategory::latest()->get();
        $product = Product::findOrfail($id);
        return view('backend.product.product_edit', compact('admin', 'categories', 'brands', 'sub', 'subsub', 'product', 'multiimg'));
    }

    public function updateproduct(Request $request)
    {
        Product::findOrfail($request->id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => strtolower(str_replace(' ', '-', $request->product_name_hin)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_des_en' => $request->short_des_en,
            'short_des_hin' => $request->short_des_hin,
            'long_des_en' => $request->long_des_en,
            'long_des_hin' => $request->long_des_hin,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product updated successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('manage.product')->with($notification);
    }

    public function updateimage(Request $request)
    {
        $imgs = $request->multi_img;
        foreach($imgs as $id => $img)
        {
            $imgdel = MultiImgs::findOrfail($id);
            unlink($imgdel->photo);
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(400, 500)->save('upload/products/images/'.$name_gen);
            $save_url = 'upload/products/images/'.$name_gen;

            MultiImgs::where('id', $id)->update([
                'photo' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product images updated successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function updatethumbnail(Request $request)
    {
        $product_id = $request->id;
        $old_img = $request->old_image;
        unlink($old_img);
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(400, 500)->save('upload/products/thumbnails/'.$name_gen);
        $save_url = 'upload/products/thumbnails/'.$name_gen;

        Product::findOrfail($product_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product thumbnail updated successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function deletemulti($id)
    {
        $old_img = MultiImgs::findOrfail($id);
        unlink($old_img->photo);
        MultiImgs::findOrfail($id)->delete();

        $notification = array(
            'message' => 'Product image deleted successfully',
            'alert-type' => 'error',
        );

        return redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        Product::findOrfail($id)->update([
            'status' => 0,
        ]);

        $notification = array(
            'message' => 'Product Inactive now',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Product::findOrfail($id)->update([
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Product Active now',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    public function deleteproduct($id)
    {
        $product = Product::findOrfail($id);
        unlink($product->product_thumbnail);
        Product::findOrfail($id)->delete();

        $image = MultiImgs::where('product_id', $id)->get();

        foreach($image as $img)
        {
            unlink($img->photo);
            MultiImgs::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted successfully',
            'alert-type' => 'error',
        );

        return redirect()->back()->with($notification);
    }
}
