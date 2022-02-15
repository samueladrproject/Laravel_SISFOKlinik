<?php

namespace App\Http\Controllers;

use App\Models\DataWilayah;
use Illuminate\Http\Request;

class DataWilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetchDataWilayah = DataWilayah::all();
        $datas = [
            'titlePage' => 'Data Wilayah',
            'fetchDataWilayah' => $fetchDataWilayah,
        ];
        return view('pages.datamaster.datawilayah.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Wilayah',
        ];

        return view('pages.datamaster.datawilayah.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateReq = $request->validate([
            'namaprovinsi' => 'required',
            'namakabupatenkota' => 'required',
            'namakecamatan' => 'required',
            'namakelurahan' => 'required',
            'kodepos' => 'required'
        ]);

        $dataWilayah = DataWilayah::create([
            'nama_provinsi' => strtoupper($validateReq['namaprovinsi']),
            'nama_kabupatenkota' => strtoupper($validateReq['namakabupatenkota']),
            'nama_kecamatan' => strtoupper($validateReq['namakecamatan']),
            'nama_kelurahan' => strtoupper($validateReq['namakelurahan']),
            'kode_pos' => $validateReq['kodepos'],
        ]);

        if ($dataWilayah) {
            //redirect dengan pesan sukses
            return redirect()->route('data-wilayah.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-wilayah.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataWilayah  $dataWilayah
     * @return \Illuminate\Http\Response
     */
    public function edit(DataWilayah $dataWilayah)
    {
        $datas = [
            'titlePage' => 'Data Wilayah',
            'specifiedData' => $dataWilayah,
        ];
        return view('pages.datamaster.datawilayah.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataWilayah  $dataWilayah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataWilayah $dataWilayah)
    {
        $id = $dataWilayah->toArray()['id_wilayah'];

        $validateReq = $request->validate([
            'namaprovinsi' => 'required',
            'namakabupatenkota' => 'required',
            'namakecamatan' => 'required',
            'namakelurahan' => 'required',
            'kodepos' => 'required'
        ]);

        $updateDataWilayah = DataWilayah::find($id)->update([
            'nama_provinsi' => strtoupper($validateReq['namaprovinsi']),
            'nama_kabupatenkota' => strtoupper($validateReq['namakabupatenkota']),
            'nama_kecamatan' => strtoupper($validateReq['namakecamatan']),
            'nama_kelurahan' => strtoupper($validateReq['namakelurahan']),
            'kode_pos' => $validateReq['kodepos'],
        ]);

        if ($updateDataWilayah) {
            //redirect dengan pesan sukses
            return redirect()->route('data-wilayah.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-wilayah.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataWilayah  $dataWilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataWilayah $dataWilayah)
    {
        $deleteDataObat = DataWilayah::where('id_wilayah', $dataWilayah->toArray()['id_wilayah'])->delete();

        if ($deleteDataObat) {
            //redirect dengan pesan sukses
            return redirect()->route('data-wilayah.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-wilayah.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
