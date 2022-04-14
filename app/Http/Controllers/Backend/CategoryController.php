<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allcategory()
    {
        $admin = Admin::find(1);
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('admin','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            // 'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'Field Category Name(English) empty',
            'category_name_hin.required' => 'Field Category Name(Hindi) empty',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => strtolower(str_replace(' ', '-', $request->category_name_hin)),
            // 'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category inserted successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $admin = Admin::find(1);
        $category = Category::findOrfail($id);
        return view('backend.category.category_edit', compact('admin', 'category'));
    }

    public function update(Request $request)
    {
        Category::findOrfail($request->id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => strtolower(str_replace(' ', '-', $request->category_name_hin)),
        ]);

        $notification = array(
            'message' => 'Category updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function delete($id)
    {
        Category::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Category deleted successfully',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }
}
