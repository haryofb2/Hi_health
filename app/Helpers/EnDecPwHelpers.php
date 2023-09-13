<?php

namespace App\Helpers;

class EnDecPwHelpers
{
    public static function encriptDjava($data)
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

    public static function decriptDjava($data)
    {
        // $data
        $iLen = strlen($data);
        $sNewText='';

        for ($i=0; $i < $iLen ; $i++) {
            $iAscii =ord(substr($data, $i, 1))-intval($iLen);
            $mod = fmod($iAscii,2);
            if ($mod == 1 ) {
                $tes = $iAscii - 1;
            } else {
                $tes = $iAscii - 3;
            }
            $chr_val = chr(intval($tes));
            $sNewText .= $chr_val;
        }
        return $sNewText;
    }
}
