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

    public function index(Request $request)
    {
        // dd($request->id_user);
        $dataSPPA = DataSPPA::join('data_claiment','data_claiment.id','=','data_sppa.id_data_klaiment')->where('data_claiment.id_user', $request->id_user)->get();
        
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $dataSPPA,
        ];
        // dd($response);
        return response()->json($response, $response['code']); 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if($request->foto_ktp_peserta){
            $file_foto = $request->foto_ktp_peserta;
            $extension_foto_ktp_peserta = explode(".", $file_foto);
            $imageName_foto_ktp_peserta = $extension_foto_ktp_peserta[0].'_foto_ktp_'.'peserta'.'.'.$extension_foto_ktp_peserta[1];
            //upload file foto ktp
            // $file_foto->move(public_path(). '/uploads/foto_ktp_sppa/', $imageName_foto_ktp_peserta);
        }else{
            $imageName_foto_ktp_peserta = null;
        }

        if($request->foto_tanda_tangan){
            $file_foto_tanda_tangan = $request->foto_tanda_tangan;
            $extension_foto_tanda_tangan = explode(".", $file_foto_tanda_tangan);
            $imageName_foto_tanda_tangan = $extension_foto_tanda_tangan[0].'_foto_tanda_tangan.'.$extension_foto_tanda_tangan[1];
            //upload file foto tanda
            // $file_foto_tanda_tangan->move(public_path(). '/uploads/foto_tanda_tangan/', $imageName_foto_tanda_tangan);
        }else {
            $imageName_foto_tanda_tangan = null;
        }
        
        
        if($request->peserta_1 != 'Tidak Ada'){
            $peserta_no_1 = $request->peserta_1;
        }else{
            $peserta_no_1 = "";
        }

        if($request->peserta_2 != 'Tidak Ada'){
            $peserta_no_2 = $request->peserta_2;
        }else{
            $peserta_no_2 = "";
        }
        
        if($peserta_no_1 != '' && $peserta_no_2 != ''){
            $jumlah_premi = 250000;
        }else{
            if($peserta_no_1 != '' || $peserta_no_2 != ''){
                $jumlah_premi = 125000;
            }else{
                $jumlah_premi = 0;
            }
        }

        $dataSppa = new DataSPPA;
        $dataSppa->id_data_klaiment = $request->id_data_klaiment;
        $dataSppa->peserta_1 = $peserta_no_1;
        $dataSppa->peserta_2 = $peserta_no_2;
        $dataSppa->foto_ktp_peserta = $imageName_foto_ktp_peserta;
        $dataSppa->foto_tanda_tangan = $imageName_foto_tanda_tangan;
        $dataSppa->jumlah_premi = $jumlah_premi;
        $dataSppa->save();
        
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
        ];
        
        return response()->json($response, $response['code']); 
    }

    public function storeFile(Request $request){
        // dd($request);
        if($request->foto_ktp_peserta){
            $file_foto = $request->foto_ktp_peserta;
            $name_foto_ktp_peserta = $file_foto->getClientOriginalName();
            $extension_foto_ktp_peserta = $file_foto->extension();
            $split = explode(".", $name_foto_ktp_peserta);
            $imageName_foto_ktp_peserta = $split[0].'_foto_ktp_'.'peserta'.'.'.$extension_foto_ktp_peserta;
            //upload file foto ktp
            $file_foto->move(public_path(). '/uploads/foto_ktp_sppa/', $imageName_foto_ktp_peserta);
        }else{
            $imageName_foto_ktp_peserta = null;
        }
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $imageName_foto_ktp_peserta,
        ];
        
        return response()->json($response, $response['code']); 
    }
    public function storeFileTandaTangan(Request $request){
        // dd($request);
        if($request->foto_tanda_tangan){
            $file_foto_tanda_tangan = $request->foto_tanda_tangan;
            $name_foto_tanda_tangan = $file_foto_tanda_tangan->getClientOriginalName();
            $split = explode(".", $name_foto_tanda_tangan);
            $extension_foto_tanda_tangan = $file_foto_tanda_tangan->extension();
            $imageName_foto_tanda_tangan = $split[0].'_foto_tanda_tangan.'.$extension_foto_tanda_tangan;
            //upload file foto tanda
            $file_foto_tanda_tangan->move(public_path(). '/uploads/foto_tanda_tangan/', $imageName_foto_tanda_tangan);
        }else {
            $imageName_foto_tanda_tangan = null;
        }
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $imageName_foto_tanda_tangan,
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
