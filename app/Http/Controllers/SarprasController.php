<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sarpras;

class SarprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = sarpras::get();
        return view('sarpras.index')->with('list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sarpras.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new sarpras;
        $data->kode = $request->inpkode;
        $data->barang = $request->inpbarang;
        $data->lokasi = $request->inplokasi;
        $data->save();

        session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('sarpras.index');
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
        $data = sarpras::find($id);

        return view('sarpras.edit', [
            'sarpras' => $data,
        ]);
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
        $data = sarpras::find($id);
        $data->kode = $request->inpkode;
        $data->barang = $request->inpbarang;
        $data->lokasi = $request->inplokasi;
        $data->save();

        return redirect()->route('sarpras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = sarpras::find($id);

        $data->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('sarpras.index');
    }
}
