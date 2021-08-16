<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $karyawan = User::where('role', 'karyawan')->count();
        $admin = User::where('role', 'admin')->count();
        return view('new_dashboard', [
            'karyawan' => $karyawan,
            'admin' => $admin,
        ]);
    }
}
