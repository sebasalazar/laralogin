<?php

namespace App\Modelo;

/**
 * Description of Usuario
 *
 * @author Sebastián Salazar Molina <ssalazar@orangepeople.cl>
 */
class Usuario extends \Eloquent {

    protected $table = "usuarios";
    public $primaryKey = 'pk';
    public $timestamps = false;

}

?>
