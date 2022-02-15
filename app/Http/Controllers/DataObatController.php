<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use Illuminate\Http\Request;

class DataObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetchDataObat = DataObat::all();
        $datas = [
            'titlePage' => 'Data Obat',
            'fetchDataObat' => $fetchDataObat,
        ];
        return view('pages.datamaster.dataobat.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newData = "B00001";
        $lastRecord = DataObat::orderBy('kode_obat', 'DESC')->first();

        if (isset($lastRecord)) {
            $newData = DataObat::orderBy('kode_obat', 'DESC')->first()->toArray()['kode_obat'];

            // Membuat Kode Obat Baru
            $newDataInt = (int)explode('B', $newData)[1] + 1;
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
            'titlePage' => 'Data Obat',
            'newkodeobat' => $newData,
        ];

        return view('pages.datamaster.dataobat.create', $datas);
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
            'namaobat' => 'required|unique:table_data_obat,nama_obat',
            'hargaobat' => 'required',
            'stokobat' => 'required',
            'selectsatuan' => 'required'
        ]);

        $dataObat = DataObat::create([
            'kode_obat' => $request->get('kodeobat'),
            'nama_obat' => $validateReq['namaobat'],
            'harga_obat' => $validateReq['hargaobat'],
            'stok' => $validateReq['stokobat'],
            'satuan' => $validateReq['selectsatuan'],
        ]);

        if ($dataObat) {
            //redirect dengan pesan sukses
            return redirect()->route('data-obat.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-obat.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataObat  $dataObat
     * @return \Illuminate\Http\Response
     */
    public function edit(DataObat $dataObat)
    {
        $datas = [
            'titlePage' => 'Data Obat',
            'specifiedData' => $dataObat,
        ];
        return view('pages.datamaster.dataobat.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataObat  $dataObat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataObat $dataObat)
    {
        $id = $dataObat->toArray()['id_obat'];

        $rulesValidate = [
            'namaobat' => 'required|unique:table_data_obat,nama_obat',
            'hargaobat' => 'required',
            'stokobat' => 'required',
            'selectsatuan' => 'required'
        ];

        if ($request->get('namaobat') == $dataObat->toArray()['nama_obat']) {
            $rulesValidate['namaobat'] = 'required';
        }

        $validateReq = $request->validate($rulesValidate);

        $updateDataObat = DataObat::find($id)->update([
            'kode_obat' => $request->get('kodeobat'),
            'nama_obat' => $validateReq['namaobat'],
            'harga_obat' => $validateReq['hargaobat'],
            'stok' => $validateReq['stokobat'],
            'satuan' => $validateReq['selectsatuan'],
        ]);

        if ($updateDataObat) {
            //redirect dengan pesan sukses
            return redirect()->route('data-obat.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-obat.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataObat  $dataObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataObat $dataObat)
    {
        $deleteDataObat = DataObat::where('id_obat', $dataObat->toArray()['id_obat'])->delete();

        if ($deleteDataObat) {
            //redirect dengan pesan sukses
            return redirect()->route('data-obat.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-obat.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
