<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use App\Models\DataPasien;
use Illuminate\Http\Request;

class DataObatPasienController extends Controller
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
        return view('pages.datatransaksi.dataobatpasien.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($data_obat_pasien)
    {
        $datas = [
            'titlePage' => 'Data Obat Pasien',
            'idData' => $data_obat_pasien,
            'dataObat' => DataObat::all()
        ];
        return view('pages.datatransaksi.dataobatpasien.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idPasien = $request->get('idPasien');

        $validateReq = $request->validate([
            'obat' => 'required',
            'jumlahobat' => 'required'
        ]);

        // Read Last Data

        $dataObatPasien = DataPasien::find($idPasien)->toArray()['obat'];
        $convertJsonObj = json_decode($dataObatPasien);

        if ($convertJsonObj == null) {
            $convertJsonObj = [];
        }

        // Search Data Tindakan

        $kodeobat = DataObat::where('kode_obat', $validateReq['obat'])->get()->toArray()[0]['kode_obat'];
        $namaobat = DataObat::where('kode_obat', $validateReq['obat'])->get()->toArray()[0]['nama_obat'];
        $harga = DataObat::where('kode_obat', $validateReq['obat'])->get()->toArray()[0]['harga_obat'];

        array_push($convertJsonObj, array('Kode_Obat' => $kodeobat, 'Nama_Obat' => $namaobat, 'Harga' => $harga, 'Jumlah_Obat' => $validateReq['jumlahobat']));

        $updateObatPasien = DataPasien::find($idPasien)->update(['obat' => json_encode($convertJsonObj)]);

        if ($updateObatPasien) {
            //redirect dengan pesan sukses
            return redirect()->route('data-obat-pasien.show', $idPasien)->with(['success' => 'Data Berhasil Ditambahkan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-obat-pasien.show', $idPasien)->with(['error' => 'Data Gagal Ditambahkan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPasien  $dataPasien
     * @return \Illuminate\Http\Response
     */
    public function show($data_obat_pasien)
    {
        $dataObatPasien = DataPasien::find($data_obat_pasien)->toArray();

        $datas = [
            'titlePage' => 'Data Pasien',
            'dataObatPasien' => $dataObatPasien
        ];
        return view('pages.datatransaksi.dataobatpasien.show', $datas);
    }

    public function destroy($idPasien, $idxarray)
    {
        $dataObatPasien = DataPasien::find($idPasien)->toArray()['obat'];
        $dataConvertJsonObj = json_decode($dataObatPasien);

        unset($dataConvertJsonObj[$idxarray]);

        $updateObatPasien = DataPasien::find($idPasien)->update(['obat' => json_encode($dataConvertJsonObj)]);

        if ($updateObatPasien) {
            //redirect dengan pesan sukses
            return redirect()->route('data-obat-pasien.show', $idPasien)->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-obat-pasien.show', $idPasien)->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
