<?php

namespace App\Http\Controllers\Api;
//models
use App\Http\Models\User;
use App\Http\Models\DataSPPA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//package tambahan
use App\Http\Controllers\Api\File;

class DataSPPAController extends Controller
{
    protected $SuccessStatus = 200;

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        // dd($request->foto_ktp_peserta_1);
        if($request->foto_ktp_peserta_1){
            $file_foto_1 = $request->foto_ktp_peserta_1;
            $name_foto_ktp_peserta_1 = $file_foto_1->getClientOriginalName();
            $extension_foto_ktp_peserta_1 = $file_foto_1->extension();
            $imageName_foto_ktp_peserta_1 = uniqid().'_foto_ktp_'.$request->peserta_1.'.'.$extension_foto_ktp_peserta_1;
            //upload file foto ktp
            $file_foto_1->move(public_path(). '/uploads/foto_ktp_sppa/', $imageName_foto_ktp_peserta_1);
        }else{
            $imageName_foto_ktp_peserta_1 = null;
        }
        
        if($request->foto_ktp_peserta_2){
            $file_foto_2 = $request->foto_ktp_peserta_2;
            $name_foto_ktp_peserta_2 = $file_foto_2->getClientOriginalName();
            $extension_foto_ktp_peserta_2 = $file_foto_2->extension();
            $imageName_foto_ktp_peserta_2 = uniqid().'_foto_ktp_'.$request->peserta_2.'.'.$extension_foto_ktp_peserta_2;
            //upload file foto ktp
            $file_foto_2->move(public_path(). '/uploads/foto_ktp_sppa/', $imageName_foto_ktp_peserta_2);
        }else {
            $imageName_foto_ktp_peserta_2 = null;
        }

        if($request->foto_tanda_tangan){
            $file_foto_tanda_tangan = $request->foto_tanda_tangan;
            $name_foto_tanda_tangan = $file_foto_tanda_tangan->getClientOriginalName();
            $extension_foto_tanda_tangan = $file_foto_tanda_tangan->extension();
            $imageName_foto_tanda_tangan = uniqid().'_foto_ktp_'.$request->nama_lengkap.'.'.$extension_foto_tanda_tangan;
            //upload file foto ktp
            $file_foto_tanda_tangan->move(public_path(). '/uploads/foto_ktp_sppa/', $imageName_foto_tanda_tangan);
        }else {
            $imageName_foto_tanda_tangan = null;
        }
        
        $dataSppa = new DataSPPA;
        $dataSppa->nama_lengkap = $request->nama_lengkap;
        $dataSppa->alamat = $request->alamat;
        $dataSppa->peserta_1 = $request->peserta_1;
        $dataSppa->foto_ktp_peserta_1 = $imageName_foto_ktp_peserta_1;
        $dataSppa->peserta_2 = $request->peserta_2;
        $dataSppa->foto_ktp_peserta_2 = $imageName_foto_ktp_peserta_2;
        $dataSppa->foto_tanda_tangan = $imageName_foto_tanda_tangan;
        $dataSppa->save();
        
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
        ];
          
        return response()->json($response, $response['code']); 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
