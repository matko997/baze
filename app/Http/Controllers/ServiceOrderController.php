<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarPart;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceOrders = ServiceOrder::with('cars', 'carParts')->paginate(10);
        return view('serviceorders.index')->with(['serviceOrders' => $serviceOrders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carParts = CarPart::all();
        $cars = Car::all();
        return view('serviceOrders.create')->with(['carParts' => $carParts, 'cars' => $cars]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carId = $request->input('carId');
        $carParts = $request->input('carParts');
        $startDate = $request->input('startDate');
        $finishDate = $request->input('finishDate');
        $comment = $request->input('comment');

        $totalPrice = 0;

        foreach ($carParts as $carPart) {
            $carPartObj = CarPart::find($carPart);
            $totalPrice += $carPartObj->sellingPrice;
        }

        $serviceOrder = new ServiceOrder();
        $serviceOrder->carId = $carId;
        $serviceOrder->startDate = $startDate;
        $serviceOrder->finishDate = $finishDate;
        $serviceOrder->comment = $comment;
        $serviceOrder->totalPrice = $totalPrice;
        $serviceOrder->save();
        $serviceOrder->carParts()->sync($carParts);
        return redirect(route('serviceOrders.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceOrder $serviceOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceOrder $serviceOrder)
    {
        $serviceOrder = ServiceOrder::find($serviceOrder->id);
        $carParts = CarPart::all();
        $cars = Car::all();
        return view('serviceOrders.edit')->with(['serviceOrder' => $serviceOrder, 'carParts' => $carParts, 'cars' => $cars]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceOrder $serviceOrder)
    {
        $serviceOrder = ServiceOrder::findOrFail($serviceOrder->id);

        $validatedData = $request->validate([
            'startDate' => 'required|date',
            'finishDate' => 'required|date',
            'carParts' => 'required|array',
            'comment' => 'nullable|string',
        ]);

        $carParts = $validatedData['carParts'];
        $totalPrice = 0;

        foreach ($carParts as $carPart) {
            $carPartObj = CarPart::find($carPart);
            if ($carPartObj) {
                $totalPrice += $carPartObj->sellingPrice;
            }
        }
        $serviceOrder->startDate = $validatedData['startDate'];
        $serviceOrder->finishDate = $validatedData['finishDate'];
        $serviceOrder->comment = $validatedData['comment'];
        $serviceOrder->totalPrice = $totalPrice;
        $serviceOrder->save();

        $serviceOrder->carParts()->sync($carParts);

        return redirect()->route('serviceOrders.index')->with('success', 'Service Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceOrder $serviceOrder)
    {
        ServiceOrder::destroy($serviceOrder->id);
        return redirect(route('serviceOrders.index'));
    }
}
