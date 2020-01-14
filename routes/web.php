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



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/aluno', 'AlunoController@index')->name('AlunoHome');
Route::get('/teste', 'AlunoController@ModalEditar')->name('EditarCertificado');
Route::get('/professor', 'ProfessorController@index')->name('ProfessorHome');

//Rotas para salvar dados
Route::post('inserircertificado', 'AlunoController@store')->name('InserirCertificado');

//Rota oara download dos certificados
Route::get('/arquivo/download/{id}', 'ProfessorController@download')->name('DownloadCertificado');
Route::get('/arquivo/download_aluno/{id}', 'AlunoController@download')->name('BaixarCertificado');