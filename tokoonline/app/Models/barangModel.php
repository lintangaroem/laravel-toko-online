<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangModel extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primarykey = 'id_barang';
    public $timestamps = false;
    public $fillable = [
        'nama_barang','stok','harga','deskripsi','foto'
    ];
}
