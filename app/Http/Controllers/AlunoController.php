<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Certificados;
use Illuminate\Support\Facades\DB;
use Validation;
use Storage;

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
        $request->validate([
            'anexararquivo' => 'required|mimes:pdf,doc,docx,jpeg,jpg,png',
            'nomecertificado' => 'required',
            'tipo' => 'required',
            'inicio' => 'required',
            'termino' => 'required',
            'cargahoraria' => 'required',
        ]);

        $msg = "Não foi possível enviar o certificado. Por favor tente novamente";

        if($request->file('anexararquivo')->isValid()){

            $ext = $request->file('anexararquivo')->getClientOriginalExtension();

            $certificado = new Certificados();

            $certificado->url = $request->file('anexararquivo')->storeAs('certificados','atividadecomplementar.'.$ext,'local');
            $certificado->nome_certificado = $request->nomecertificado;
            $certificado->tipo = $request->tipo;
            $certificado->inicio = $request->inicio;
            $certificado->termino = $request->termino;
            $certificado->carga_horaria = $request->cargahoraria;
            
            $certificado->save();

            $msg = "O certificado foi enviado com sucesso";
        }

        return redirect()->back()->with('mensagem',$msg);
        
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
