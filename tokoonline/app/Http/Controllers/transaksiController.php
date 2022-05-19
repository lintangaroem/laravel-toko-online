<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksiModel;
use App\Models\detailModel;


class transaksiController extends Controller
{
    public function store(Request $req)
    {
        $data = array (
            'tgl_transaksi'=>date('Y-m-d'),
            'grandtotal'=>0
        );
        $proses=transaksiModel::create($data);

        if($proses){
            $id_transaksi=$proses->id_transaksi;
            $grandtotal=0;
            foreach ($req->get('datapost') as $gdata){
                $insert_detail = detailModel::create([
                    'id_transaksi'=>$id_transaksi,
                    'id_barang'=>$gdata['id_barang'],
                    'qty'=>$gdata['quantity'],
                ]);
                $grandtotal+=$gdata['harga']*$gdata['quantity'];
            }
            $updatetransaksi=transaksiModel::where('id_transaksi',$id_transaksi)->update([
                'grandtotal'=>$grandtotal
            ]);
            return response()->json(['status'=>true, 'message'=>'Sukses menyimpan ke dalam database']);
        } else {
            return response()->json(['status'=>false, 'message'=>'Gagal menyimpan ke dalam database']);
        }
    }
}