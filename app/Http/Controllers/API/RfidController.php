<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Patroli;
use App\Models\Rfid;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RfidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rfid = Rfid::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List data RFID',
            'data' => $rfid
        ], 200);
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
        $validator = Validator::make($request->all(),[
            'uuid' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $rfid = Rfid::create([
            'uuid' => $request->uuid
        ]);

        if ($rfid) {
            return response()->json([
                'success' => true,
                'message' => 'Rfid added',
                'data' => $rfid
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Rfid failled to added'
        ], 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mulaiPatroli(Request $request)
    {
        $user_id = User::where('uuid',$request->uuid)->pluck('id')[0];
        $check_patroli = Patroli::where('user_id', $user_id)->first();

        if ($check_patroli == null) {
            Patroli::insert([
                'users_id' => $request->user_id,
                'date' => Carbon::today()->format('Y-m-d'),
                'start' => Carbon::now()->format('H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            return response()->json([
                'success' => true
            ]);
        }
    }
}
