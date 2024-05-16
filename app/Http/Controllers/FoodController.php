<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use Inertia\Inertia;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia::render('Food/Index', [
            'foodpassprops' => Food::all()->map(function($food){
                return [
                    'foodid'=> $food->id,
                    'foodname' => $food->foodname,
                    'foodprice' => $food->foodprice,
                    'fooddetails' => $food->fooddetails,
                ];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia::render('Food/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFoodRequest $request)
    {
        $validated=$request->validate([
            'foodname' => 'required|max:200',
            'foodprice' => 'required|max:200',
            'fooddetails' => 'required',
        ]);
        Food::create($validated);
        return redirect('/food')->with('message','customer Add sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        return inertia::render('Food/Edit',[
            'foodpassfromedit'=>$food
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $validated=$request->validate([
            'foodname' => 'required|max:200',
            'foodprice' => 'required|max:200',
            'fooddetails' => 'required',
        ]);

        $food->update($validated);

        return redirect('/food')->with('message','customer update sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        // $food= Food::findOrFail($foodid); food id eka web eke route eke pass  karanawa
        $food->delete();
        return redirect('/food')->with('message','customer delete sucessfully');
    }
}
