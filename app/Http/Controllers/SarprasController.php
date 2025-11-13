<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sarpras;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class SarprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory
    {
        $data = sarpras::get();
        return view('sarpras.index')->with('list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory
    {
        return view('sarpras.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     // $data = new sarpras;
    //     // $data->kode = $request->inpkode;
    //     // $data->barang = $request->inpbarang;
    //     // $data->lokasi = $request->inplokasi;
    //     // $data->save();

    //     // session()->flash('success', 'Data Berhasil Ditambahkan.');

    //     // return redirect()->route('sarpras.index');
        
    // }

    public function store(Request $request)
    {
        $data = new sarpras;
        $data->kode = $request->inpkode;
        $data->barang = $request->inpbarang;
        $data->lokasi = $request->inplokasi;
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): RedirectResponse
    {
        return redirect()->route('sarpras.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View|Factory
    {
        $data = sarpras::find($id);

        return view('sarpras.edit', [
            'sarpras' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
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
     */
    public function destroy($id): RedirectResponse
    {
        $data = sarpras::find($id);
        $data->delete();

        session()->flash('danger', 'Data Berhasil Dihapus.');

        return redirect()->route('sarpras.index');
    }
}