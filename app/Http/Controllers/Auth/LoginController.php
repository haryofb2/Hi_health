<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Helpers\EnDecPwHelpers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        // $nama = strtoupper($input['username']);
        $nama = strtolower($input['username']);

        // dd($nama);
        // dd(EnDecPwHelpers::encriptDjava($input['password']));

        $user=User::select(
            "user_master.*",
            // "m_karyawan.kd_cabang"
        )
        // ->leftJoin('m_karyawan','m_karyawan.kd_karyawan','user_master.kd_user')
        ->where('nama_user', $nama)->where('password', '=', EnDecPwHelpers::encriptDjava($input['password']))->first();

        if ($user == null) {
            # code...
            $login = 'tidak ada';
        }
        else{
            $login = $user->nama_user;
        }
        // dd($user);

        if($nama == $login) {
            auth()->login($user);
            return redirect()->route('home');
        }else{
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'approve' => 'Wrong password or this account not approved yet.',
            ]);
        }

    }
    public function decryptData($data)
    {
        $awal = array('1', '2', '3');
        $encryptdata = array('7', '6', '9');
        return $resultEncrypt = str_replace($awal, $encryptdata, $data);


    }

    public function encriptDjava($data)
    {
        $iLen = strlen($data);
        $sNewText='';

        for ($i=1; $i <= $iLen; $i++) {
            # code...
            $sChar = substr($data, $i, 1);
            if ($sChar > 'v') {
                # code...
                $data = strtoupper($data);
            }
        }

        for ($i=0; $i < $iLen; $i++) {
            $iAscii =ord(substr($data, $i, 1));
            $mod = fmod($iAscii,2);
            if ($mod == 0 ) {
                $tes = $iAscii + 1;
            } else {
                $tes = $iAscii + 3;
            }

            $chr_val = chr(intval($tes)+intval($iLen));
            $sNewText .= $chr_val;
        }
        return $sNewText;
    }

}
