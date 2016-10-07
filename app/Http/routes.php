<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {


    /*******************************/
    /**         LOGIN            **/
    /*****************************/
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

    /*******************************/

    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([
        'lang' => 'en|es'
    ]);


    Route::group(['middleware' => 'auth'], function(){


        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/mantenedores', function () {
            return view('mantenedores/inicio');
        });


        /*|--------------------------------------------------------------------------
        | MANTENEDOR DE USUARIOS
        |------------------------------------------------------------------------*/

        /* create */
        Route::get('/ingresarUsuario',
            'Mantenedores\MantenedorDeUsuarios@ingresarUsuario')
            ->name('ingresarUsuario');

        Route::post('/ingresarUsuario',
            'Mantenedores\MantenedorDeUsuarios@accionIngresarUsuario');


        /* update */
        Route::get('actualizarUsuario/{id}',
            'Mantenedores\MantenedorDeUsuarios@actualizar')
            ->name('actualizarUsuario');

        Route::post('actualizarUsuario/{id}',
            'Mantenedores\MantenedorDeUsuarios@accionActializarUsuario')
            ->name('actualizarUsuario');

        Route::get('/restablecerContrasenia/{id}',
            'Mantenedores\MantenedorDeUsuarios@restablecerContrasenia')
            ->name('restablecerContrasenia');

        /* delete */
        Route::get('eliminarUsuario/{id}',
            'Mantenedores\MantenedorDeUsuarios@eliminarUsuario')
            ->name('eliminarUsuario');

        /* list */
        Route::get('/listarUsuario',
            'Mantenedores\MantenedorDeUsuarios@listarTodos')
            ->name('listarUsuario');

        Route::post('/listarUsuario',
            'Mantenedores\MantenedorDeUsuarios@buscarUsuario');


        /* ver */
        Route::get('/verUsuario/{id}',
            'Mantenedores\MantenedorDeUsuarios@verUsuario')
            ->name('verUsuario');

        // CARGA EL COMBO CIUDAD CON EL ID DEL PAÍS
        Route::get('/cargaCiudadUsuario/{id}',
            'Mantenedores\MantenedorDeUsuarios@cargaCiudadUsuario');

        Route::post('/cargaCiudadUsuario',
            'Mantenedores\MantenedorDeUsuarios@cargaCiudadUsuario');

        /*|--------------------------------------------------------------------------
        | MANTENEDOR DE ACTIVOS
        |------------------------------------------------------------------------*/

        /* list */
        Route::get('/listarActivo',
            'Mantenedores\MantenedorDeActivos@index')
            ->name('listarActivo');
        Route::post('/listarActivo',
            'Mantenedores\MantenedorDeActivos@search')
            ->name('listarActivo');

        /* update */
        Route::get('actualizarActivo/{id}',
            'Mantenedores\MantenedorDeActivos@edit')
            ->name('actualizarActivo');

        Route::post('actualizarActivo/{id}',
            'Mantenedores\MantenedorDeActivos@actionEdit')
            ->name('actualizarActivo');

        /* ver */
        Route::get('verActivo/{id}',
            'Mantenedores\MantenedorDeActivos@show')
            ->name('verActivo');


        /**********************************/
        /** MANTENEDOR DE CARGOS        **/
        /********************************/

        /* list */
        Route::get('/listarCargo',    'Mantenedores\MantenedorDeCargos@listarTodos')->name('listarCargo');
        Route::post('/listarCargo',   'Mantenedores\MantenedorDeCargos@buscarCargo');

        /* update */
        Route::get('actualizarCargo/{id}',    'Mantenedores\MantenedorDeCargos@actualizar')->name('actualizarCargo');
        Route::post('actualizarCargo/{id}',   'Mantenedores\MantenedorDeCargos@accionActualizar')->name('actualizarCargo');

        /* create */
        Route::get('/ingresarCargo',  'Mantenedores\MantenedorDeCargos@ingresar')->name('ingresarCargo');
        Route::post('/ingresarCargo', 'Mantenedores\MantenedorDeCargos@accionIngresar')->name('ingresarCargo');

        /* ver */
        Route::get('/verCargo/{id}', 'Mantenedores\MantenedorDeCargos@ver')->name('verCargo');

        /* delete */
        Route::get('eliminarCargo/{id}', 'Mantenedores\MantenedorDeCargos@eliminar')->name('eliminarCargo');

        /**********************************/

        /*
        |--------------------------------------------------------------------------
        | MANTENEDOR DE NIVELES DE DEPARTAMENTOS
        |--------------------------------------------------------------------------
        *///INICIO

        /* list */
        Route::get('/listarNivelDepartamento',    'Mantenedores\MantenedorDeNivelesDepartamentos@listarTodos')
            ->name('listarNivelDepartamento');
        
        Route::post('/listarNivelDepartamento',   'Mantenedores\MantenedorDeNivelesDepartamentos@buscar');

        /* create */
        Route::get('/ingresarNivelDepartamento',  'Mantenedores\MantenedorDeNivelesDepartamentos@ingresar')
            ->name('ingresarNivelDepartamento');


        /* delete */
        Route::get('eliminarNivelDepartamento/{id}', 'Mantenedores\MantenedorDeNivelesDepartamentos@eliminar')
            ->name('eliminarNivelDepartamento');

        /* ver */
        Route::get('/verNivelDepartamento/{id}', 'Mantenedores\MantenedorDeNivelesDepartamentos@ver')
            ->name('verNivelDepartamento');

        /*//FIN
        |--------------------------------------------------------------------------
        |--------------------------------------------------------------------------
        */

        /*
        |--------------------------------------------------------------------------
        | MANTENEDOR DE NIVELES DE CARGOS
        |--------------------------------------------------------------------------
        *///INICIO

        /* list */
        Route::get('/listarNivelCargo',    'Mantenedores\MantenedorDeNivelesCargos@listarTodos')
            ->name('listarNivelCargo');

        Route::post('/listarNivelCargo',   'Mantenedores\MantenedorDeNivelesCargos@buscar');

        /* create */
        Route::get('/ingresarNivelCargo',  'Mantenedores\MantenedorDeNivelesCargos@ingresar')
            ->name('ingresarNivelCargo');

        /* delete */
        Route::get('eliminarNivelCargo/{id}', 'Mantenedores\MantenedorDeNivelesCargos@eliminar')
            ->name('eliminarNivelCargo');

        /* ver */
        Route::get('/verNivelCargo/{id}',     'Mantenedores\MantenedorDeNivelesCargos@ver')
            ->name('verNivelCargo');

        /*//FIN
        |--------------------------------------------------------------------------
        |--------------------------------------------------------------------------
        */


        /*
        |--------------------------------------------------------------------------
        | MANTENEDOR DE DEPARTAMENTOS
        |--------------------------------------------------------------------------
        *///INICIO

        /* list */
        Route::get('/listarDepartamentos','Mantenedores\MantenedorDeDepartamentos@index')->name('listarDepartamentos');
        Route::post('/listarDepartamentos','Mantenedores\MantenedorDeDepartamentos@search');

        /* create */
        Route::get('/ingresarDepartamento',  'Mantenedores\MantenedorDeDepartamentos@create')
            ->name('ingresarDepartamento');

        Route::post('/ingresarDepartamento',  'Mantenedores\MantenedorDeDepartamentos@store');


        /*//FIN
        |--------------------------------------------------------------------------
        |--------------------------------------------------------------------------
        */




    });


});









/*******************************/
/**         PROTOTIPOS       **/
/*****************************/

// asignación de activos >>
Route::get('/asignarActivoIndex', function () {
    return view('prototypes/asignarActivo/index');
});

Route::get('/asignarActivo', function () {
    return view('prototypes/asignarActivo/asignarActivo');
});
// asignación de activos <<

// ingresar compra >>

Route::get('/ingresarCompraIndex', function () {
    return view('prototypes/ingresarCompra/index');
});

// ingresar compra <<

/*******************************/