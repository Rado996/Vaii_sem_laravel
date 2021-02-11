<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoAddRequest;
use App\Models\Photo;
use Illuminate\Http\Request;

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

    public function edit(Photo $photo)
    {
        return view('Photos.edit', compact('photo'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'pictureHead' => 'required|min:3|max:30|regex:/^[^\s].+[^\s]$/',
            'pictureDesc' => 'required|min:3|max:300|regex:/^[^\s].+[^\s]$/',
            'pictureName' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $photo = Photo::create($request->all());
        $file = $request->pictureName;
        $photoName = $file->getClientOriginalName();
        $file->storeAS('uploads' ,$photoName, 'public');
        $photo->pictureName = $file->getClientOriginalName();
        $photo->save();

        return redirect()->back()->with('message' , 'Fotka pridaná');

    }

    public function update(PhotoAddRequest $request, Photo $photo)
    {
        $photo->update(['picHead' => $request->picHead,
            'picDesc'=> $request->picDesc,
            'picName' => $request->picName
        ]);

        return redirect()->back()->with('message' , 'Položka upravená');
    }

    public function delete(Photo $photo)
    {


    }

}
