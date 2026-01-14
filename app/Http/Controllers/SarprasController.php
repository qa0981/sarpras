<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sarpras;

class SarprasController extends Controller
{
    // GET /api/sarpras
    public function index()
    {
        $data = sarpras::all();
        return response()->json($data);
    }

    // POST /api/sarpras
    public function store(Request $request)
    {
        $request->validate([
            'kode'   => 'required',
            'barang' => 'required',
            'lokasi' => 'required',
        ]);

        $data = sarpras::create([
            'kode'   => $request->kode,
            'barang' => $request->barang,
            'lokasi' => $request->lokasi,
        ]);

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    // GET /api/sarpras/{id}
    public function show($id)
    {
        $data = sarpras::findOrFail($id);
        return response()->json($data);
    }

    // PUT /api/sarpras/{id}
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode'   => 'required',
            'barang' => 'required',
            'lokasi' => 'required',
        ]);

        $data = sarpras::findOrFail($id);
        $data->update($request->all());

        return response()->json([
            'message' => 'Data berhasil diperbarui',
            'data' => $data
        ]);
    }

    // DELETE /api/sarpras/{id}
    public function destroy($id)
    {
        sarpras::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
