<?php

namespace App\Http\Controllers;

use App\Models\Greeter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GreetersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Greeter::all();
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
            'number'    => 'required|numeric',
            'name'  =>  'required|string',
            'sex'   =>  'required|numeric|between:0,1',
            'company'   => 'required|string',
            'tel'   =>  'required|numeric'
        ]);
        if ($res->fails()){
            return response()->json(['error' => 'Bad parameter'], 400);
        }
        $greeter = Greeter::create([
            'number'    =>  $request['number'],
            'name'  =>  $request['name'],
            'sex'   =>  $request['sex'],
            'company'   =>  $request['company'],
            'tel'   =>  $request['tel']
        ]);
        return response()->json(['success' => $greeter], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Greeter  $greeter
     * @return \Illuminate\Http\Response
     */
    public function show(Greeter $greeter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Greeter  $greeter
     * @return \Illuminate\Http\Response
     */
    public function edit(Greeter $greeter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Greeter  $greeter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Greeter $greeter)
    {
        $res = Validator::make($request->all(), [
            'number'    => 'required|numeric',
            'name'  =>  'required|string',
            'sex'   =>  'required|numeric|between:0,1',
            'company'   => 'required|string',
            'tel'   =>  'required|numeric'
        ]);
        if ($res->fails()){
            return response()->json(['error' => 'Bad parameter'], 400);
        }
        $greeter = Greeter::updateOrCreate(
            ['id'   =>  $greeter->id],
            [
            'number'    =>  $request['number'],
            'name'  =>  $request['name'],
            'sex'   =>  $request['sex'],
            'company'   =>  $request['company'],
            'tel'   =>  $request['tel']
            ]
        );
        return response()->json(['success' => $greeter], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Greeter  $greeter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Greeter $greeter)
    {
        $greeter->delete();
        return response()->json(['success' => $greeter], 200);
    }
}
