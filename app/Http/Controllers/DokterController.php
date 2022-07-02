<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/* use Kreait\Firebase\Contract\Database; */
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Models\Dokter;

class DokterController extends Controller
{
    /* public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'dokter';
    } */

    public function index()
    {
        $dokters = Dokter::all();
        /* $dokter = $this->database->getReference($this->tablename)->getValue(); */
        return view('admin.dokter')
            ->with('dokters', $dokters);
    }

    public function create()
    {
        return view('admin.addDokter', [
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

        $dokters = new Dokter;
        $dokters->dokter_name = $request->input('name');
        $dokters->tgl_lahir = $request->input('birth');
        $dokters->no_SIP = $request->input('SIP');
        $dokters->sps= $request->input('sps');
        $dokters->alamat = $request->input('alamat');
        $dokters->no_telp = $request->input('phone');
        
        $dokters->save();

        return redirect('/admin/dokter')->with('status','Dokter Added');
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
        $dokters = Dokter::find($id);
        return view('admin.editDokter')
            ->with('dokters', $dokters);
        
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
        $dokters = Dokter::find($id);

        $dokters->dokter_name = $request->input('name');
        $dokters->tgl_lahir = $request->input('birth');
        $dokters->no_SIP = $request->input('SIP');
        $dokters->sps= $request->input('sps');
        $dokters->alamat = $request->input('alamat');
        $dokters->no_telp = $request->input('phone');

        $dokters->update();

        return redirect('/admin/dokter')->with('status','Dokter Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokters = Dokter::find($id);
        $dokters->delete();
        return redirect('/admin/dokter')->with('status','Dokter Deleted');
    }

    /**
     * Remove the specified resource from storage.
     * 
     */
    public function delete($dokter)
    {
        if($dokter->image){
            Storage::delete($dokter->oldImage);
        }
        return redirect('/admin/dokter')->with('status','Dokter Deleted Successfully');
    }
}
