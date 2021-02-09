<?php

namespace App\Http\Controllers;

use App\Http\Requests\menuItemAddRequest;
use App\Models\menuItem;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = menuItem::all();
        return view('menu_items.index', compact('menuItems'));
    }


    public function add()
    {
        return view('menu_items.add');
    }

    public function edit()
    {
        return view('menu_items.edit');
    }

    public function edit_item(menuItemAddRequest $request)
    {


    }

    public function add_item(menuItemAddRequest $request)
    {
//        $request->validate([
//            'itemName' => 'required|max:30',
//            'itemDesc' => 'required|max:100',
//            'itemIng' => 'required|max:200',
//            'itemPrice' => 'required',
//        ]);

//        $rules = [
//            'itemName' => 'required|max:30',
//            'itemDesc' => 'required|max:100',
//            'itemIng' => 'required|max:200',
//            'itemPrice' => 'required',
//        ];
//
//        $messages = [
//            'itemName.required' => 'Pole názov musí byť vyplnené.',
//            'itemDesc.required' => 'Pole popis musí byť vyplnené.',
//            'itemIng.required' => 'Pole ingrediencie musí byť vyplnené.',
//            'itemPrice.required' => 'Pole cena musí byť vyplnené.',
//            'itemName.max' => 'Názov nesmie byť dlhší ako 30 znakov.',
//            'itemDesc.max' => 'Popis nesmie byť dlhší ako 100 znakov.',
//            'itemIng.max' => 'Zloženie nesmie byť dlhšie ako 200 znakov.',
//            'itemPrice' => 'Cena musí byť vyplnená',
//        ];
//
//        $validator = Validator::make($request->all(), $rules, $messages);
//        if($validator -> fails()){
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
//        make($request->all(), $rules, $messages);

        menuItem::create($request->all());
        return redirect()->back()->with('message' , 'Položka pridaná');
    }

}
