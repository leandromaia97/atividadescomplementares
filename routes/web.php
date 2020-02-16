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
//Route::get('/aluno', 'AlunoController@index')->name('AlunoHome');
//Route::get('/professor', 'ProfessorController@index')->name('ProfessorHome');

//Rotas para salvar dados
//Route::post('aluno/certificado/inserir', 'AlunoController@store')->name('InserirCertificado');
//Route::post('professor/certificado/avaliar', 'ProfessorController@store')->name('AvaliarCertificado');

//Rotas para editar certificado
//Route::match(['get', 'put'], 'aluno/certificado/editar', 'AlunoController@update')->name('EditarCertificado');

//Excluir certificado
//Route::delete('aluno/certificado/excluir', 'AlunoController@destroy')->name('ExcluirCertificado');

//Rota para download dos certificados
//Route::get('aluno/arquivo/download/{id}', 'AlunoController@downloadCertificado')->name('DownloadCertificado(Aluno)');
//Route::get('professor/arquivo/download/{id}', 'ProfessorController@downloadCertificado')->name('DownloadCertificado(Professor)');

//Rotas Ajax
//Route::get('aluno/certificado/detalhes/editar/{id}', 'AlunoController@editarDetalhesCertificado');
//Route::get('professor/certificado/detalhes/avaliar/{id}', 'ProfessorController@avaliarDetalhesCertificado');
//Route::get('aluno/certificado/delete/{id}', 'AlunoController@ajaxCertificadoDelete');

Route::group(['prefix'=>'aluno'], function(){
    Route::get('/', 'AlunoController@index')->name('AlunoHome');
    Route::post('/certificado/inserir', 'AlunoController@store')->name('InserirCertificado');
    Route::match(['get', 'put'], '/certificado/editar', 'AlunoController@update')->name('EditarCertificado');
    Route::delete('/certificado/excluir', 'AlunoController@destroy')->name('ExcluirCertificado');
    Route::get('/arquivo/download/{id}', 'AlunoController@downloadCertificado')->name('DownloadCertificado(Aluno)');
    /* Rotas para requisições ajax */
    Route::get('/certificado/detalhes/editar/{id}', 'AlunoController@editarDetalhesCertificado');
    Route::get('/certificado/delete/{id}', 'AlunoController@ajaxCertificadoDelete');
});

Route::group(['prefix'=>'professor'], function(){
    Route::get('/', 'ProfessorController@index')->name('ProfessorHome');
    Route::post('/certificado/avaliar', 'ProfessorController@store')->name('AvaliarCertificado');
    Route::get('/arquivo/download/{id}', 'ProfessorController@downloadCertificado')->name('DownloadCertificado(Professor)');
    /* Rota para requisição ajax */
    Route::get('/certificado/detalhes/avaliar/{id}', 'ProfessorController@avaliarDetalhesCertificado');
});