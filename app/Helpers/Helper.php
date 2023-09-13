<?php
use App\counterdocument;
use app\mkey;

class Helper{


    public function encriptDjava($input)
    {
        $data = $input['password'];
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

    function mkeyHelpers($nm_table){
        $slc_mkey = mkey::where('nm_table',$nm_table)->where('kd_aplikasi','1000')->first();

        $no_kd_baru = $slc_mkey->no_urut+1;

        mkey::where('nm_table',$nm_table)->update(['no_urut'=>$no_kd_baru]);

        $new_kd = strval(trim($slc_mkey->kd_aplikasi).trim($slc_mkey->kode).config('variabel.gs_periode').sprintf('%07d',$no_kd_baru));

        return $new_kd;
    }


    function counterDoc($kd_string,$year){

        $slc_count_doc = counterdocument::where('kode_string',$kd_string)->where('no_instalasi','01')->where('tahun',$year)->first();

        $no_urut_baru = $slc_count_doc->no_counter_doc+1;

        counterdocument::where('kode_string',$kd_string)->update(['no_counter_doc' => $no_urut_baru]);

        $new_count_doc = $slc_count_doc->no_counter_doc;

        return $new_count_doc;
                }


}