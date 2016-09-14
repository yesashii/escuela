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



Route::get('activo', function () {
    return view('mantenedores_dev/activo');
});

Route::group(['middleware' => 'auth'], function(){


    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/mantenedores', function () {
        return view('mantenedores/inicio');
    });


    /*******************************/
    /** MANTENEDOR DE USUARIOS   **/
    /*****************************/

    /* create */
    Route::get('/ingresarUsuario',  'Mantenedores\MantenedorDeUsuarios@ingresarUsuario')->name('ingresarUsuario');
    Route::post('/ingresarUsuario',   'Mantenedores\MantenedorDeUsuarios@accionIngresarUsuario');

    /* update */
    Route::get('actualizarUsuario/{id}',    'Mantenedores\MantenedorDeUsuarios@actualizar')->name('actualizarUsuario');
    Route::post('actualizarUsuario/{id}',   'Mantenedores\MantenedorDeUsuarios@accionActializarUsuario')->name('actualizarUsuario');
    Route::get('/restablecerContrasenia/{id}',   'Mantenedores\MantenedorDeUsuarios@restablecerContrasenia')->name('restablecerContrasenia');

    /* delete */
    Route::get('eliminarUsuario/{id}', 'Mantenedores\MantenedorDeUsuarios@eliminarUsuario')->name('eliminarUsuario');

    /* list */
    Route::get('/listarUsuario',    'Mantenedores\MantenedorDeUsuarios@listarTodos')->name('listarUsuario');
    Route::post('/listarUsuario',   'Mantenedores\MantenedorDeUsuarios@buscarUsuario');


    /* ver */
    Route::get('/verUsuario/{id}', 'Mantenedores\MantenedorDeUsuarios@verUsuario')->name('verUsuario');

    // CARGA EL COMBO CIUDAD CON EL ID DEL PAÍS
    Route::get('/cargaCiudadUsuario/{id}', 'Mantenedores\MantenedorDeUsuarios@cargaCiudadUsuario');
    Route::post('/cargaCiudadUsuario', 'Mantenedores\MantenedorDeUsuarios@cargaCiudadUsuario');

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
    
    /**********************************/    



    
});