<?php

namespace WS\Domain\User\Service;

use Illuminate\Auth\AuthServiceProvider;

/**
 * Description of WSUserService
 *
 * @author Sebastián Salazar Molina <ssalazar@orangepeople.cl>
 */
class WSUserService extends AuthServiceProvider {

    public function findUserByUserIdentifier($identificador) {
        $usuario = new \UsuarioWS();
        $usuario->setAuthIdentifier($identificador);
        return $usuario;
    }

    public function findUserByUserName($username) {
        $usuario = new \UsuarioWS();
        $usuario->setAuthIdentifier($username);
        return $usuario;
    }

    public function validateUserCredentials($username, $password) {
        $resultado = false;

        $parametros = array();
        $parametros['rut'] = $username;
        $parametros['password'] = hash('sha256', strtoupper($password));

        $opciones = array('login' => "isw", 'password' => "8c18f4e50e8e65a6d19e14a9c90437d67bb05e5a");

        $objClienteSOAP = new \SoapClient("http://informatica.utem.cl:8011/dirdoc-auth/ws/auth?wsdl", $opciones);
        $objRespuesta = $objClienteSOAP->autenticar($parametros);

        $codigo = (int) $objRespuesta->return->codigo;
        $descripcion = (string) $objRespuesta->return->descripcion;
        $nombre = (string) $objRespuesta->return->nombre;


        if ($codigo > 0) {

            // Guardo Acceso
            $usuario = \App\Modelo\Usuario::where('rut', '=', $username)->first();
            if (!($usuario instanceof \App\Modelo\Usuario)) {
                \Log::warning("Usuario no encontrado -> se creará uno");
                $usuario = new \App\Modelo\Usuario();
                $usuario->rut = $username;
                $usuario->nombre = $nombre;
                $usuario->save();
            } else {
                \Log::info("Usuario encontrado: {$usuario->nombre}");
            }

            $ip = \Request::getClientIp();
            $acceso = new \App\Modelo\Acceso();
            $acceso->ip = $ip;
            $acceso->usuario_fk = $usuario->pk;
            $acceso->save();

            \Log::info("Usuario $nombre autenticado exitosamente");

            $resultado = true;
        } else {
            \Log::error("Servicio WEB respondió: $descripcion ($codigo)");
        }

        return (bool) $resultado;
    }

}

?>
