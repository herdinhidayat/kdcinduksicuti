<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Kegiatan::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Kegiatan::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('datakegiatan', compact('data'));
    }
}
