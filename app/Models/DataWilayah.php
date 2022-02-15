<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWilayah extends Model
{
    protected $table = 'table_data_wilayah';
    protected $primaryKey = 'id_wilayah';
    protected $fillable = [
        'nama_provinsi',
        'nama_kabupatenkota',
        'nama_kecamatan',
        'nama_kelurahan',
        'kode_pos'
    ];
}
