<?php

namespace App;

/**
 * Description of Utils
 *
 * @author Sebastián Salazar Molina <ssalazar@orangepeople.cl>
 */
class Utils {

    public static function rut($rut_str) {
        
    }

    public static function isRut($r) {

        $resultado = false;

        $r = str_replace(array('.', ',', '-'), "", strtoupper($r));
        $sub_rut = substr($r, 0, strlen($r) - 1);
        $sub_dv = substr($r, -1);
        $x = 2;
        $s = 0;

        for ($i = strlen($sub_rut) - 1; $i >= 0; $i--) {
            if ($x > 7) {
                $x = 2;
            }
            $s += $sub_rut[$i] * $x;
            $x++;
        }

        $dv = 11 - ($s % 11);

        if ($dv == 10) {
            $dv = 'K';
        }

        if ($dv == 11) {
            $dv = '0';
        }

        if ($dv == $sub_dv) {
            $resultado = true;
        }

        return (bool) $resultado;
    }

}

?>
