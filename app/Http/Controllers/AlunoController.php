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
        $resultado = $this->mostrarCertificado();
        return view ('aluno.home', compact('resultado'));
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
            'arquivo' => 'required|mimes:pdf,doc,docx,jpeg,jpg,png',
            'tipo' => 'required',
            'inicio' => 'required',
            'termino' => 'required',
            'cargahoraria' => 'required',
        ]);

        $msg = "Não foi possível enviar o certificado. Por favor tente novamente";

        if($request->file('arquivo')->isValid()){

            $path_certificados = $request->file('arquivo')->store('certificados', 'public');
            $file = $request->file('arquivo');

            $post_certificado = new Certificados();
            $post_certificado->path_certificado = $path_certificados; //Salva o caminho do arquivo
            $post_certificado->nome_certificado = $file->getClientOriginalName(); //Salva o nome do arquivo
            $post_certificado->tipo = $request->tipo;
            $post_certificado->inicio = $request->inicio;
            $post_certificado->termino = $request->termino;
            $post_certificado->carga_horaria = $request->cargahoraria;
            $post_certificado->user_id = 1;

            $post_certificado->save();
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

    /* Função para mostrar os certificados o total e o minino de horas complementares na tela para o aluno */
    public function mostrarCertificado()
    {
        $exibir = DB::table('certificados')->SELECT('nome_certificado', 'tipo', 'inicio',
        'termino', 'carga_horaria', 'total_horas_complementares', 'minimo_horas_complementares')->get();

        return $exibir;

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
