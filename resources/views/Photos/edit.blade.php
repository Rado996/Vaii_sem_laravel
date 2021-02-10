@extends('layouts.app')

@section('content')

    @auth
        @if(Auth::user()->name == 'Admin')
            <x-alert/>
                <div class="container pictureForm col-4" id="picture_Form">
                    <form action="http://localhost/Vaii_sem_laravel/public/Photos/update" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <label for="pictureHead" > Nazov obrázku </label>
                        <input id="picHead" name="pictureHead" class="form-control"  value="{{$photo->picHead}}">
                        <label for="pictureDesc" > Popis </label>
                        <input id="picDesc" name="pictureDesc" class="form-control" value="{{$photo->picDesc}}">
                        <a class="btn btn-warning btn-sm"  id="cancel_new_picture">Zruš</a>
                    </form>
                </div>
        @endif
    @endauth

@endsection
