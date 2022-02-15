<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPegawai extends Model
{
    protected $table = 'table_data_pegawai';
    protected $primaryKey = 'id_data_pegawai';
    protected $fillable = [
        'nomor_ID',
        'nama_pegawai',
        'alamat_pegawai',
        'nohp_pegawai',
        'jabatan_pegawai'
    ];
}
