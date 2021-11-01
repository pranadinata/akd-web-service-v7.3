<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;

use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    protected $SuccessStatus = 200;
    protected $ErrorStatus = 401;
    
    public function index(){
        $user = User::all();
        return response()->json($user); 
    }
    public function login(Request $request){
        $message = '';
        $user = User::where('username', '=', $request->username)->firstOrFail();
        //cek ada username 
        if($user){
            //cek password sesuai atau tidak
            $password_check = Hash::check($request->password, $user['password']);
            if($password_check == true){
                $message = 'Success';
                $status_code = $this->SuccessStatus;
            }else{
                $message = 'Incorrect Password';
                $user = '';
                $status_code = $this->ErrorStatus;
            }
        }else{
            $message = 'User Not Found';
            $user = '';
            $status_code = $this->ErrorStatus;
        }
        return response()->json([
                'status_code' => $status_code,
                'message' => $message,
                'data' => $user,
            ]);
    }

    public function register(Request $request){
        $user = new User;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->group_user = $request->group_user;
        $user->save();

        $response = [
            'code' => $this->SuccessStatus,
            'message' => 'Success',
            'data' => $user,
        ];
        
        return response()->json($response, $response['code']); 
    }
    
    public function update(Request $request){
        
    }
}
