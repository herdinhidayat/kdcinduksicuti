<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use App\Models\Detail;
use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Employee::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Employee::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai()
    {
        $datadetail = Detail::all();
        return view('tambahdata', compact('datadetail'));
    }

    public function insertdata(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:7|max:28',
            'nohp' => 'required|min:11|max:12',
        ]);

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
        if (session('halaman_url')) {
            return redirect(Session('halaman_url'))->with('success', 'Data Induksi Di Update');;
        }


        return redirect()->route('pegawai')->with('success', 'Data Induksi Di Update');
    }

    public function delete($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Induksi Di Hapus');
    }


    public function exportpdf()
    {
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datapegawai-pdf');
        return $pdf->download('datainduksikdc.pdf');
    }

    public function exportexcel()
    {
        return Excel::download(new EmployeeExport, 'datainduksikdc.xlsx');
    }

    public function importexcel(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('EmployeeData', $namafile);

        Excel::import(new EmployeeImport, \public_path('/EmployeeData/' . $namafile));
        return \redirect()->back();
    }
}
