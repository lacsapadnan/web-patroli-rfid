<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Rfid;

class UUIDController extends Controller
{
    public function getUUID()
    {
        $rfid = Rfid::first();

        return response()->json([
            'success' => true,
            'uuid' => $rfid['uuid']
        ]);
    }
}
