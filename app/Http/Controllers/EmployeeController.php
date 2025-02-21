<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;


class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Employee::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Employee::paginate(5);
        }

        $data = Employee::paginate(5);
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
}
