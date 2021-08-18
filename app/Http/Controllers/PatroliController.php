<?php

namespace App\Http\Controllers;

use App\Models\Patroli;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Storage;

class PatroliController extends Controller
{
    public $path_image;

    function __construct()
    {
        $this->path_image = storage_path('app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'image');
    }

    public function index()
    {
        $users = User::with('patroli')->get();
        $laporan = Patroli::get();
        // dd($users);
        return view('pages.admin.report', [
            'laporan' =>$laporan,
            'users' => $users
        ]);
    }

    public function patroli()
    {
        $patroli = Patroli::where('users_id', Auth::user()->id)
                            ->whereDate('date', Carbon::today())
                            ->first();
        return view('pages.karyawan.patroli', compact('patroli'));
    }

    public function mulaiPatroli()
    {
        Patroli::insert([
            'users_id' => Auth::user()->id,
            'date' => Carbon::today()->format('Y-m-d'),
            'start' => Carbon::now()->format('H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        return redirect('/patroli');
    }

    public function selesaiPatroli(Request $request)
    {
        $this->validate($request,
        [
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'report' => 'required'
        ],[
            'required' => ':attribute tidak boleh kosong !'
        ]);

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');

            $extension = $file->extension();

            $new_filename = Carbon::now()->timestamp .'.'.$extension;

            if (!File::isDirectory($this->path_image)) {
                File::makeDirectory($this->path_image);
            }

            $p = Storage::putFileAs(
                'public/image', $file, $new_filename
            );


            $patroli = Patroli::whereDate('date', Carbon::today()->format('Y-m-d'))
                                ->where('users_id', Auth::user()->id)
                                ->update([
                                    'end' => Carbon::now()->format('H:i:s'),
                                    'report' => $request->report,
                                    'photo' => $new_filename
                                ]);

            return redirect('/patroli');
        } else {
            return redirect()->back()->withErrors('Silakan Lampirkan Foto');
        }
    }
}
