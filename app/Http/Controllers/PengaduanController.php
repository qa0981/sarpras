<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pengaduan;
use App\Models\sarpras;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View|Factory
    {
        $show = pengaduan::join('users','users.id','=','pengaduan.iduser')
                ->select('users.name','pengaduan.*')
                ->get();
        $sarpras = sarpras::get();

        $data = [
            'show' => $show,
            'sarpras' => $sarpras,
        ];

        return view('pengaduan.index')->with('list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return redirect()->route('pengaduan.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $get_barang = sarpras::where('id',$request->inpbarang)->first();

    //     $ambilIdUser = Auth::user()->id;
    //     $ambilNamaUser = Auth::user()->name;

    //     $data = new pengaduan;
    //     $data->idbarang = $get_barang->id;
    //     $data->kodebarang = $get_barang->kode;
    //     $data->namabarang = $get_barang->barang;
    //     $data->keterangan = $request->inpketerangan;
    //     $data->iduser = $ambilIdUser;
    //     $data->save();

    //     notify()->success('Pengaduan Berhasil Terkirim!');

    //     return redirect()->back();
    // }

    public function store(Request $request): JsonResponse
    {
        $get_barang = sarpras::where('id',$request->inpbarang)->first();

        // $ambilIdUser = Auth::user()->id;
        // $ambilNamaUser = Auth::user()->name;

        $data = new pengaduan;
        $data->idbarang = $get_barang->id;
        $data->kodebarang = $get_barang->kode;
        $data->namabarang = $get_barang->barang;
        $data->keterangan = $request->inpketerangan;
        // $data->iduser = $ambilIdUser;
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Pengaduan berhasil dikirim.',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        return redirect()->route('pengaduan.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        return redirect()->route('pengaduan.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @@return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        return redirect()->route('pengaduan.index');
    }
}
