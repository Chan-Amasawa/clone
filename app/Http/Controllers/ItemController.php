<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(){
        return view('inventory.create');
    }

    public function index(){
        // $items = new Item();
        // $all = $items->all();
        // return $all;

        return view("inventory.index",[
            "items" => Item::all()
        ]);
    }

    public function store(Request $request){


        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;

        $item->save();

        // $item = Item::create([
        //     "name" => $request->name,
        //     "price" => $request->price,
        //     "stock" => $request->stock
        //  ]);

        // $item = Item::create($request->all());


        // dd($request->all());

        // $item = Item::insert([
        //     "name" => $request->name,
        //     "price" => $request->price,
        //     "stock" => $request->stock
        //  ]);

        // return $item;

        return redirect()->route("item.index");
    }
}
