<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TRegistrasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionData extends Controller
{
    //
    public function tregistrasi(Request $request)
    {
        $regis = TRegistrasi::select(
            't_registrasi.kd_registrasi',
            't_registrasi.no_registrasi',
            't_registrasi.tgl_registrasi',
            't_registrasi.kd_pasien',
            't_registrasi.kd_dokter',
            't_registrasi.keterangan_pemeriksaan',
            'm_pasien.no_pasien',
            'm_pasien.nama_pasien',
            'm_pasien.tgl_lahir',
            'jenis_kelamin.pilihan AS pil_jenis_kelamin',
            'm_dokter.nama_dokter'

        )
        ->leftJoin('m_pasien','m_pasien.kd_pasien','t_registrasi.kd_pasien')
        ->leftJoin('m_pilihan AS jenis_kelamin','jenis_kelamin.kd_pilihan','m_pasien.kd_pil_jenis_kelamin')
        ->leftJoin('m_dokter','m_dokter.kd_dokter','t_registrasi.kd_dokter')
        ->where('t_registrasi.status','!=',0)
        ->get();

        foreach ($regis as $key => $data) {
            $data['tgl_regis'] = Carbon::parse($data->tgl_registrasi)->format('d/m/Y');
            $data['tgl_lahir_pasien'] = Carbon::parse($data->tgl_lahir)->format('d/m/Y');
        }

        if ($request->ajax()) {
            return datatables()->of($regis)
            ->addIndexColumn()

            ->make(true);
        }

        return response()->json($regis);
    }

}
