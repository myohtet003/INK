<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function listCategory() {
        $categories = Category::all();

        // dd($categories);

        return view("category.list-category",[

                                                'categories' =>$categories
                                             ]);
    }

    public function addCategory(Request $request)
    {
        // code...
        $validator = validator( request()->all(),

            [
                "name" =>"required",
                "photo" =>"required",
                "remark" =>"required",
            ]);
        if($validator->fails()){
            return back()->with('status',"Please enter Data!");
        }

        $category = new Category();

            $category->name     = request()->name;

            if($request->hasfile('photo'))
            {
                $file        = $request->file('photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();

                $file->move('images/',$name);

                $category->photo = $name;

            }
            else
            {
                $category->photo = '';
            }

            $category->remark   = request()->remark;

        $category->save();

        return redirect('/admin/category/list')->with('status','Added Successfully');
    }

    public function deleteCategory()
    {
        $id = request()->id;

        Category::find($id) -> delete();

        return redirect('/admin/category/list')->with('status', 'Deleted Successfully');
    }

    public function updCategory( )
    {
        // code...
        $id = request()->id;

        $category = Category::find($id);

        return view('category.upd-category',[

                                                'category' =>$category,
                                            ]);
    }

    public function updateCategory(Request $request)
    {
        // code...
        $validator = validator( request()->all(),

            [
                "name" =>"required",
            ]);
        if($validator->fails()){
            return back()->with('status',"Please enter Data!");
        }

        $id = request()->id;

        // dd($id);

        $category =Category::find($id);

            $category->name     = request()->name;

            if($request->hasfile('photo'))
            {
                $file        = $request->file('photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();

                $file->move('images/',$name);

                $category->photo = $name;

            }

            $category->remark  = request()->remark;

        $category->save();

        return redirect('/admin/category/list')->with('status','Updated Successfully');
    }
}

