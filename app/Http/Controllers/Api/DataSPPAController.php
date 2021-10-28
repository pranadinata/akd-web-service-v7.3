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

        // dd($request->foto_ktp_peserta);
        if($request->foto_ktp_peserta){
            $file_foto = $request->foto_ktp_peserta;
            $name_foto_ktp_peserta = $file_foto->getClientOriginalName();
            $extension_foto_ktp_peserta = $file_foto->extension();
            $imageName_foto_ktp_peserta = uniqid().'_foto_ktp_'.$request->peserta.'.'.$extension_foto_ktp_peserta;
            //upload file foto ktp
            $file_foto->move(public_path(). '/uploads/foto_ktp_sppa/', $imageName_foto_ktp_peserta);
        }else{
            $imageName_foto_ktp_peserta = null;
        }
        

        if($request->foto_tanda_tangan){
            $file_foto_tanda_tangan = $request->foto_tanda_tangan;
            $name_foto_tanda_tangan = $file_foto_tanda_tangan->getClientOriginalName();
            $extension_foto_tanda_tangan = $file_foto_tanda_tangan->extension();
            $imageName_foto_tanda_tangan = uniqid().'_foto_tanda_tangan_'.$request->nama_lengkap.'.'.$extension_foto_tanda_tangan;
            //upload file foto tanda
            $file_foto_tanda_tangan->move(public_path(). '/uploads/foto_tanda_tangan/', $imageName_foto_tanda_tangan);
        }else {
            $imageName_foto_tanda_tangan = null;
        }
        
        $dataSppa = new DataSPPA;
        $dataSppa->nama_lengkap = $request->nama_lengkap;
        $dataSppa->alamat = $request->alamat;
        $dataSppa->peserta = $request->peserta_1;
        $dataSppa->peserta_2 = $request->peserta_2;
        $dataSppa->imageName_foto_ktp_peserta = $imageName_foto_ktp_peserta;
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
