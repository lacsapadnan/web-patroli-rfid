<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dataKaryawan()
    {
        $karyawan = User::with('id', '!=', auth()->id())->get();
        // dd($karyawan);
        return view('pages.admin.data_karyawan', compact('karyawan'));
    }

    public function tambahKaryawan(Request $request)
    {
        User::create($request->all());
        return redirect()->back();
    }
}
