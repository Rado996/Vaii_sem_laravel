<?php

namespace App\Http\Controllers;

use App\Models\menuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        return view('menu_items.index');
    }


    public function add()
    {
        return view('menu_items.add');
    }

    public function edit()
    {
        return view('menu_items.edit');
    }

    public function add_item(Request $request)
    {
        menuItem::create($request->all());
        return redirect()->back()->with('message','Položka pridaná');
    }

}
