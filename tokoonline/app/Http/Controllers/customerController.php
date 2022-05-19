<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customerModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class customerController extends Controller
{
    public function getCustomer()
    {
        $dt_customer=customerModel::get();
        return response()->json($dt_customer);
    }
    public function createcustomer(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'nama_customer'=>'required',
            'alamat'=>'required',
            'username'=>'required',
            'password'=>'required',

        ]);
        if($validator->fails()){
            return Response()->json($validator->errors()->toJson());
        }
        $save = customerModel::create([
            'nama_customer'    =>$req->get('nama_customer'),
            'alamat'      =>$req->get('alamat'),
            'username'      =>$req->get('username'),
            'password'      =>Hash::Make($req->get('password')),

        ]);
        if($save){
            return Response()->json(['status'=>true, 'message' =>'Sukses Menambah Customer']);
        } else {
            return Response()->json(['status'=>false, 'message' =>'Gagal Menambah Customer']);
        }
    }
    public function getsCustomer()
    {
        $getcustomer=customerModel::join('customer','customer.id','customer.id_customer')
        ->get();
        return Response()->json(['data'=>$getcustomer]);
    }
    public function update(Request $req, $id)
        {
            $validator = Validator::make($req->all(),[
                'nama_customer'=>'required',
                'alamat'=>'required',
                'username'=>'required',
                'password'=>'required',
            ]);
            if($validator->fails()){
                return Response()->json($validator->errors()->toJson());
            }
            $ubah=customerModel::where('id_customer',$id)->update([
                'nama_customer'    =>$req->get('nama_customer'),
                'alamat'      =>$req->get('alamat'),
                'username'      =>$req->get('username'),
                'password'      =>Hash::Make($req->get('password')),
            ]);
            if($ubah){
                return Response()->json(['status'=>true, 'message' =>'Sukses Mengubah Customer']);
            } else {
                return Response()->json(['status'=>false, 'message' =>'Gagal Mengubah Customer']);
            }
        }
        public function getdetail($id)
        {
            $dt=customerModel::where('id_customer',$id)->first();
            return Response()->json($dt);
        }
        public function destroy($id)
        {
            $hapus=customerModel::where('id_customer',$id)->delete();
            if($hapus){
                return Response()->json(['status'=>true, 'message' =>'Sukses Hapus Customer']);
            } else {
                return Response()->json(['status'=>false, 'message' =>'Gagal Hapus Customer']);
            }
        }
    }
