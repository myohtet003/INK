<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Artwork;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    //
    public function indexArtwork() {
        $artists = Artist::all();
        $artworks = Artwork::all();

        // dd($categories);
        if (request()->wantsJson()) {
            return response()->json([
                'status' => 200,
                'artists' => $artists,
                'artworks' => $artworks
            ]);
        }

        return view("artwork.list-artwork", [
            'artists' => $artists,
            'artworks' =>$artworks
        ]); 
    }

    public function storeArtwork(Request $request)
    {
        // code...
        $validator = validator( request()->all(),

            [
                "artist_id" =>"required",
                "title" =>"required",
                "photo" =>"required",
                "remark" =>"required",
            ]);
        if($validator->fails()){
            return back()->with('status',"Please enter Data!");
        }

        $artwork = new Artwork();

            $artwork->artist_id = request()->artist_id;

            $artwork->title     = request()->title;

            if($request->hasfile('photo'))
            {
                $file        = $request->file('photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();

                $file->move('images/',$name);

                $artwork->photo = $name;

            }
            else
            {
                $artwork->photo = '';
            }

            $artwork->remark   = request()->remark ;

        $artwork->save();

        return redirect('/admin/artwork/list')->with('status','Added Successfully');
    }

    public function deleteArtwork() {
        $id = request()->id;
        Artwork::find($id)->delete();

        return redirect('admin/artwork/list')->with('status', 'Delete Successfully');
    }

    public function showArtwork( )
    {
        // code...
        $id = request()->id;

        $artwork = Artwork::find($id);

        $artists = Artist::all();

        return view('artwork.upd-artwork',[
                                                "artists" =>$artists,
                                                'artwork' =>$artwork,
                                            ]);
    }

    public function updateArtwork(Request $request)
    {
        // code...
        $validator = validator( request()->all(),

            [
                "artist_id" =>"required",
                "title" =>"required",
            ]);
        if($validator->fails()){
            return back()->with('status',"Please enter Data!");
        }

        $id = request()->id;

        // dd($id);

        $artwork =Artwork::find($id);

             $artwork->artist_id = request()->artist_id;

            $artwork->title     = request()->title;

            if($request->hasfile('photo'))
            {
                $file        = $request->file('photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();

                $file->move('images/',$name);

                $artwork->photo = $name;

            }

            $artwork->remark  = request()->remark;

        $artwork->save();

        return redirect('/admin/artwork/list')->with('status','Updated Successfully');
    }
}
