<?php

namespace App\Modelo;

/**
 * Description of Acceso
 *
 * @author Sebastián Salazar Molina <ssalazar@orangepeople.cl>
 */
class Acceso extends \Eloquent {

    protected $table = "accesos";
//    protected $fillable = array('pk', 'usuario_fk', 'fecha', 'ip');
    protected $guarded = array('fecha');
    public static $key = 'pk';

    
    public function usuario() {
        return $this->belongsTo('Usuario');
    }
}

?>
