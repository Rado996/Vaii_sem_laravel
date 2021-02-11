@extends('layouts.app')

@section('content')

    @auth
        @if(Auth::user()->name == 'Admin')
            <x-alert/>
                <div class="container pictureForm col-4" id="picture_Form">
                    <form action="{{route('photos.update', $photo->id)}}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <label for="pictureHead" > Nazov obrázku </label>
                        <input id="picHead" name="pictureHead" class="form-control"  value="{{$photo->pictureHead}}">
                        <label for="pictureDesc" > Popis </label>
                        <input id="picDesc" name="pictureDesc" class="form-control" value="{{$photo->pictureDesc}}">
                        <label for="pictureName"> Obrázok </label>
                        <input id="picName" type="file" name="pictureName" value="{{$photo->pictureName}}" >
                        <button class="btn btn-primary btn-sm pull-right" type="submit" name="submit_picture" id="submit_picture">Pridať obrázok</button>
                        <a class="btn btn-warning btn-sm"  href="{{route('photos.index')}}" id="cancel_new_picture">Zruš</a>

                    </form>
                </div>
        @endif
    @endauth

@endsection
