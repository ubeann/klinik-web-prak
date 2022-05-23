<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class PasienController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'pasien';
    }

    public function index()
    {
        $pasien = $this->database->getReference($this->tablename)->getValue();
        return view('admin.pasien', compact('pasien')/*  ,[
            "title" => "Dokter"
        ] */);
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
        $postData = [
            'name' => $request->name,
            'birth' => $request->birth,
            'alamat' => $request->alamat,
            'phone' => $request->phone,
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
        $key = $id;
        $editDokter = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editDokter){
            return view('admin.editDokter', compact('editDokter','key'));
        }
        else{
            return redirect('/admin/dokter')->with('status','Dokter Not Added');
        }
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
        $key = $id;
        $updateData = [
            'name' => $request->name,
            'birth' => $request->birth,
            'alamat' => $request->alamat,
            'phone' => $request->phone,
        ];

        $res_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($res_updated){
            return redirect('/admin/pasien')->with('status','Dokter Updated Successfully');
        }
        else{
            return redirect('/admin/pasien')->with('status','Dokter Not Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data){
            return redirect('/admin/dokter')->with('status','Dokter Deleted Successfully');
        }
        else{
            return redirect('/admin/dokter')->with('status','Dokter Not Deleted');
        }
    }
}
 