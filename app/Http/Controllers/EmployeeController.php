<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::all();
        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        $data = Employee::create($request->all());
        if ($request->hasFile('fotodokumen')) {
            $request->file('fotodokumen')->move('fotoinduksi/', $request->file('fotodokumen')->getClientOriginalName());
            $data->fotodokumen = $request->file('fotodokumen')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('pegawai')->with('success', 'Data Induksi Di Tambahkan');
    }

    public function tampilkandata($id)
    {
        $data = Employee::find($id);
        // dd($data);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Data Induksi Di Update');
    }

    public function delete($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Induksi Di Hapus');
    }
}
