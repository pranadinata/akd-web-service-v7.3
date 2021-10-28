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
