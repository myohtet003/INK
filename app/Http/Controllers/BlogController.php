<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Blog;

class BlogController extends Controller
{
    //
    public function indexBlog() {
        $artists = Artist::all();
        $blogs = Blog::all();

        // dd($categories);

        if (request()->wantsJson()) {
            return response()->json([
                'status' => 200,
                'artists' => $artists,
                'blogs' => $blogs
            ]);
        }

        return view("blog.list-blog", [
            'artists' => $artists,
            'blogs' =>$blogs
        ]); 
    }

    public function storeBlog(Request $request)
    {
        // code...
        $validator = validator( request()->all(),

            [
                "artist_id" =>"required",
                "title" =>"required",
                "photo" =>"required",
                "description" =>"required",
            ]);
        if($validator->fails()){
            return back()->with('status',"Please enter Data!");
        }

        $blog = new Blog();

            $blog->artist_id = request()->artist_id;

            $blog->title     = request()->title;

            if($request->hasfile('photo'))
            {
                $file        = $request->file('photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();

                $file->move('images/',$name);

                $blog->photo = $name;

            }
            else
            {
                $blog->photo = '';
            }

            $blog->description   = request()->description;
            $blog->remark   = request()->remark;

        $blog->save();

        return redirect('/admin/blog/list')->with('status','Added Successfully');
    }

    public function deleteBlog() {
        $id = request()->id;
        Blog::find($id)->delete();

        return redirect('admin/blog/list')->with('status', 'Delete Successfully');
    }

    public function showBlog( )
    {
        // code...
        $id = request()->id;

        $blog = Blog::find($id);

        $artists = Artist::all();

        return view('blog.upd-blog',[
                                                "artists" =>$artists,
                                                'blog' =>$blog,
                                            ]);
    }

    public function updateBlog(Request $request)
    {
        // code...
        $validator = validator( request()->all(),

            [
                "artist_id" =>"required",
                "title" =>"required",
                "description" =>"required"
            ]);
        if($validator->fails()){
            return back()->with('status',"Please enter Data!");
        }

        $id = request()->id;

        // dd($id);

        $blog =Blog::find($id);

            $blog->artist_id = request()->artist_id;

            $blog->title     = request()->title;

            if($request->hasfile('photo'))
            {
                $file        = $request->file('photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();

                $file->move('images/',$name);

                $blog->photo = $name;

            }

            $blog->description  = request()->description;
            $blog->remark  = request()->remark;

        $blog->save();

        return redirect('/admin/blog/list')->with('status','Updated Successfully');
    }

}
