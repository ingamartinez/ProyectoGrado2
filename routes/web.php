<?php

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
    return view('welcome');
});


//Rutas de Login
Route::resource('log','LogController');


Route::get('logout','LogController@Logout');
Route::resource('pacientes','PacienteController');


Route::get('create-admin', function () {

    $admin = new \App\Model\Administrador();

    $admin->name="Cristian Matute";
    $admin->email="admin@admin.com";
    $admin->password= Hash::make('123');


    $admin->save();

    return 'Creado';
});

Route::group(['middleware' => 'auth:web_admins','prefix' => 'admin'], function () {
    Route::resource('dashboard','AdminController');

});
