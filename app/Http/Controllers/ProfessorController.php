<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Model\Certificados;
use App\Model\Avaliacoes;
use Illuminate\Support\Facades\DB;
use Validation;
use Storage;
use Illuminate\Support\Facades\Auth;

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
        //dd($resultado);
        if(Route::){
            return view ('professor.home', compact('resultado'));
        }
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
    // public function store(Request $request)
    // {
    //     $validator = \Validator::make($request->all(), [
    //         'id_certificado' => 'required',
    //         'situacao' => 'required',
    //         'justificativa' => 'required',
    //     ]);

    //     if ($validator->fails())
    //     {
    //         return response()->json(['errors'=>$validator->errors()->all()]);
    //     }

    //     // $request->validate([
    //     //     'id_certificado' => 'required',
    //     //     'situacao' => 'required',
    //     //     'justificativa' => 'required',
    //     // ]);

    //     $post = new Avaliacoes();
    //     $post->certificado_id = $request->id_certificado;
    //     $post->situacao = $request->situacao;
    //     $post->justificativa = $request->justificativa;
    //     $post->user_id = 1;
    //     $post->save();

    //     if($post){
    //         return redirect('/professor')->with('sucesso','Certificado avaliado com sucesso!');
    //     }else {
    //         return redirect('/professor')->with('erro','Não foi possível avaliar o certificado. Por favor tente novamente');
    //     }

    //     //return redirect()->back()->with('mensagem', $msg);

    // }

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
        $exibir = Certificados::all();
        return $exibir;
    }

    /* Função para mostrar detalhes dos certificados para serem avaliados 
     * Envia o resultado da consulta para a função ajax "enviaDadosViewProfessor" que esta no arquivo
     * "public/js/lista_dados.js"
    */
    // public function avaliarDetalhesCertificado($id)
    // {
    //     $consulta = DB::table('certificados')->SELECT('id_certificado', 'tipo', 'inicio', 'termino', 'carga_horaria')->where('id_certificado', $id)->first();
    //     return response()->json($consulta);
    // }

    
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
    public function update(Request $request)
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
