<?php

namespace App\Http\Controllers\API;

use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        try {

            $userCheck = User::where('email', $request->email);

            if($userCheck->count()){
                $success = false;
                $message = 'ອີເມວນີ້ ໄດ້ຖືກລົງທະບຽນແລ້ວ!';
            }else{
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();

                $success = true;
                $message = "ການລົງທະບຽນ ສຳເລັດ!";
            }


        } catch (\Throwable $th) {
            //throw $th;
            $success = false;
            $message = $th->getMessage();
        }

        //  response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    public function login(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            $success = true;
            $message = 'ການເຂົ້າສູ່ລະບົບ ສຳເລັດ!';
        }else{
            $success = false;
            $message = 'ເຂົ້າສູ່ລະບົບ ບໍ່ສຳເລັດ';
        }

        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

public function logout(){
    try {
        Session::flush();
        $success = true;
        $message = "ອອກຈາກລະບົບ ສຳເລັດ!";
    } catch (\Throwable $th) {
        //throw $th;
        $success = false;
        $message = $th->getMessage();
    }

    // response
    $response = [
        'success' => $success,
        'message' => $message,
    ];
    return response()->json($response);
}

}
