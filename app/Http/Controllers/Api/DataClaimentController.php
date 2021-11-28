<?php

namespace App\Http\Controllers\Api;
//models
use App\Http\Models\DataClaiment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//package tambahan

class DataClaimentController extends Controller
{
    protected $SuccessStatus = 200;
    protected $ErrorStatus = 400;

    public function index(Request $request)
    {
        // dd($request);
        $dataClaiment = DataClaiment::where('id_user', $request->id_user)->get();
        // dd($dataClaiment);
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $dataClaiment,
        ];
        return response()->json($response); 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $dataClaiment = new DataClaiment;
        $dataClaiment->nama_lengkap = $request->nama_lengkap;
        $dataClaiment->alamat = $request->alamat;
        $dataClaiment->no_tlp = $request->no_tlp;
        $dataClaiment->id_user = $request->id_user;
        $dataClaiment->status_sppa = 0;
        $dataClaiment->save();
        
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $dataClaiment,
        ];

        return response()->json($response, $response['code']); 
    }

    public function sudah_sppa(Request $request){
        $dataClaiment = DataClaiment::rightJoin('data_sppa','data_claiment.id','data_sppa.id_data_klaiment')->where('data_claiment.id_user', $request->id_user)->first();
        
        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $dataClaiment,
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

    public function update(Request $request)
    {
        $dataClaiment = DataClaiment::findOrFail($request->id_dataClaiment);
        $dataClaiment->nama_lengkap = $request->nama_lengkap;
        $dataClaiment->alamat = $request->alamat;
        $dataClaiment->no_tlp = $request->no_tlp;
        $dataClaiment->save();

        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $dataClaiment,
        ]; 
        return response()->json($response, $response['code']); 
        // dd($dataClaiment);
    }

    public function destroy(Request $request)
    {
        // dd($request->id_data_claiment);
        $dataClaiment = DataClaiment::find($request->id_dataClaiment);
        if($dataClaiment){  
            $dataClaiment->delete();
            $response = [
                'code' => $this->SuccessStatus,
                'message' => 'Success',
                // 'data' => $dataClaiment,
            ]; 
        }else{
            $response = [
                'code' => $this->ErrorStatus,
                'message' => 'Not Found',
                // 'data' => $dataClaiment,
            ]; 
        }
        return response()->json($response, $response['code']); 
        
    }
}
