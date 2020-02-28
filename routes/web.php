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

Route::get('/home', function () {
    return view('welcome');
});



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/aluno')->group(function(){
    Route::get('/', 'UsuariosController@mostrarViewAluno');
    Route::get('arquivo/downloads/{id}', 'CertificadosController@downloadCertificado')->name('DownloadCertificado-Aluno');
    Route::post('certificado/inserir', 'CertificadosController@store')->name('InserirCertificado');
    Route::match(['get', 'put'], 'certificado/editar', 'CertificadosController@update')->name('EditarCertificado');
    Route::delete('certificado/excluir', 'CertificadosController@destroy')->name('ExcluirCertificado');  
    /* Rotas para requisições ajax */
    Route::get('certificado/detalhes/editar/{id}', 'CertificadosController@editarDetalhesCertificado');
    Route::get('certificado/delete/{id}', 'CertificadosController@ajaxCertificadoDelete');
});

Route::group(['prefix'=>'/professor'], function(){
    Route::get('/', 'UsuariosController@mostrarViewProfessor');
    Route::post('/certificado/avaliar', 'CertificadosController@avaliarCertificado')->name('AvaliarCertificado');
    Route::get('/arquivo/download/{id}', 'CertificadosController@downloadCertificado')->name('DownloadCertificado-Professor');
    /* Rota para requisição ajax */
    Route::get('/certificado/detalhes/avaliar/{id}', 'CertificadosController@avaliarDetalhesCertificado');
});