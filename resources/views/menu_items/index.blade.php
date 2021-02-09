@extends('layouts.app')

@section('content')

    @foreach($menuItems as $menuItem)
    <div class="container-fluid " id="ponuka-menu{{$menuItem->id}}">
        <table>
            <tr>
                <td >{{$menuItem->itemName}}</td>
                <td  class="cena"> {{$menuItem->itemPrice}}€ </td>
            </tr>
            <tr>
                <td> {{$menuItem->itemDesc}} </td>
                <td>

                    <div class="edit"><a class="editItembtn" data-item="menu" data-itid="{{$menuItem->id}}" id="editMenuItem{{$menuItem->id}}" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                                <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.247-.013-.574.05-.88.479a11.01 11.01 0 0 0-.5.777l-.104.177c-.107.181-.213.362-.32.528-.206.317-.438.61-.76.861a7.127 7.127 0 0 0 2.657-.12c.559-.139.843-.569.993-1.06a3.121 3.121 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.591 1.927-5.566 4.66-7.302 6.792-.442.543-.796 1.243-1.042 1.826a11.507 11.507 0 0 0-.276.721l.575.575zm-4.973 3.04l.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043l.002.001h-.002z"/>
                            </svg></a> </div>
                </td>
            </tr>
            <tr>
                <td > {{$menuItem->itemIng}}  </td>
                <td >

                    <div class="delete" > <a class="deleteItembtn" data-item="menu" data-itid="{{$menuItem->id}}" id="deleteMenuItem{{$menuItem->id}}" > <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg></a> </div>
                </td>
            </tr>
        </table>
    </div>



    <div class="container-fluid edit_menu_form" id="ponuka-menuEditFormID{{$menuItem->id}}">
        <form method="post" action="http://localhost/Vaii_sem_laravel/public/menu_items/add">
            @method('patch')
            <table>
                <tr>
                    <td>
                        <label for="editItem_name{{$menuItem->id}}" > Názov položky </label>
                        <textarea  class="form-control edit_menu_item" name="editItem_name" id="editItem_name{{$menuItem->id}}"  cols="2" rows="1"  > {{$menuItem->itemName}} </textarea>
                    </td>
                    <td >
                        <label for="editItem_price{{$menuItem->id}}" > Cena v € </label>
                        <textarea  name="editItem_price" id="editItem_price{{$menuItem->id}}" class="form-control edit_menu_item" cols="2" rows="1" >{{$menuItem->itemPrice}} </textarea>
                    </td>
                </tr>
                <tr>
                    <td>

                        <label for="editItem_description{{$menuItem->id}}" > Popis </label>
                        <textarea  name="editItem_description" id="editItem_description{{$menuItem->id}}" class="form-control edit_menu_item" cols="2" rows="1" > {{$menuItem->itemDesc}}   </textarea>
                    </td>
                    <td> <div class="submit">
                            <a type="submit" class="saveEditItem" data-itid="{{$menuItem->id}}" id="saveEditMenuItem{{$menuItem->id}}" ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="editItem_ingredients{{$menuItem->id}}" > Zloženie </label>
                        <textarea  name="editItem_ingredients" id="editItem_ingredients{{$menuItem->id}}" class="form-control edit_menu_item" cols="2" rows="1" > {{$menuItem->itemIng}} </textarea>

                    </td>
                    <td>
                        <div class="cancel" >
                            <a class="nosaveEditItem" data-itid="{{$menuItem->id}}" id="nosaveEditMenuItem{{$menuItem->id}}"> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>












    @endforeach

@endsection
