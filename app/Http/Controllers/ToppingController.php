<?php

namespace App\Http\Controllers;

use App\Models\Topping;
use Illuminate\Http\Request;
use App\Http\Requests\StoreToppingRequest;
use App\Http\Requests\UpdateToppingRequest;

class ToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('toppings.index', [
            'toppings' => Topping::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreToppingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreToppingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function show($size_id)
    {
        return view('toppings.show', [
            'topping' => (new Topping())->findOrFail($size_id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function edit(Topping $topping)
    {
        return view('toppings.edit', [
            'topping' => $topping
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateToppingRequest  $request
     * @param  \App\Models\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topping $topping)
    {
        $validated = $request->validate([
            "name" => "required",
            "price" => "required",
            "is_available" => "required",
        ]);

        $topping->update($validated);

        // set the success message to the session
        session()->flash('success', 'Pizza Topping Updated Successfully');

        return redirect()->route('toppings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topping $topping)
    {
        $topping->delete();

        // set the success message to the session
        session()->flash('success', 'Pizza Topping Deleted Successfully');

        return redirect()->route('toppings.index');
    }
}
