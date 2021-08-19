<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Patroli;
use App\Models\Rfid;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatroliController extends Controller
{

    public function mulaiPatroli(Request $request)
    {
        $user_id = User::where('uuid',$request->uuid)->pluck('id')[0];
        $check_patroli = Patroli::where('users_id', $user_id)->where('end',null)->first();

        if ($check_patroli == null) {
            Patroli::insert([
                'users_id' => $user_id,
                'date' => Carbon::today()->format('Y-m-d'),
                'start' => Carbon::now()->format('H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            return response()->json([
                'success' => true
            ]);
        } else{
            return response()->json([
                'success' => false
            ]);
        }
    }
}
