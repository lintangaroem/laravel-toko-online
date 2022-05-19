<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksiModel extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;
    public $fillable = [
        'tgl_transaksi','grandtotal'
    ];
}
