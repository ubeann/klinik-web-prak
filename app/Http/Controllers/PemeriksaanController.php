<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename1 = 'pemeriksaan';
        $this->tablename2 = 'dokter';
        $this->tablename3 = 'pasien';
    }

    public function index()
    {
        $pemeriksaan = $this->database->getReference($this->tablename1)->getValue();
        $dokter = $this->database->getReference($this->tablename2)->getValue();
        $pasien = $this->database->getReference($this->tablename3)->getValue();
        return view('admin.pemeriksaan.pemeriksaan', compact('pemeriksaan')/*  ,[
            "title" => "Dokter"
        ] */);
    }

    public function create()
    {
        return view('admin.pemeriksaan.addPemeriksaan', [
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

        $postData = [
            'name' => $request->name,
            'birth' => $request->birth,
            'no_SIP' => $request->SIP,
            'sps' => $request->spesialisasi,
            'alamat' => $request->alamat,
            'phone' => $request->phone,
            'image' => $request->image
        ];

        $postRef = $this->database->getReference($this->tablename)->push($postData);

        if($postRef){
            return redirect('/admin/pasien')->with('status','Dokter Added');
        }
        else{
            return redirect('/admin/pasien')->with('status','Dokter Not Added');
        }

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
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    /**
     * Remove the specified resource from storage.
     * 
     */
    public function delete($dokter)
    {
    }
}
