<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $items = Item::where("id", ">", 50)->where("price",">",700)->get();
        // $items = Item::where("price",">",900)
        // ->orWhere("stock","<",10)
        // ->get();
        // $items = Item::whereIn("id",[10,15,17,27])->get();
        // $items = Item::whereBetween("price",[700,900]);

        // $items = DB::table("items")->where("id",">",5)->dump();

        // $items = Item::when(false,function($query){
        //     $query->where("id",5);
        // })->get();

        // $items = Item::
        // // ->orderBy("id","desc")
        // latest("id")
        // ->get();

        // $items = Item::where("id",">",100)->first();
        // $items = Item::find(10);
        // $items = Item::paginate(7);


        // return $items;
        // dd($items);

        // return collect($items->first())->values()->all();

        // dd($items->filter(fn($item)=> $item->price > 900 ));

        // $newItems = $items->map(function($item){
        //     $item->price += 50;
        //     $item->stock -=10;
        //     return $item;
        // });

        // dd($newItems);



        $items = Item::when(request()->has("keyword"),function($query){
            $keyword = request()->keyword;
            $query->where("name","like","%".$keyword."%");
            $query->orWhere("price","like","%".$keyword."%");
            $query->orWhere("stock","like","%".$keyword."%");
        })->paginate(7)->withQueryString();

        return view("inventory.index", compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {

        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;

        $item->save();
        return redirect()->route("item.index")->with("status", "New Item Created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('inventory.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('inventory.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->update();

        return redirect()->route("item.index")->with("status", "Item Update successful");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->back()->with("status", "Item Deleted");
    }
}
