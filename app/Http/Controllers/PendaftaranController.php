<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function index()
    {
        $daftar = Pendaftaran::all();
        /* $dokter = $this->database->getReference($this->tablename)->getValue(); */
        return view('admin.pendaftaran')
            ->with('pendaftaran', $daftar);
    }

    public function create()
    {
        return view('layout.appointment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $daftar = new Pendaftaran;
        $daftar->nama_pasien = $request->input('fullname');
        $daftar->tgl_kedatangan = $request->input('tgl_book');
        $daftar->nama_dokter = $request->input('nama_dokter');
        $daftar->no_pasien= $request->input('no_pasien');
        
        $daftar->save();

        return redirect('/#appointment')->with('status','Dokter Added');
    }
}
