<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Guest::all(),200);
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
            'company' => 'required|string',
            'level' => 'required|string',
            'retinues'  => 'required|numeric',
            'arrive_datetime'   => 'required',
            'leave_datetime'    => 'required',
            'arrive_flight' => 'required|string',
            'leave_flight'  => 'required|string',
            'hotel' => 'required|string',
            'greeter_number'    => 'required|numeric',
            'greeter_name'  =>  'required|string',
            'greeter_sex'   =>  'required|numeric|between:0,1',
            'greeter_company'   => 'required|string',
            'greeter_tel'   =>  'required|numeric'
        ]);
        if ($res->fails()){
            return response()->json(['error' => 'Bad parameter'], 400);
        }
        $guest = Guest::create([
            'company' => $request['company'],
            'level' => $request['level'],
            'retinues'  => $request['retinues'],
            'arrive_datetime'   => $request['arrive_datetime'],
            'leave_datetime'    => $request['leave_datetime'],
            'arrive_flight' => $request['arrive_flight'],
            'leave_flight'  => $request['leave_flight'],
            'hotel' => $request['hotel'],
            'greeter_number'    =>  $request['greeter_number'],
            'greeter_name'  =>  $request['greeter_name'],
            'greeter_sex'   =>  $request['greeter_sex'],
            'greeter_company'   =>  $request['greeter_company'],
            'greeter_tel'   =>  $request['greeter_tel']
        ]);
        return response()->json($guest, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        $res = Validator::make($request->all(), [
            'company' => 'required|string',
            'level' => 'required|string',
            'retinues'  => 'required|numeric',
            'arrive_datetime'   => 'required',
            'leave_datetime'    => 'required',
            'arrive_flight' => 'required|string',
            'leave_flight'  => 'required|string',
            'hotel' => 'required|string',
            'greeter_number'    => 'required|numeric',
            'greeter_name'  =>  'required|string',
            'greeter_sex'   =>  'required|numeric|between:0,1',
            'greeter_company'   => 'required|string',
            'greeter_tel'   =>  'required|numeric'
        ]);
        if ($res->fails()){
            return response()->json(['error' => 'Bad parameter'], 400);
        }
        $guest = Guest::updateOrCreate(
            [
                'id'    =>  $guest->id,
            ],
            [
                'company' => $request['company'],
                'level' => $request['level'],
                'retinues'  => $request['retinues'],
                'arrive_datetime'   => $request['arrive_datetime'],
                'leave_datetime'    => $request['leave_datetime'],
                'arrive_flight' => $request['arrive_flight'],
                'leave_flight'  => $request['leave_flight'],
                'hotel' => $request['hotel'],
                'greeter_number'    =>  $request['greeter_number'],
                'greeter_name'  =>  $request['greeter_name'],
                'greeter_sex'   =>  $request['greeter_sex'],
                'greeter_company'   =>  $request['greeter_company'],
                'greeter_tel'   =>  $request['greeter_tel']
            ]
        );
        return response()->json($guest, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        DB::table('deliveries')->where('guest_id',$guest->id)->delete();
        $guest->delete();
        return response()->json($guest, 200);
    }
}
