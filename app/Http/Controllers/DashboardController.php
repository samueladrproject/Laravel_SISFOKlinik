<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use App\Models\DataPasien;
use App\Models\DataPegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = [
            'titlePage' => 'Dashboard',
            'totalPegawai' => DataPegawai::count(),
            'totalPasien' => DataPasien::count(),
            'stokObat' => DataObat::select(DB::raw('SUM(stok) as stokObat'))->get()->toArray()[0]['stokObat'],
        ];

        return view('pages.dashboard', $datas);
    }
}
