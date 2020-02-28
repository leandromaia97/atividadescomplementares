<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Certificados;
use App\Model\Avaliacoes;

class UsuariosController extends Controller
{
    public function mostrarViewAluno()
    {
        $exibir = $this->mostrarCertificado();
        $total_horas_complementares = $this->calcularHorasComplementares();
        return view('aluno.home', compact('exibir', 'total_horas_complementares'));
    }

    public function mostrarViewProfessor()
    {
        $exibir = $this->mostrarCertificado();
        return view('professor.home', compact('exibir'));
    }

    public function mostrarCertificado()
    {
        $exibir = Certificados::all();
        return $exibir;

    }

    public function calcularHorasComplementares()
    {
        $id_user_auth = 0; //Auth::user()->id;
        $user_id_certificado = Certificados::pluck('user_id')->first();
        $situacao = Avaliacoes::pluck('situacao')->implode(', ');
        //dd($situacao);
        // if($id_user_auth == $user_id_certificado && $situacao == 'Aprovado'){
        //     $soma = Certificados::sum('carga_horaria');
        // }

        $soma = Certificados::where('user_id', 1)->sum('carga_horaria');

        return $soma;

    }

}
