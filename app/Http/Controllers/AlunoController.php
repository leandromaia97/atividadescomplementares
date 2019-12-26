<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Certificados;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('aluno.home');
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
        //dd($request);
        $validacao = $request->validate([
            'anexararquivo' => 'required',
            'nomecertificado' => 'required',
            'tipo' => 'required',
            'inicio' => 'required',
            'termino' => 'required',
            'cargahoraria' => 'required',
        ]);

        $certificado = new Certificados;

        $certificado->arquivo = $request->anexararquivo;
        $certificado->nome_certificado = $request->nomecertificado;
        $certificado->tipo = $request->tipo;
        $certificado->inicio = $request->inicio;
        $certificado->termino = $request->termino;
        $certificado->carga_horaria = $request->cargahoraria;
        
        $certificado->save();
        
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
