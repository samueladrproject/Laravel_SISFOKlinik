<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use Illuminate\Http\Request;

class InfoTagihanController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Info Tagihan Pasien',
            'dataPasien' => DataPasien::all()
        ];

        return view('pages.payment', $datas);
    }
}
