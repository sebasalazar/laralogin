<?php

namespace App\Modelo;

/**
 * Description of Acceso
 *
 * @author Sebastián Salazar Molina <ssalazar@orangepeople.cl>
 */
class Acceso extends Illuminate\Database\Eloquent {

    protected $table = "accesos";
//    protected $fillable = array('pk', 'usuario_fk', 'fecha', 'ip');
    public static $key = 'pk';

    
    public function usuario() {
        return $this->belongsTo('Usuario');
    }
}

?>
