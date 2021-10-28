<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;


class LoginController extends Controller
{
    protected $SuccessStatus = 200;
    protected $ErrorStatus = 401;
    
    public function login(Request $request){
        $user = User::where('username', '=', $request->username)->where('password',$request->password)->firstOrFail();
        
        if($user){
            $response = [
                'code' => $this->SuccessStatus,
                'message' => 'Success',
                'data' => $user,
            ];
        }else{
            $response = [
                'code' => $this->SuccessStatus,
                'message' => 'User Not Found',
                'data' => $user,
            ];
        }
        
        return response()->json($response);

    }

    public function create(Request $request){
        
    }
    
    public function update(Request $request){
        
    }
}
