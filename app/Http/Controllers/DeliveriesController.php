<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Guest;
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
        $deliveries = Delivery::all();
        foreach ($deliveries as $delivery){
            $delivery->car_info = DB::table('cars')->where('id', $delivery->car_id)->first();
            $delivery->guest_info = DB::table('guests')->where('id', $delivery->guest_id)->first();
            unset($delivery->car_id);
            unset($delivery->guest_id);
        }
        return response()->json($deliveries,200);
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
            'start_time'    =>  'required',
            'back_time' =>  'required'
        ]);
        if ($res->fails()){
            return response()->json(['error' => 'Bad parameter'], 400);
        }

        //修改宾客派车
        DB::table('guests')->where('id', $request['guest_id'])->update(['isDelivered'   =>  1]);

        $delivery = Delivery::create([
            'car_id'    =>  $request['car_id'],
            'guest_id'  =>  $request['guest_id'],
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
        DB::table('guests')->where('id', $delivery->guest_id)->update(['isDelivered'   =>  0]);
        $delivery->delete();
        return response()->json($delivery, 200);
    }
}
