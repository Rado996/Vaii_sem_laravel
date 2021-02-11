<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoAddRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{

    /**
     * PhotoController constructor.
     */
    public function __construct()
    {
       $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $photos = Photo::all();
        return view('Photos.index', compact('photos'));     //compact vklada do contentu
    }

    public function add()
    {

        return view('Photos.add');
    }

    public function edit($id)
    {
        $photo = Photo::find($id);
        return view('Photos.edit', compact('photo'));
    }

    public function create(PhotoAddRequest $request)
    {
//        $request->validate([
//            'pictureHead' => 'required|min:3|max:30|regex:/^[^\s].+[^\s]$/',
//            'pictureDesc' => 'required|min:3|max:300|regex:/^[^\s].+[^\s]$/',
//            'pictureName' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
//        ]);

        $photo = Photo::create($request->all());
        $file = $request->pictureName;
        $photoName = $file->getClientOriginalName();
        $file->storeAS('uploads' ,$photoName, 'public');
        $photo->pictureName = $file->getClientOriginalName();
        $photo->save();

        return redirect()->back()->with('message' , 'Fotka pridaná');

    }

    public function update(PhotoAddRequest $request, $id)
    {
        $photo = Photo::find($id);
        Storage::delete('/storage/app/public/uploads'. $photo->pictureName);
//        $photo->pictureHead = $request->pictureHead;
//        $photo->pictureDesc = $request->pictureDesc;
//        $photo->pictureName = $request->pictureName->getClientOriginalName();
        $request->pictureName->storeAS('uploads' ,$request->pictureName->getClientOriginalName(), 'public');
        $photo->update(['pictureHead' => $request->pictureHead,
            'pictureDesc'=> $request->pictureDesc,
            'pictureName' => $request->pictureName->getClientOriginalName()
        ]);
//        $photo->save();
        return redirect()->back()->with('message' , 'Položka upravená');
    }

    public function delete( $id)
    {
        $photo = Photo::find($id);
        Storage::delete('/storage/app/public/uploads'. $photo->pictureName);
        $photo->delete();
        return redirect()->back()->with('message' , 'Položka Vymazaná');

    }

}
