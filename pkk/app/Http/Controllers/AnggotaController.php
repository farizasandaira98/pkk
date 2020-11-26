<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Anggota;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
         'nama_anggota' => 'required',
         'jenis_kelamin' => 'required',
         'alamat' => 'required'
     ]);
        Anggota::create($request->all());
        
        return redirect('anggota')->with('msg','Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('anggota.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::where('id_anggota', $id)->first(); 
        return view('anggota.edit', ['anggota' => $anggota]);
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
       $this->validate($request,[
         'nama_anggota' => 'required',
         'jenis_kelamin' => 'required',
         'alamat' => 'required'
     ]);

       $anggota = Anggota::where('id_anggota', $id)->first(); 
       $anggota->nama_anggota = $request->nama_anggota;
       $anggota->alamat = $request->alamat;
       $anggota->jenis_kelamin = $request->jenis_kelamin;
       $anggota->email = $request->email;
       $anggota->no_telp = $request->no_telp;
       $anggota->save();
       return redirect('anggota')->with('msg','Data Berhasil di Edit');;
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
