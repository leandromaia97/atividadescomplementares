<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Certificados;
use App\Model\Avaliacoes;
use Illuminate\Support\Facades\DB;
use Validation;
use Storage;

class CertificadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

            if($post_certificado){
                return redirect('/aluno')->with('sucesso', 'O certificado foi enviado com sucesso');
            }else{
                return redirect('/aluno')->with('erro', 'Ocorreu um erro ao tentar enviar seu certificado. Por favor tente novamente');
            }
        }
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
    public function update(Request $request)
    {
        $request->validate([
            'id_certificado' => 'required',
            'tipo' => 'required',
            'inicio' => 'required',
            'termino' => 'required',
            'cargahoraria' => 'required',
        ]);

        $id_user_auth = 1; //Auth::user()->id;
        //dd($id_user_auth);
        $id_user_certificado = Certificados::pluck('user_id')->first();
        //dd($id_user_certificado);

        if($id_user_auth == $id_user_certificado){

            $post = Certificados::findOrFail($request->id_certificado);
            $post->tipo = $request->tipo;
            $post->inicio = $request->inicio;
            $post->termino = $request->termino;
            $post->carga_horaria = $request->cargahoraria;
            $post->save();

            return redirect('/aluno')->with('sucesso','As informações do certificado foram alteradas com sucesso');

        }else{
            return redirect('/aluno')->with('erro','Você não tem permissão para editar este certificado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id_certificado_excluir' => 'required',
        ]);

        //$id_user = Auth::user()->id;
        $post = $request->id_certificado_excluir;
        $post = Certificados::where('user_id', 1)->where('id_certificado', $post)->delete();

        if($post){
            return redirect('/aluno')->with('sucesso', 'O certificado foi excluido com sucesso');
        }else{
            return redirect('/aluno')->with('erro', 'Ocorreu um erro ao tentar excluir o certificado. Por favor tente novamente');
        }
    }

    public function editarDetalhesCertificado($id)
    {
        $consulta = DB::table('certificados')->SELECT('id_certificado', 'tipo', 'inicio', 'termino', 'carga_horaria')->where('id_certificado', $id)->first();
        return response()->json($consulta);
    }

    /* Função para mostrar detalhes dos certificados para serem excluidos
     * Envia o resultado da consulta para a função ajax "excluirCertificado" que esta no arquivo
     * "public/js/lista_dados.js"
    */
    public function ajaxCertificadoDelete($id)
    {
        $certificado_delete = DB::table('certificados')->SELECT('id_certificado', 'nome_certificado')->where('id_certificado', $id)->first();
        return response()->json($certificado_delete);
    }

    public function avaliarDetalhesCertificado($id)
    {
        $consulta = DB::table('certificados')->SELECT('id_certificado', 'tipo', 'inicio', 'termino', 'carga_horaria')->where('id_certificado', $id)->first();
        return response()->json($consulta);
    }

    /* Função para fazer o download do certificado */
    public function downloadCertificado($id)
    {
        
        $id_user = 3; //Auth::user()->id;
        //dd($id_user);
        
        $certificado = Certificados::find($id)->first();
      

        if($id_user == $certificado->user_id){

            $arquivo = Certificados::where('id_certificado', $id)->first();

            if(isset($arquivo)) {
                $nome_certificado = $arquivo->nome_certificado;
                $path = $arquivo->path_certificado;
                return response()->download('storage/' . $path, $nome_certificado);
            }else{
                return redirect()->back()->with('erro', 'Não foi possivel encontrar o certificado solicitado. Por favor tente novamente');
            }
        }else{
            return redirect()->back()->with('erro', 'Você não tem permissão para fazer o download deste arquivo');
        }

    }

    public function avaliarCertificado(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id_certificado' => 'required',
            'situacao' => 'required',
            'justificativa' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        // $request->validate([
        //     'id_certificado' => 'required',
        //     'situacao' => 'required',
        //     'justificativa' => 'required',
        // ]);

        $post = new Avaliacoes();
        $post->certificado_id = $request->id_certificado;
        $post->situacao = $request->situacao;
        $post->justificativa = $request->justificativa;
        $post->user_id = 1;
        $post->save();

        if($post){
            return redirect('/professor')->with('sucesso','Certificado avaliado com sucesso!');
        }else {
            return redirect('/professor')->with('erro','Não foi possível avaliar o certificado. Por favor tente novamente');
        }

        //return redirect()->back()->with('mensagem', $msg);

    }

}
