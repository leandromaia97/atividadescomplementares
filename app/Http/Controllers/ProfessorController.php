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
        $exibir = Certificados::all();
        return $exibir;
    }

    public function verDados($id)
    {
        $consulta = DB::table('certificados')->SELECT('id_certificado', 'tipo', 'inicio', 'termino', 'carga_horaria')->where('id_certificado', $id)->first();
        return response()->json($consulta);
    }

    /* Função para fazer o download do certificado */
    public function download($id)
    {
        //$id_user = Auth::user()->id;
        $arquivo = Certificados::where('user_id', 1)->where('id_certificado', $id)->first();

       //dd($arquivo);

        if(isset($arquivo)) {
            $nome_certificado = $arquivo->nome_certificado;
            $path = $arquivo->path_certificado;
            return response()->download('storage/' . $path, $nome_certificado);
        }

        return redirect()->back()->with('erro', 'Não foi possivel encontrar o certificado solicitado');
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
            'situacao' => 'required',
            'justificativa' => 'required',
        ]);

        $msg = "Não foi possível avaliar o certificado. Por favor tente novamente";

            $post = Avaliacoes::findOrFail($request->certificado_id);
            $post->situacao = $request->situacao;
            $post->justificativa = $request->justificativa;
            $post->save();

            dd($post);
            
            if($post){
                return redirect('/professor')->with('mensagem','Certificado avaliado com sucesso!');
            }
        return redirect()->back()->with('mensagem', $msg);
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
