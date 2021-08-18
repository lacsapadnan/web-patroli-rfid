<?php

namespace App\Http\Controllers;

use App\Models\Rfid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScanController extends Controller
{
    public function index()
    {
        $nokartu = Rfid::whereDate('created_at', Carbon::today())
                        ->where('uuid', Auth::user()->uuid)
                        ->first();


        return view('pages.karyawan.scan-rfid', compact('nokartu'));
    }
}
