<?php

namespace App\Http\Controllers;

use App\Models\DataTindakan;
use Illuminate\Http\Request;

class DataTindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetchDataTindakan = DataTindakan::all();
        $datas = [
            'titlePage' => 'Data Tindakan',
            'fetchDataTindakan' => $fetchDataTindakan,
        ];
        return view('pages.datamaster.datatindakan.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newData = "T00001";
        $lastRecord = DataTindakan::orderBy('kode_tindakan', 'DESC')->first();

        if (isset($lastRecord)) {
            $newData = DataTindakan::orderBy('kode_tindakan', 'DESC')->first()->toArray()['kode_tindakan'];

            // Membuat Kode Obat Baru
            $newDataInt = (int)explode('T', $newData)[1] + 1;
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
            'titlePage' => 'Data Tindakan',
            'newkodetindakan' => $newData,
        ];

        return view('pages.datamaster.datatindakan.create', $datas);
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
            'namatindakan' => 'required',
            'hargalayanan' => 'required',
        ]);

        $dataTindakan = DataTindakan::create([
            'kode_tindakan' => $request->get('kodetindakan'),
            'nama_tindakan' => $validateReq['namatindakan'],
            'harga_layanan' => $validateReq['hargalayanan'],
        ]);

        if ($dataTindakan) {
            //redirect dengan pesan sukses
            return redirect()->route('data-tindakan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-tindakan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataTindakan  $dataTindakan
     * @return \Illuminate\Http\Response
     */
    public function edit(DataTindakan $dataTindakan)
    {
        $datas = [
            'titlePage' => 'Data Tindakan',
            'specifiedData' => $dataTindakan,
        ];
        return view('pages.datamaster.datatindakan.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataTindakan  $dataTindakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataTindakan $dataTindakan)
    {
        $id = $dataTindakan->toArray()['id_tindakan'];

        $validateReq = $request->validate([
            'namatindakan' => 'required',
            'hargalayanan' => 'required',
        ]);

        $updateDataTindakan = DataTindakan::find($id)->update([
            'kode_tindakan' => $request->get('kodetindakan'),
            'nama_tindakan' => $validateReq['namatindakan'],
            'harga_layanan' => $validateReq['hargalayanan'],
        ]);

        if ($updateDataTindakan) {
            //redirect dengan pesan sukses
            return redirect()->route('data-tindakan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-tindakan.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataTindakan  $dataTindakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataTindakan $dataTindakan)
    {
        $deleteDataTindakan = DataTindakan::where('id_tindakan', $dataTindakan->toArray()['id_tindakan'])->delete();

        if ($deleteDataTindakan) {
            //redirect dengan pesan sukses
            return redirect()->route('data-tindakan.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-tindakan.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
