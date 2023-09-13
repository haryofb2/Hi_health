<?php

namespace App\Http\Controllers;

use App\masterpilihan;
use App\masterunit;
use App\orderpekerjaan01;
use App\tablelist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    return view('content.dashboard.dashboard');

}
        public function coba()
    {
        $coba = tablelist::orderBy('nm_table','ASC')->where('nm_table','!=','m_aktifitas_produksi')->where('nm_table','!=','m_komponen_unit_detail_01')->where('nm_table','!=','m_komponen_unit_detail_02')->where('nm_table','!=','m_komponen_unit_permasalahan_unit_01')->where('nm_table','!=','m_komponen_unit_sub')->where('nm_table','!=','m_rak_detal')->get();



        foreach ($coba as $delete) {
            # code...

            // echo($delete->nm_table);
            $coba = DB::connection('sqlsrv')->select(' select * FROM "'.$delete->nm_table.'"');
            dd($coba);
            // DB::delete('SQL QUERY HERE');
        }

    }


}
