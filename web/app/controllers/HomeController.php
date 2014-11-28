<?php

class HomeController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function showWelcome() {
        // Obtendremos todos los datos de consulta, se mostrarán en una tabla sencilla
        $data = DB::table('usuarios')
                ->join('accesos', 'usuarios.pk', '=', 'accesos.usuario_fk')
                ->select('usuarios.nombre', 'usuarios.rut', 'accesos.fecha', 'accesos.ip')
                ->get();

        // Contamos Agrupados
        $grupo = DB::table('usuarios')
                ->join('accesos', 'usuarios.pk', '=', 'accesos.usuario_fk')
                ->select(DB::raw('usuarios.rut, count(*) as total'))
                ->groupBy('usuarios.rut')
                ->get();

        return View::make('home')->with('data', $data)->with('grupo', $grupo);
    }

}