@extends('layouts.app')

@section('content')



    <div class="container col-4 " id="addMenuItemForm" >
        <form method="post" action="{{route('item.edit_item', $menuItem)}}">   <!--posielam menuitem ako parameter na routu s menom item.edit_item-->
            @csrf
            @method('patch')
            <label > Názov položky </label>
            <input  name="itemName" id="item_name" class="form-control" cols="10" rows="1" value="{{$menuItem->itemName}}">
            <label > Popis </label>
            <input name="itemDesc" id="item_description" class="form-control" cols="30" rows="1" value="{{$menuItem->itemDesc}}">
            <label > Ingrediencie </label>
            <input name="itemIng" id="item_ingredients" class="form-control" cols="30" rows="1" value="{{$menuItem->itemIng}}">
            <label > Cena  </label>
            <input name="itemPrice" id="item_price" class="form-control" cols="5" rows="1" value="{{$menuItem->itemPrice}}">
            <button type="submit" class="btn btn-primary btn-sm pull-right" name="submitComment" id="submitItem">Upraviť položku</button>
        </form>
        <x-alert/>
    </div>

@endsection
