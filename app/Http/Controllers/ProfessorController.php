<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Certificados;
use Illuminate\Support\Facades\DB;
use Validation;
use Storage;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultado = $this->mostrarCertificado();
        return view ('professor.home', compact('resultado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /* 
     * Função para mostrar o aluno os certificados o total e o minino de horas complementares na tela
     * para o professor
     */
    public function mostrarCertificado()
    {
        $exibir = DB::table('certificados')->SELECT('nome_certificado', 'tipo', 'inicio',
        'termino', 'carga_horaria', 'total_horas_complementares', 'minimo_horas_complementares')->get();

        return $exibir;
    }

    /* Função para fazer o download do certificado */
    public function baixarArquivo($id)
    {
        //$download = File::find($id);
        //return Storage::download($download->path, $download->title);
        return Storage::download($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
