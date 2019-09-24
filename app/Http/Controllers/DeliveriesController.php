<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DeliveriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Delivery::all(),200);
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
            'car_id'    =>  'required|numeric',
            'guest_id'  =>  'required|numeric',
            'greeter_id'    =>  'required|numeric',
            'start_time'    =>  'required',
            'back_time' =>  'required'
        ]);
        if ($res->fails()){
            return response()->json(['error' => 'Bad parameter'], 400);
        }
        $delivery = Delivery::create([
            'car_id'    =>  $request['car_id'],
            'guest_id'  =>  $request['guest_id'],
            'greeter_id'    =>  $request['greeter_id'],
            'start_time'    =>  $request['start_time'],
            'back_time' =>  $request['back_time']
        ]);
        return response()->json($delivery, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        $res = Validator::make($request->all(), [
            'car_id'    =>  'required|numeric',
            'guest_id'  =>  'required|numeric',
            'greeter_id'    =>  'required|numeric',
            'start_time'    =>  'required',
            'back_time' =>  'required'
        ]);
        if ($res->fails()){
            return response()->json(['error' => 'Bad parameter'], 400);
        }
        Delivery::updateOrCreate(
            ['id'   =>  $delivery->id],
            [
            'car_id'    =>  $request['car_id'],
            'guest_id'  =>  $request['guest_id'],
            'greeter_id'    =>  $request['greeter_id'],
            'start_time'    =>  $request['start_time'],
            'back_time' =>  $request['back_time']
            ]
        );
        return response()->json($delivery, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return response()->json($delivery, 200);
    }
}
