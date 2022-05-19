<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailModel extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    protected $primarykey = 'id_detail';
    public $timestamps = false;
    public $fillable = [
        'id_transaksi','id_barang','qty'
    ];
}
