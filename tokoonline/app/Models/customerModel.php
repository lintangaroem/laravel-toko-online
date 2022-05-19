<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerModel extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $primarykey = 'id_customer';
    public $timestamps = false;
    public $fillable = [
        'nama_customer','alamat','username','password'
    ];
}
