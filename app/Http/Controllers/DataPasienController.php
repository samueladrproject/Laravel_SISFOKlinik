<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = [
            'titlePage' => 'Data Pasien',
            'dataPasien' => DataPasien::all()
        ];
        return view('pages.datatransaksi.datapasien.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newData = "P00001";
        $lastRecord = DataPasien::orderBy('kode_pasien', 'DESC')->first();

        if (isset($lastRecord)) {
            $newData = DataPasien::orderBy('kode_pasien', 'DESC')->first()->toArray()['kode_pasien'];

            // Membuat Kode Obat Baru
            $newDataInt = (int)explode('P', $newData)[1] + 1;
            $arrSplitterNewData = array_reverse(str_split($newDataInt));
            $strSplit = str_split($newData);
            $arrayreversed = array_reverse($strSplit);
            for ($i = 0; $i < count($arrayreversed); $i++) {
                if (isset($arrSplitterNewData[$i])) {
                    $arrayreversed[$i] = $arrSplitterNewData[$i];
                }
            }

            $newData = join(array_reverse($arrayreversed));
        }

        $datas = [
            'titlePage' => 'Data Pasien',
            'newkodepasien' => $newData
        ];
        return view('pages.datatransaksi.datapasien.create', $datas);
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
            'kodepasien' => 'required',
            'namapasien' => 'required',
            'alamatpasien' => 'required',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required',
            'status' => 'required'
        ]);

        $dataPasien = DataPasien::create([
            'tanggal' => Carbon::now(),
            'kode_pasien' => $validateReq['kodepasien'],
            'nama_pasien' => $validateReq['namapasien'],
            'alamat_pasien' => $validateReq['alamatpasien'],
            'tanggal_lahir' => $validateReq['tanggallahir'],
            'jenis_kelamin' => $validateReq['jeniskelamin'],
            'status' => $validateReq['status']
        ]);

        if ($dataPasien) {
            //redirect dengan pesan sukses
            return redirect()->route('data-pasien.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-pasien.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPasien  $dataPasien
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPasien $dataPasien)
    {
        $datas = [
            'titlePage' => 'Data Pasien',
            'dataPasien' => $dataPasien
        ];
        return view('pages.datatransaksi.datapasien.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPasien  $dataPasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPasien $dataPasien)
    {
        $id = $dataPasien->toArray()['id_pasien'];

        $validateReq = $request->validate([
            'kodepasien' => 'required',
            'namapasien' => 'required',
            'alamatpasien' => 'required',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required',
            'status' => 'required'
        ]);

        $updateDataPasien = DataPasien::find($id)->update([
            'tanggal' => $dataPasien->toArray()['tanggal'],
            'kode_pasien' => $validateReq['kodepasien'],
            'nama_pasien' => $validateReq['namapasien'],
            'alamat_pasien' => $validateReq['alamatpasien'],
            'tanggal_lahir' => $validateReq['tanggallahir'],
            'jenis_kelamin' => $validateReq['jeniskelamin'],
            'status' => $validateReq['status']
        ]);

        if ($updateDataPasien) {
            //redirect dengan pesan sukses
            return redirect()->route('data-pasien.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-pasien.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPasien  $dataPasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPasien $dataPasien)
    {
        $deleteDataPasien = DataPasien::where('id_pasien', $dataPasien->toArray()['id_pasien'])->delete();

        if ($deleteDataPasien) {
            //redirect dengan pesan sukses
            return redirect()->route('data-pasien.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-pasien.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
