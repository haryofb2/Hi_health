<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\EnDecPwHelpers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //set validation


        //get credentials from request
        // $credentials = $request->only('email', 'password');


        $nama = strtoupper($request['nama_user']);


        $user = User::select(
            'user_master.*',
            'm_karyawan.kd_cabang',
            'm_karyawan.kd_departement',
            'm_karyawan.kd_jabatan'
        )
            ->leftJoin('m_karyawan', 'm_karyawan.kd_karyawan', 'user_master.kd_user')
            ->where('nama_user', '=', $nama)
            ->where('password', '=', EnDecPwHelpers::encriptDjava($request['password']))
            ->first();

        // dd($user);

        //if auth failed
        if ($user != null) {
            # code...
            if (!$token = JWTAuth::fromUser($user)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Username atau Password Anda salah'
                ], 401);
            }

            //if auth success
            return response()->json([
                'success' => true,
                'user'    => $user,
                'token'   => $token
            ], 200);
        } else {
            # code...
            return response()->json([
                'success' => false,
                'message' => 'Username atau Password Anda salah'
            ], 200);
        }
    }
}
