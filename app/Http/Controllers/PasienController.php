<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::all();
        /* $dokter = $this->database->getReference($this->tablename)->getValue(); */
        return view('admin.pasien')
            ->with('pasien', $pasien);
    }

    public function create()
    {
        return view('admin.addPasien', [
            "title" => "Dokter"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pasien = new Pasien;
        $pasien->nama_pasien = $request->input('name');
        $pasien->tgl_lahir = $request->input('birth');
        $pasien->alamat = $request->input('alamat');
        $pasien->no_telp = $request->input('phone');
        
        $pasien->save();

        return redirect('/admin/pasien')->with('status','Pasien Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $pasien = Pasien::find($id);
        return view('admin.editPasien')
            ->with('pasien', $pasien);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);
        $pasien->nama_pasien = $request->input('name');
        $pasien->tgl_lahir = $request->input('birth');
        $pasien->alamat = $request->input('alamat');
        $pasien->no_telp = $request->input('phone');
        
        $pasien->update();

        return redirect('/admin/pasien')->with('status','Pasien Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();
        return redirect('/admin/pasien')->with('status','Pasien Deleted');
    }
}
 