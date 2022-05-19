<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barangModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use JWTAunth;
use File;

class barangController extends Controller
{
    public function getbarang()
    {
        $barang=barangModel::get();
        return response()->json($barang);
    }
}
