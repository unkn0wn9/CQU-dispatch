<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Car::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = Validator::make($request->all(), [
            'brand' =>  'required|string',
            'license'   =>  'required|string',
            'color' =>  'required|string',
            'driver_name'   =>  'required|string',
            'driver_sex'    =>  'required|numeric|between:0,1',
            'driver_tel'    =>  'required|numeric',
        ]);
        if ($res->fails()){
            return response()->json(['error' => 'Bad parameter'], 400);
        }
        $car = Car::create([
            'brand' =>  $request['brand'],
            'license'   =>  $request['license'],
            'color'   =>  $request['color'],
            'driver_name'   =>  $request['driver_name'],
            'driver_sex'   =>  $request['driver_sex'],
            'driver_tel'   =>  $request['driver_tel'],
        ]);
        return response()->json(['success' => $car], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $res = Validator::make($request->all(), [
            'brand' =>  'required|string',
            'license'   =>  'required|string|unique:cars,license',
            'color' =>  'required|string',
            'driver_name'   =>  'required|string',
            'driver_sex'    =>  'required|numeric|between:0,1',
            'driver_tel'    =>  'required|numeric',
        ]);
        if ($res->fails()){
            return response()->json(['error' => 'Bad parameter'], 400);
        }
        Car::updateOrCreate(
            [
                'id' => $car->id,
            ],
            [
                'brand' =>  $request['brand'],
                'license'   =>  $request['license'],
                'color'   =>  $request['color'],
                'driver_name'   =>  $request['driver_name'],
                'driver_sex'   =>  $request['driver_sex'],
                'driver_tel'   =>  $request['driver_tel'],
            ]
        );
        return response()->json(['success' => $car], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(['success' => $car], 200);
    }
}
