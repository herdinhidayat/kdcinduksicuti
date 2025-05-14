<?php

namespace App\Http\Controllers;

use App\Models\Penyelenggara;
use Illuminate\Http\Request;

class PenyelenggaraController extends Controller
{
    public function index()
    {
        $data = Penyelenggara::paginate('5');
        return view('datapenyelenggara', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function create()
    {
        return view('tambahpenyelenggara');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Penyelenggara::create($request->all());
        return redirect()->route('datapenyelenggara');
    }
}
