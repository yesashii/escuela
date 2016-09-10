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


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);




/*
 * Acá estan las rutas de los elementos de vistas de desarrollo.
 */

/*******************************/
/** MANTENEDOR DE USUARIOS   **/
/*****************************/

/* create */
//Route::get('/ingresarUsuario',  'Mantenedores\MantenedorDeUsuarios@ingresarUsuario')->name('ingresarUsuario');
//Route::post('/grabarUsuario',   'Mantenedores\MantenedorDeUsuarios@grabarUsuario');

/* update */
//Route::get('actualizarUsuario/{id}',    'Mantenedores\MantenedorDeUsuarios@actualizar')->name('actualizarUsuario');
//Route::post('actualizarUsuario/{id}',   'Mantenedores\MantenedorDeUsuarios@accionActializarUsuario')->name('actualizarUsuario');
//Route::get('/restablecerContrasenia/{id}',   'Mantenedores\MantenedorDeUsuarios@restablecerContrasenia')->name('restablecerContrasenia');

/* delete */
Route::get('eliminarUsuario/{id}', 'Mantenedores\MantenedorDeUsuarios@eliminarUsuario')->name('eliminarUsuario');

/* list */
//Route::get('/usuario',          'Mantenedores\MantenedorDeUsuarios@listarTodos')->name('listarUsuaios');
//Route::post('/buscarUsuario',   'Mantenedores\MantenedorDeUsuarios@buscarUsuario');


/* ver */
//Route::get('/verUsuario/{id}', 'Mantenedores\MantenedorDeUsuarios@verUsuario')->name('verUsuario');

/*******************************/




Route::post('/cargaCiudadUsuario', 'Mantenedores\MantenedorDeUsuarios@cargaCiudadUsuario');



// CARGA EL COMBO CIUDAD CON EL ID DEL PAÍS
Route::get('/cargaCiudadUsuario/{id}', 'Mantenedores\MantenedorDeUsuarios@cargaCiudadUsuario');






Route::get('activo', function () {
    return view('mantenedores_dev/activo');
});

/*
 * Acá estan las rutas de los elementos de vistas Oficiales.
 *
 *
 */
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


/* list */
Route::get('/listarUsuario',    'Mantenedores\MantenedorDeUsuarios@listarTodos')->name('listarUsuario');
Route::post('/listarUsuario',   'Mantenedores\MantenedorDeUsuarios@buscarUsuario');


/* ver */
    Route::get('/verUsuario/{id}', 'Mantenedores\MantenedorDeUsuarios@verUsuario')->name('verUsuario');

// CARGA EL COMBO CIUDAD CON EL ID DEL PAÍS
/*******************************/
});