<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(){
        $foods = Food::all();

        return response()->json($foods,200);
    }

    public function store(StoreRequest $request){
        $foodData = new Food($request->all());
        $foodData->save();

        return response()->json($foodData,201);
    }

    public function show(int $id){
        $food = Food::find($id);

        return response()->json($food,200);
    }

    public function update(int $id, Request $request){
        $food = Food::find($id);
        $food->fill($request->all());
        $food->save();

        return response()->json($food);
    }

    public function destroy(int $id){
        Food::find($id)->delete();

        return response()->noContent();
    }
}
