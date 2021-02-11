@extends('layouts.app')

@section('content')
    <x-alert/>
    @auth
        @if(Auth::user()->name == 'Admin')
            <div class="container pictureForm col-4" id="picture_Form">
                <form action="http://localhost/Vaii_sem_laravel/public/Photos/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="pictureHead" > Názov obrazku </label>
                    <input id="picHead" name="pictureHead" class="form-control"  placeholder="nejaky nazov">
                    <label for="pictureDesc" > Popis </label>
                    <input id="picDesc" name="pictureDesc" class="form-control" >
                    <label for="pictureName"> Obrázok </label>
                    <input id="picName" type="file" name="pictureName" >
                    <button class="btn btn-primary btn-sm pull-right" type="submit" name="submit_picture" id="submit_picture">Pridať obrázok</button>
                    <a class="btn btn-warning btn-sm"  id="cancel_new_picture">Zruš</a>
                </form>
            </div>
        @endif
    @endauth

@endsection

