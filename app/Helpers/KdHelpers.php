<?php

namespace App\Helpers;

use App\counterdocument;
use App\mkey;
use App\tablelist;
use Carbon\Carbon;

class KdHelpers
{

    public static function makekd($data)
    {

        // $periode = Carbon::now()->format('y');
        $nm_table = $data;

        $select_table_list = tablelist::where('nm_table',$nm_table)->first();

        if ($select_table_list == null) {
            # code...
            $select_t_list = tablelist::orderBy('kode','DESC')->first();

            if ($select_t_list == null) {
                tablelist::Create(['nm_table'=>$nm_table,'kode'=>'0001']);
            } else {
                # code...
                $sum_kode = intval($select_t_list->kode)+1;
                $new_t_list_kode = sprintf('%04d',$sum_kode);

                tablelist::Create(['nm_table'=>$nm_table,'kode'=>$new_t_list_kode]);
            }

        }
            # code...
        $select_table_list_new = tablelist::where('nm_table',$nm_table)->first();

        $select_m_key_check = mkey::where('nm_table', $nm_table)->where('kd_aplikasi','1000')->first();
        if ($select_m_key_check == null) {
            # code...
            mkey::Create([
                'kd_aplikasi'=>'1000',
                'nm_table'=>$nm_table,
                'kode'=>$select_table_list_new->kode,
                'periode'=>00,
                'no_urut'=>0
            ]);
        }
            # code...
        // dd($select_table_list_new);


        $select_m_key = mkey::where('nm_table', $nm_table)->where('kd_aplikasi','1000')->first();

        $no_urut_baru = $select_m_key->no_urut+1;
        mkey::where('nm_table', $nm_table)->where('kd_aplikasi','1000')->update(['no_urut' => $no_urut_baru]);
        // dd($select_m_key);

        $new_kd = strval(trim($select_m_key->kd_aplikasi).trim($select_m_key->kode).config('variabel.gs_periode').sprintf('%07d', $no_urut_baru));

        return $new_kd;
    }

    public static function makeno($data)
    {
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $year_kd = Carbon::now()->format('y');

        $slc_count_doc_check = counterdocument::where('kode_string','=',$data,'and')->where('no_instalasi','=','01')->where('tahun','=',$year)->first();

        if($slc_count_doc_check === null)
        {
            $select_m_key_count = mkey::where('nm_table','m_counter_document')->where('kd_aplikasi','1000')->first();
            $no_urut_baru_count = $select_m_key_count->no_urut+1;
            // dd($no_urut_baru_count);
            mkey::where('nm_table','m_counter_document')->where('kd_aplikasi',1000)->update(['no_urut' => $no_urut_baru_count]);

            $new_kd_count = strval(trim($select_m_key_count->kd_aplikasi).trim($select_m_key_count->kode).config('variabel.gs_periode').sprintf('%07d',$no_urut_baru_count));

            $con_doc = new counterdocument();
            $con_doc->kd_counter_doc = $new_kd_count;
            $con_doc->no_counter_doc= $data.'01'.$year_kd.$month.sprintf('%04d',0);
            $con_doc->kode_string = $data;
            $con_doc->tahun=$year;
            $con_doc->no_instalasi = '01';
            $con_doc->save();

            // $con = counterdocument::where('tahun','=',$year)->first();

            // $data = strval(trim($con->kode_string).trim($con->no_instalasi).$year_kd.$month.sprintf('%04d',0));
        }


        // $select_m_key = mkey::where('nm_table','m_customer')->where('kd_aplikasi','1000')->first();
        // $no_urut_baru = $select_m_key->no_urut+1;
        // mkey::where('nm_table','m_customer')->update(['no_urut' => $no_urut_baru]);
        // $new_kd = strval(trim($select_m_key->kd_aplikasi).trim($select_m_key->kode).config('variabel.gs_periode').sprintf('%07d',$no_urut_baru));

        $slc_count_doc = counterdocument::where('kode_string','=',$data,'and')->where('no_instalasi','=','01')->where('tahun','=',$year)->first();

        $seri_count = substr($slc_count_doc->no_counter_doc,9);
        $count = $seri_count+1;
        // $tes = trim($slc_count_doc->no_instalasi);
        $new_count = strval($data.trim($slc_count_doc->no_instalasi).$year_kd.$month.sprintf('%04d',$count));
        //     $no_urut_baru = $slc_count_doc->no_counter_doc+1;
        counterdocument::where('kode_string',$data)->where('tahun',$year)->update(['no_counter_doc' => $new_count]);

        return $new_count;
    }
}
