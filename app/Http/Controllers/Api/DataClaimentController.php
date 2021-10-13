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

    public function index()
    {
        $dataClaiment = DataClaiment::all();
        return response()->json($dataClaiment); 
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $dataClaiment = new DataClaiment;
        $dataClaiment->nama_depan = $request->nama_depan;
        $dataClaiment->nama_belakang = $request->nama_belakang;
        $dataClaiment->alamat = $request->alamat;
        $dataClaiment->save();

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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
