<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarPart;
use Illuminate\Http\Request;

class CarPartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carParts = CarPart::paginate(10);
        return view('carparts.index')->with(['carParts' => $carParts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carparts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CarPart::create($request->except('_token'));
        return redirect(route('carParts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CarPart $carPart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarPart $carPart)
    {
        return view('carParts.edit')->with(['carPart'=>CarPart::find($carPart->id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarPart $carPart)
    {
        $carPart=CarPart::find($carPart->id);

        $carPart->update($request->except('_token'));

        return redirect(route('carParts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarPart $carPart)
    {
        CarPart::destroy($carPart->id);
        return redirect(route('carParts.index'));
    }
}
