<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use App\Models\DataTindakan;
use Illuminate\Http\Request;

class DataTindakanPasienController extends Controller
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
        return view('pages.datatransaksi.datatindakanpasien.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($data_tindakan_pasien)
    {
        $datas = [
            'titlePage' => 'Data Tindakan Pasien',
            'idData' => $data_tindakan_pasien,
            'dataTindakan' => DataTindakan::all()
        ];
        return view('pages.datatransaksi.datatindakanpasien.create', $datas);
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
            'tindakan' => 'required'
        ]);

        // Read Last Data

        $dataTindakanPasien = DataPasien::find($idPasien)->toArray()['tindakan'];
        $convertJsonObj = json_decode($dataTindakanPasien);

        if ($convertJsonObj == null) {
            $convertJsonObj = [];
        }

        // Search Data Tindakan

        $kodetindakan = DataTindakan::where('kode_tindakan', $validateReq['tindakan'])->get()->toArray()[0]['kode_tindakan'];
        $namatindakan = DataTindakan::where('kode_tindakan', $validateReq['tindakan'])->get()->toArray()[0]['nama_tindakan'];
        $hargalayanan = DataTindakan::where('kode_tindakan', $validateReq['tindakan'])->get()->toArray()[0]['harga_layanan'];

        array_push($convertJsonObj, array('Kode_Tindakan' => $kodetindakan, 'Nama_Tindakan' => $namatindakan, 'Harga' => $hargalayanan));

        $updateTindakanPasien = DataPasien::find($idPasien)->update(['tindakan' => json_encode($convertJsonObj)]);

        if ($updateTindakanPasien) {
            //redirect dengan pesan sukses
            return redirect()->route('data-tindakan-pasien.show', $idPasien)->with(['success' => 'Data Berhasil Ditambahkan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-tindakan-pasien.show', $idPasien)->with(['error' => 'Data Gagal Ditambahkan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPasien  $dataPasien
     * @return \Illuminate\Http\Response
     */
    public function show($data_tindakan_pasien)
    {
        $dataTindakanPasien = DataPasien::find($data_tindakan_pasien)->toArray();

        $datas = [
            'titlePage' => 'Data Pasien',
            'dataTindakanPasien' => $dataTindakanPasien
        ];
        return view('pages.datatransaksi.datatindakanpasien.show', $datas);
    }

    public function destroy($idPasien, $idxarray)
    {
        $dataTindakanPasien = DataPasien::find($idPasien)->toArray()['tindakan'];
        $dataConvertJsonObj = json_decode($dataTindakanPasien);

        unset($dataConvertJsonObj[$idxarray]);

        $updateTindakanPasien = DataPasien::find($idPasien)->update(['tindakan' => json_encode($dataConvertJsonObj)]);

        if ($updateTindakanPasien) {
            //redirect dengan pesan sukses
            return redirect()->route('data-tindakan-pasien.show', $idPasien)->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-tindakan-pasien.show', $idPasien)->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
