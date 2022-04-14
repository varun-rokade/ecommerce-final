<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    // sub category
    public function allsubcategory()
    {
        $admin = Admin::find(1);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sub = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('admin', 'sub', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
            'category_id' => 'required',
            // 'category_icon' => 'required',
        ],[
            'subcategory_name_en.required' => 'Field Category Name(English) empty',
            'subcategory_name_hin.required' => 'Field Category Name(Hindi) empty',
            'category_id.required' => 'Please select any option',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => strtolower(str_replace(' ', '-', $request->subcategory_name_hin)),
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
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sub = SubCategory::findOrfail($id);
        return view('backend.category.subcategory_edit', compact('admin', 'sub', 'categories'));
    }

    public function update(Request $request)
    {
        SubCategory::findOrfail($request->id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => strtolower(str_replace(' ', '-', $request->subcategory_name_hin)),
        ]);

        $notification = array(
            'message' => 'Category updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function delete($id)
    {
        SubCategory::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Category deleted successfully',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }

    // end sub category

    // sub sub category

    public function allsubsubcategory()
    {
        $admin = Admin::find(1);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        // $sub = SubCategory::latest()->get();
        $subsub = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('admin', 'subsub', 'categories'));
    }

    public function getsub($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);
    }

    public function getsubsub($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_encode($subsubcat);
    }

    public function storesub(Request $request)
    {
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            // 'category_icon' => 'required',
        ],[
            'subsubcategory_name_en.required' => 'Field Category Name(English) empty',
            'subsubcategory_name_hin.required' => 'Field Category Name(Hindi) empty',
            'category_id.required' => 'Please select any option',
            'subcategory_id.required' => 'Please select any option',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_hin)),
            // 'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Sub Category inserted successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function editsub($id)
    {
        $admin = Admin::find(1);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sub = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsub = SubSubCategory::findOrfail($id);
        return view('backend.category.sub_subcategory_edit', compact('admin', 'sub', 'categories', 'subsub'));
    }

    public function updatesub(Request $request)
    {
        SubSubCategory::findOrfail($request->id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_hin)),
        ]);

        $notification = array(
            'message' => 'Sub Category updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function deletesub($id)
    {
        SubSubCategory::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Sub Category deleted successfully',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }
    // end sub sub category
}
