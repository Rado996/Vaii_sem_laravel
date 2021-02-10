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

    public function create(PhotoAddRequest $request)
    {
        Photo::create($request->all());
        return redirect()->back()->with('message' , 'Položka pridaná');

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
