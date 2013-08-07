<?php

/**
 * Description of LoginController
 *
 * @author Sebastián Salazar Molina <ssalazar@orangepeople.cl>
 */
class LoginController extends BaseController {

    public function showLogin() {
        if (Auth::check()) {
            return Redirect::to('home')->with('exito', 'Ya está logueado');
        }

        return View::make('login');
    }

    public function postLogin() {
        // Get all the inputs
        // id is used for login, username is used for validation to return correct error-strings
        $userdata = array(
            'id' => Input::get('rut'),
            'rut' => Input::get('rut'),
            'password' => Input::get('password')
        );

        // Declare the rules for the form validation.
        $rules = array(
            'rut' => 'Required',
            'password' => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make($userdata, $rules);

        // Check if the form validates with success.
        if ($validator->passes()) {
            // remove username, because it was just used for validation
            unset($userdata['rut']);

            // Try to log the user in.
            if (Auth::attempt($userdata)) {
                // Redirect to homepage
                return Redirect::to('home')->with('exito', 'Logueado exitosamente');
            } else {
                // Redirect to the login page.
                return Redirect::to('login')->withErrors(array('password' => 'Password inválida'))->withInput(Input::except('password'));
            }
        }

        // Something went wrong.
        return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
    }

    public function getLogout() {
        // Log out
        Auth::logout();

        // Redirect to homepage
        return Redirect::to('login')->with('exito', 'Se ha deslogueado exitosamente');
    }

}

?>
