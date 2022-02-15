<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTindakan extends Model
{
    protected $table = 'table_data_tindakan';
    protected $primaryKey = 'id_tindakan';
    protected $fillable = [
        'kode_tindakan',
        'nama_tindakan',
        'harga_layanan'
    ];
}
