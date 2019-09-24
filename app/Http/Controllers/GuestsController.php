<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
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
        return Guest::all();
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
            'hotel' => 'required|string'
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
            'hotel' => $request['hotel']
        ]);
        return response()->json(['success' => $guest], 200);
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
            'hotel' => 'required|string'
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
            'hotel' => $request['hotel']
            ]
        );
        return response()->json(['success' => $guest], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();
        return response()->json(['success' => $guest], 200);
    }
}
