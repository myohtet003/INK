<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();

        if (request()->wantsJson()) {
            return response()->json([
                'status' => 200,
                'artists' => $artists
            ]);
        }

        return view("artist.list-artist", [
            'artists' => $artists
        ]);
    }


    public function store(Request $request)
    {
        $validator = validator(
            request()->all(),

            [
                "name" => "required",
                "position" => "required",
                "photo" => "required",
            ]
        );
        if ($validator->fails()) {
            return back()->with('status', "Please enter Data!");
        }

        $artist = new Artist();

        $artist->name     = request()->name;
        $artist->position     = request()->position;
        $artist->fb_Link = request()->fb_link;
        $artist->viber_Link = request()->viber_link;
        $artist->phone = request()->phone;

        if ($request->hasfile('photo')) {
            $file        = $request->file('photo');
            $name        = $file->getClientOriginalName();
            $extension   = $file->getClientOriginalExtension();

            $file->move('images/', $name);

            $artist->photo = $name;
        } else {
            $artist->photo = '';
        }
        $artist->status = request()->status;
        $artist->remark = request()->remark;

        $artist->save();

        return redirect('/admin/artist/list')->with('status', 'Added Successfully');
    }

    public function delete() {
        $id = request()->id;

        Artist::find($id)->delete();

        return redirect('admin/artist/list')->with('status', 'Delete Successfully');
    }

    public function show( )
    {
        // code...
        $id = request()->id;

        $artist = Artist::find($id);

        return view('artist.upd-artist',[
                                                'artist' =>$artist,
                                            ]);
    }

    public function update(Request $request)
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

        $artist =Artist::find($id);

            $artist->name     = request()->name;
            $artist->position     = request()->position;
            $artist->fb_Link = request()->fb_link;
            $artist->viber_Link = request()->viber_link;
            $artist->phone = request()->phone;

            if($request->hasfile('photo'))
            {
                $file        = $request->file('photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();

                $file->move('images/',$name);
                $artist->photo = $name;

            }

            $artist->status  = request()->status;
            $artist->remark  = request()->remark;

        $artist->save();

        return redirect('/admin/artist/list')->with('status','Updated Successfully');
    }

}
