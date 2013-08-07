<?php

namespace WS\Domain\User\Entity\WSUser;

/**
 * Description of WSUser
 *
 * @author Sebastián Salazar Molina <ssalazar@orangepeople.cl>
 */
class WSUser {

    private $rut;

    public function getRut() {
        return $this->rut;
    }

    public function setRut($rut) {
        $this->rut = $rut;
    }

    public function getUserIdentifier() {
        return $this->rut;
    }
    
    public function getUserName() {
        return $this->rut;
    }
}

?>
