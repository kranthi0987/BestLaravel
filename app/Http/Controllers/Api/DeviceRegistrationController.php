<?php
/**
 * Copyright (c) 2019.
 * sanjay kranthi  kranthi0987@gmail.com
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeviceModel;
use Illuminate\Http\Request;

class DeviceRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $devices = DeviceModel::all();
        return response()->json($devices);

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'device_model' => 'required|string',
            'device_resolution' => 'required|string',
            'device_id' => 'required|string',
            'registered' => 'required|string'
        ]);
        $device = new DeviceModel([
            'device_model' => $request->device_model,
            'device_resolution' => $request->device_resolution,
            'device_id' => $request->device_id,
            'registered' => $request->registered,

        ]);
        $device->save();
        return response()->json([
            'message' => 'Successfully Registered  device!',
            'stats' => 'true',
            'registered' => $device->registered
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
