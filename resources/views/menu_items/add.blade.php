@extends('layouts.app')

@section('content')

    <form method="post" action="/menu_items/add">
        <div class="container col-4 " id="addMenuItemForm" >
            <label > Názov položky </label>
            <input  name="itemName" id="item_name" class="form-control" cols="10" rows="1" placeholder="nejaky nazov">
            <label > Popis </label>
            <input name="itemDesc" id="item_description" class="form-control" cols="30" rows="1">
            <label > Ingrediencie </label>
            <input name="itemIngs" id="item_ingredients" class="form-control" cols="30" rows="1">
            <label > Cena  </label>
            <input name="itemPrice" id="item_price" class="form-control" cols="5" rows="1">
            <button type="submit" class="btn btn-primary btn-sm pull-right" name="submitComment" id="submitItem">Pridať položku</button>
        </div>
    </form>
    <x-alert/>

@endsection
