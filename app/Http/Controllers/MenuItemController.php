<?php

namespace App\Http\Controllers;

use App\Http\Requests\menuItemAddRequest;
use App\Models\menuItem;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class MenuItemController extends Controller
{


    /**
     * MenuItemController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $menuItems = menuItem::all();
        return view('menu_items.index', compact('menuItems'));
    }


    public function add()
    {
        return view('menu_items.add');
    }

    public function edit(MenuItem $menuItem)
    {
        return view('menu_items.edit', compact('menuItem'));
    }

    public function delete(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->back()->with('message' , 'Položka Vymazaná');
    }

    public function edit_item(menuItemAddRequest $request, MenuItem $menuItem)
    {
        //ak je pouzivatel admin

//        $menuItemID = $request->get('itemID');
//        $menuItemName = $request->get('itemName');
//        $menuItemDesc = $request->get('itemDesc');
//        $menuItemIng = $request->get('itemIng');
//        $menuItemPrice = $request->get('itemPrice');
//        DB::update(
//            'update menu_items set itemName, itemDesc, itemIng, itemPrice = ?,?,?,? > where id = ?',[
//            $menuItemName, $menuItemDesc, $menuItemIng, $menuItemPrice, $menuItemID]
//        );
        $menuItem->update(['itemName' => $request->itemName,
            'itemDesc' => $request->itemDesc,
        'itemIng' => $request->itemIng,
        'itemPrice' => $request->itemPrice]);

        return redirect()->back()->with('message' , 'Položka upravená');
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

        MenuItem::create($request->all());
        return redirect()->back()->with('message' , 'Položka pridaná');
    }

}
