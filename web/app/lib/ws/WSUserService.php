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

        $rut = $username;
        $contrasena = hash('sha256', strtoupper($password));


        // Esto deberían encapsularlo en una clase utilitaria.
        $service_url = "https://sepa.utem.cl/saap-rest/api/autenticar/$rut/$contrasena";
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_USERPWD, '1-9:cdd76843b09fe09ab11876ab7986214e52e00791');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $curl_response = curl_exec($curl);
        if ($curl_response === false) {
            $error = curl_error($curl);
            \Log::error("Error al procesar curl: '$error'");

            /*
              $info = curl_getinfo($curl);
              \Log::error('error occured during curl exec. Additioanl info: ' . var_export($info));
             */

            curl_close($curl);
            exit();
        } else {
            curl_close($curl);
            $salida = json_decode($curl_response, true);
            \Log::info("Salida: " . var_export($salida, true) . " '$curl_response'");

            $respuesta = (bool) $salida['respuesta'];
            $mensaje = (string) $salida['mensaje'];

            if ($respuesta) {

                // Guardo Acceso
                $rut = \App\RutUtils::rut($username);
                \Log::info("Rut: $username / $rut");
                $usuario = \App\Modelo\Usuario::where('rut', '=', $rut)->first();
                if ($usuario instanceof \App\Modelo\Usuario) {
                    \Log::info("Usuario encontrado: {$usuario->rut}");
                } else {
                    \Log::warning("Usuario no encontrado -> se creará uno");
                    $usuario = new \App\Modelo\Usuario();
                    $usuario->rut = $rut;
                    $usuario->nombre = "";
                    $usuario->save();
                }

                $ip = \Request::getClientIp();
                $acceso = new \App\Modelo\Acceso();
                $acceso->ip = $ip;
                $acceso->usuario_fk = $usuario->pk;
                $acceso->save();

                \Log::info("Usuario {$usuario->rut} autenticado exitosamente");

                $resultado = true;
            } else {
                \Log::error("Servicio REST respondió: '$mensaje'");
            }
        }
        return (bool) $resultado;
    }

}

?>
