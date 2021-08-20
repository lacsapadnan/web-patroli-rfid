<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Patroli;
use App\Models\Rfid;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
