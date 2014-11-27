<?php

use Illuminate\Auth\UserInterface;

/**
 * Description of Usuario
 *
 * @author Sebastián Salazar Molina <ssalazar@orangepeople.cl>
 */
class UsuarioWS implements UserInterface {

    private $authIdentifier = null;
    private $authPassword = null;

    public function getAuthIdentifier() {
        return $this->authIdentifier;
    }

    public function setAuthIdentifier($authIdentifier) {
        $this->authIdentifier = $authIdentifier;
    }

    public function getAuthPassword() {
        return $this->authPassword;
    }

    public function setAuthPassword($authPassword) {
        $this->authPassword = $authPassword;
    }

    public function getUserIdentifier() {
        return $this->authIdentifier;
    }

    public function getUserName() {
        return $this->authIdentifier;
    }

    public function getRememberToken() {
        
    }

    public function getRememberTokenName() {
        
    }

    public function setRememberToken($value) {
        
    }

}

?>
