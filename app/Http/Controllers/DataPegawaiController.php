<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use App\Models\DataWilayah;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetchDataPegawai = DataPegawai::all();
        $datas = [
            'titlePage' => 'Data Pegawai',
            'fetchDataPegawai' => $fetchDataPegawai,
        ];
        return view('pages.datamaster.datapegawai.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = [
            'titlePage' => 'Data Pegawai',
            'dataWilayah' => DataWilayah::all()->toArray()
        ];

        return view('pages.datamaster.datapegawai.create', $datas);
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
            'nomorid' => 'required',
            'namalengkappegawai' => 'required',
            'alamatpegawai' => 'required',
            'nohppegawai' => 'required',
            'jabatanpegawai' => 'required'
        ]);

        $dataPegawai = DataPegawai::create([
            'nomor_ID' => $validateReq['nomorid'],
            'nama_pegawai' => $validateReq['namalengkappegawai'],
            'alamat_pegawai' => $validateReq['alamatpegawai'],
            'nohp_pegawai' => $validateReq['nohppegawai'],
            'jabatan_pegawai' => strtoupper($validateReq['jabatanpegawai']),
        ]);

        if ($dataPegawai) {
            //redirect dengan pesan sukses
            return redirect()->route('data-pegawai.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-pegawai.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPegawai  $dataPegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPegawai $dataPegawai)
    {
        $datas = [
            'titlePage' => 'Data Pegawai',
            'specifiedData' => $dataPegawai,
        ];
        return view('pages.datamaster.datapegawai.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPegawai  $dataPegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPegawai $dataPegawai)
    {
        $id = $dataPegawai->toArray()['id_data_pegawai'];

        $validateReq = $request->validate([
            'nomorid' => 'required',
            'namalengkappegawai' => 'required',
            'alamatpegawai' => 'required',
            'nohppegawai' => 'required',
            'jabatanpegawai' => 'required'
        ]);

        $updateDataPegawai = DataPegawai::find($id)->update([
            'nomor_ID' => $validateReq['nomorid'],
            'nama_pegawai' => $validateReq['namalengkappegawai'],
            'alamat_pegawai' => $validateReq['alamatpegawai'],
            'nohp_pegawai' => $validateReq['nohppegawai'],
            'jabatan_pegawai' => strtoupper($validateReq['jabatanpegawai']),
        ]);

        if ($updateDataPegawai) {
            //redirect dengan pesan sukses
            return redirect()->route('data-pegawai.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-pegawai.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPegawai  $dataPegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPegawai $dataPegawai)
    {
        $deleteDataPegawai = DataPegawai::where('id_data_pegawai', $dataPegawai->toArray()['id_data_pegawai'])->delete();

        if ($deleteDataPegawai) {
            //redirect dengan pesan sukses
            return redirect()->route('data-pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-pegawai.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
