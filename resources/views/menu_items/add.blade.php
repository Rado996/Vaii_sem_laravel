@extends('layouts.app')

@section('content')
        <div class="container col-4 " id="addMenuItemForm" >
            <form method="post" action="http://localhost/Vaii_sem_laravel/public/menu_items/add">
                @csrf
                <label > Názov položky </label>
                <input  name="itemName" id="item_name" class="form-control" cols="10" rows="1" placeholder="Názov položky">
                <label > Popis </label>
                <input name="itemDesc" id="item_description" class="form-control" cols="30" rows="1">
                <label > Ingrediencie </label>
                <input name="itemIng" id="item_ingredients" class="form-control" cols="30" rows="1">
                <label > Cena  </label>
                <input name="itemPrice" id="item_price" class="form-control" cols="5" rows="1">
                <button type="submit" class="btn btn-primary btn-sm pull-right" name="submitComment" id="submitItem">Pridať položku</button>
            </form>
            <x-alert/>
        </div>

@endsection
