<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import Food model
use App\Food;

class FoodController extends Controller
{
    // Get data
    public function index($id = null)
    {
        if (!$id) {
            // get all
            return Food::get();
        }
        else {
            // get specific ID
            return $this->show($id);
        }
    }

    // get data from specific ID
    public function show($id)
    {
        return Food::find($id);
    }

    // create a new record
    public function store(Request $request)
    {
        $food = new Food();

        $food->name = $request->input('name');
        $food->origin = $request->input('origin');
        $food->servings = $request->input('servings');

        if ($food->save()) {
            return response()->json([
                'content' => 'Created succesfully'
            ], 200);
        }
    }

    // update record
    public function update(Request $request, $id)
    {
        $food = Food::find($id);

        if ($food) {
            $food->name = $request->input('name');
            $food->origin = $request->input('origin');
            $food->servings = $request->input('servings');

            if ($food->save()) {
                return response()->json([
                    'content' => 'Updated succesfully'
                ], 200);
            }
        }
    }

    // delete specific record
    public function destroy($id)
    {
        $food = Food::find($id);

        if ($food->delete()) {
            return response()->json([
                'content' => 'Deleted succesfully'
            ], 200);
        }
    }
}
