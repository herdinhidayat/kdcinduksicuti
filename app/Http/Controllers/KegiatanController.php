<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Penyelenggara;
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

    public function tambahkegiatan()
    {
        $datapenyelenggara = Penyelenggara::all();
        return view('tambahdata', compact('datapenyelenggara'));
    }

    public function insertdata(Request $request)
    {
        // $validated = $request->validate([
        //     // 'namapelatihan' => 'required|min:7|max:28',
        //     // 'nohp' => 'required|min:11|max:12',
        // ]);

        $data = Kegiatan::create($request->all());
        if ($request->hasFile('fotodokumen')) {
            $request->file('fotodokumen')->move('fotodokumen/', $request->file('fotodokumen')->getClientOriginalName());
            $data->fotodokumen = $request->file('fotodokumen')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('kegiatan')->with('success', 'Data Induksi Di Tambahkan');
    }

    public function tampilkandata($id)
    {
        $data = Kegiatan::find($id);
        //     // dd($data);



        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Kegiatan::find($id);
        $data->update($request->all());
        if (session('halaman_url')) {
            return redirect(Session('halaman_url'))->with('success', 'Data Induksi Di Update');;
        }


        return redirect()->route('kegiatan')->with('success', 'Data Induksi Di Update');
    }

    public function delete($id)
    {
        $data = Kegiatan::find($id);
        $data->delete();
        return redirect()->route('kegiatan')->with('success', 'Data Induksi Di Hapus');
    }
}
