<?php

namespace App\Http\Controllers\Api;
//models
use App\Http\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//package tambahan
use Illuminate\Support\Facades\Hash;

class DataUserController extends Controller
{
    protected $SuccessStatus = 200;
    public function index()
    {
        $user = User::all();
        return response()->json($user); 
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->nama_depan = $request->nama_depan;
        $user->nama_belakang = $request->nama_belakang;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $user,
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
