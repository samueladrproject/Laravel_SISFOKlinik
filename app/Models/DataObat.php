<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataObat extends Model
{
    protected $table = 'table_data_obat';
    protected $primaryKey = 'id_obat';
    protected $fillable = ['kode_obat', 'nama_obat', 'harga_obat', 'stok', 'satuan'];
}
