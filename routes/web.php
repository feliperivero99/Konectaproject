<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return redirect()->route('login');
});

/*Rutas de inicio de sesion */
Route::get('/', 'loginController@index')->name('login');

Route::match(['get', 'post'], '/login', 'loginController@login')->name('loginrequest');

/*Solo usuarios logueados pueden acceder a estas rutas */

Route::group(['middleware' => ['userLogged']], function () {

    /*Rutas de dasboard */

    Route::match(['get', 'post'], '/logout', 'loginController@logout')->name('logout');

    Route::match(['get', 'post'], '/dashadmin', 'dashAdminController@index')->name('dashadmin');

    Route::match(['get', 'post'], '/dashvende', 'dashVendeController@index')->name('dashvende');

/*Rutas de usuarios */

    Route::match(['get', 'post'], '/Usuarios/{aviso?}', 'UserController@index')->name('usuarios');

    Route::match(['get', 'post'], '/Usuarios-search', 'UserController@searchUsers')->name('usuariossearch');

    Route::match(['get', 'post'], '/Usuarios-create', 'UserController@createuser')->name('usuarioscreate');

    Route::match(['get', 'post'], '/Usuarios-edit/{id}', 'UserController@editUser')->name('usuariosedit');

    Route::match(['get', 'post'], '/Usuarios-delete', 'UserController@deletetUser')->name('usuariosdelete');

/*Rutas de clientes */

    Route::match(['get', 'post'], '/Clientes/{aviso?}', 'clientController@index')->name('clientes');

    Route::match(['get', 'post'], '/Clientes-search', 'clientController@searchClient')->name('clientesearch');

    Route::match(['get', 'post'], '/Clientes-create', 'clientController@createclient')->name('clientecreate');

    Route::match(['get', 'post'], '/Clientes-edit/{id}', 'clientController@editCliente')->name('clientesdit');

    Route::match(['get', 'post'], '/Clientes-delete', 'clientController@deletetClient')->name('clientdelete');

}); //
