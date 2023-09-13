<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MDokter;
use App\Models\MKota;
use App\Models\MPasien;
use App\Models\MPemeriksaan;
use App\Models\MPilihan;
use App\Models\MPoliklinik;
use App\Models\MPoliklinikDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MasterData extends Controller
{
    //
    public function mpemeriksaandatatable(Request $request)
    {
        {
            $pemeriksaan = MPemeriksaan::select(
                'm_pemeriksaan.kd_pemeriksaan',
                'm_pemeriksaan.nama_pemeriksaan',
                'm_pemeriksaan.kd_poliklinik',
                'm_pemeriksaan.kd_pemeriksaan_golongan',
                'm_poliklinik.nama_poliklinik',
                'm_pemeriksaan_golongan.nama_pemeriksaan_golongan',
                'm_pemeriksaan_lab_01.nama_pemeriksaan_lab_01',

            )
            ->leftJoin('m_poliklinik','m_poliklinik.kd_poliklinik','m_pemeriksaan.kd_poliklinik')
            ->leftJoin('m_pemeriksaan_golongan','m_pemeriksaan_golongan.kd_pemeriksaan_golongan','m_pemeriksaan.kd_pemeriksaan_golongan')
            ->leftJoin('m_pemeriksaan_lab_01','m_pemeriksaan_lab_01.kd_pemeriksaan_lab_01','m_pemeriksaan.kd_pemeriksaan_lab_01')
            ->where('m_pemeriksaan.status','!=',0)
            ->get();

            if ($request->ajax()) {
                return datatables()->of($pemeriksaan)
                ->addIndexColumn()
                ->addcolumn('action', function ($data) {
                    $li_kd_pemeriksaan = trim($data->kd_pemeriksaan);
                    $action = '<a href="javascript:void(0);" class="btn btn-sm btn-primary sticky" id="btn_pemeriksaan" data-id="'.$li_kd_pemeriksaan.'"><i class="fa fa-plus"></i></a>';
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
            }

            return response()->json($pemeriksaan);
        }

    }

    public function mpemeriksaanchoose(Request $request)
    {
        $data = MPemeriksaan::select(
            'm_pemeriksaan.kd_pemeriksaan',
            'm_pemeriksaan.nama_pemeriksaan',
            'm_pemeriksaan.kd_pemeriksaan_golongan',
            'm_pemeriksaan_golongan.nama_pemeriksaan_golongan',
            'm_pemeriksaan_lab_01.nama_pemeriksaan_lab_01',
        )
        ->leftJoin('m_pemeriksaan_golongan','m_pemeriksaan_golongan.kd_pemeriksaan_golongan','m_pemeriksaan.kd_pemeriksaan_golongan')
        ->leftJoin('m_pemeriksaan_lab_01','m_pemeriksaan_lab_01.kd_pemeriksaan_lab_01','m_pemeriksaan.kd_pemeriksaan_lab_01')
        ->where('m_pemeriksaan.kd_pemeriksaan',$request->kd_pemeriksaan)
        ->first();

        return response()->json($data);
    }


    public function mpasiendatatable(Request $request)
    {
        $pasien = MPasien::select(
            'm_pasien.kd_pasien',
            'm_pasien.no_pasien',
            'm_pasien.nama_pasien'
        )
        ->where('m_pasien.status','!=',0)
        ->get();

        if ($request->ajax()) {
            return datatables()->of($pasien)
            ->addIndexColumn()
            ->addcolumn('action', function ($data) {
                $li_kd_pasien = trim($data->kd_pasien);
                $action = '<a href="javascript:void(0);" class="btn btn-sm btn-primary sticky" id="btn_pasien" data-id="'.$li_kd_pasien.'"><i class="fa fa-plus"></i></a>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return response()->json($pasien);
    }

    public function mpilihandropdown(Request $request)
    {
        $data = MPilihan::where('group_pilihan',$request->group_pilihan)->get();
        return response()->json($data);
    }
    public function mkotadropdown(Request $request)
    {
        $data = MKota::where('m_kota.status','!=',0)->get();
        return response()->json($data);
    }

    public function mpasienchoose(Request $request)
    {
        $data = MPasien::select(
            'm_pasien.kd_pasien',
            'm_pasien.no_pasien',
            'm_pasien.nama_pasien',
            'm_pasien.title_pasien',
            'm_pasien.tgl_lahir',
            'm_pasien.kd_pil_jenis_kelamin',
            'm_pasien.nama_ibu_kandung',
            'm_pasien.no_telp',
            'm_pasien.no_hp',
            'm_pasien.email',
            'm_pasien.alamat_domisili',
            'm_pasien.kelurahan',
            'm_pasien.kecamatan',
            'm_pasien.kd_kota',
            'm_pasien.kodepos',
            'm_pasien.no_ktp',
            'm_pasien.alamat_ktp',
        )
        ->where('m_pasien.kd_pasien',$request->kd_pasien)
        ->first();

        $data['tgl_lahir_carbon'] = Carbon::parse($data->tgl_lahir)->format('Y-m-d');

        return response()->json($data);
    }

    public function mpoliklinikdropdown(Request $request)
    {
        $data = MPoliklinik::where('m_poliklinik.status','!=',0)->get();
        return response()->json($data);
    }

    public function mdokterpoliklinikdatatable(Request $request)
    {


        $poliklinik_detail = MPoliklinikDetail::where('kd_poliklinik',$request->kd_poliklinik)->first();

        $dokter = MDokter::select(
            'm_dokter.kd_dokter',
            'm_dokter.no_dokter',
            'm_dokter.title_dokter',
            'm_dokter.nama_dokter',
            'm_dokter.kd_spesialis',
            'm_spesialis.nama_spesialis',
        )
        ->leftJoin('m_spesialis','m_spesialis.kd_spesialis','m_dokter.kd_spesialis')
        ->where('m_dokter.kd_spesialis',$poliklinik_detail->kd_spesialis)
        ->where('m_dokter.status','!=',0)
        ->get();

        if ($request->ajax()) {
            return datatables()->of($dokter)
            ->addIndexColumn()
            ->addcolumn('action', function ($data) {
                $li_kd_dokter = trim($data->kd_dokter);
                $action = '<a href="javascript:void(0);" class="btn btn-sm btn-primary sticky" id="btn_dokter_poliklinik" data-id="'.$li_kd_dokter.'"><i class="fa fa-plus"></i></a>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return response()->json($dokter);
    }

    public function mdokterchoose(Request $request)
    {
        $data = MDokter::select(
            'm_dokter.*',
            'm_spesialis.nama_spesialis',
        )
        ->leftJoin('m_spesialis','m_spesialis.kd_spesialis','m_dokter.kd_spesialis')
        ->where('m_dokter.kd_dokter',$request->kd_dokter)
        ->first();

        return response()->json($data);
    }

    public function mdokterdatatable(Request $request)
    {
        $dokter = MDokter::select(
            'm_dokter.kd_dokter',
            'm_dokter.no_dokter',
            'm_dokter.title_dokter',
            'm_dokter.nama_dokter',
            'm_dokter.kd_spesialis',
            'm_spesialis.nama_spesialis',
        )
        ->leftJoin('m_spesialis','m_spesialis.kd_spesialis','m_dokter.kd_spesialis')
        ->where('m_dokter.status','!=',0)
        ->get();

        if ($request->ajax()) {
            return datatables()->of($dokter)
            ->addIndexColumn()
            ->addcolumn('action', function ($data) {
                $li_kd_dokter = trim($data->kd_dokter);
                $action = '<a href="javascript:void(0);" class="btn btn-sm btn-primary sticky" id="btn_dokter" data-id="'.$li_kd_dokter.'"><i class="fa fa-plus"></i></a>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return response()->json($dokter);

    }

}
