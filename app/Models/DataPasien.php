<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPasien extends Model
{
    protected $table = 'table_data_pasien';
    protected $primaryKey = 'id_pasien';
    protected $fillable = [
        'tanggal',
        'kode_pasien',
        'nama_pasien',
        'alamat_pasien',
        'tanggal_lahir',
        'jenis_kelamin',
        'status',
        'tindakan',
        'obat'
    ];
}
