<!-- View do Professor -->
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <nav class="navbar navbar-light bg-light">
                        <div class="navbar-brand">Certificados</div>
                        <form class="form-inline">
                            <input class="form-control mr-sm-1" type="search" placeholder="Pesquisar" aria-label="Search">
                            <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </nav>

                    <div class="table-responsive">
                        <table class="table table-hover border">
                            <thead>
                                <tr>
                                    <th scope="col">Aluno</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Ínicio</th>
                                    <th scope="col">Término</th>
                                    <th scope="col">Carga Horária</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resultado as $certificado)
                                <tr>
                                    <td></td>
                                    <td>{{$certificado->tipo}}</td>
                                    <td>{{$certificado->inicio}}</td>
                                    <td>{{$certificado->termino}}</td>
                                    <td>{{$certificado->carga_horaria}}<span>h</span></td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('DownloadCertificado(Professor)', $certificado->id_certificado) }}" role="button" class="btn btn-primary">Baixar</a>
                                        <button class="btn btn-success" type="button" id="abrir_modal" onclick="enviaDadosViewProfessor({{$certificado->id_certificado}})">Avaliar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if(Session('sucesso'))
                        <div class="alert alert-success text-center">
                            {{Session('sucesso')}}
                        </div>
                    @endif
                    @if(Session('erro'))
                        <div class="alert alert-danger">
                            {{Session('erro')}}
                        </div>
                    @endif
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#consultaraluno">Consultar Aluno</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Avaliar Certificado-->
    <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">  
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Avaliar Certificado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <form method="POST" action="{{ url('avaliar_certificado') }}">
                    @csrf
                        <input type="hidden" name="id_certificado" id="id_certificado">
                        <div class="form-group col-md-12">
                            <label for="tipo">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" readonly>
                        </div>
                        <div class="form-group col-md-12 row">
                            <div class="form-group col-md-6">
                                <label for="inicio">Ínicio</label>
                                <input type="date" class="form-control" id="inicio" name="inicio" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="termino">Término</label>
                                <input type="date" class="form-control" id="termino" name="termino" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cargahoraria">Carga Horária</label>
                                <div class="input-group">
                                    <input type="text" id="cargahoraria" name="cargahoraria" class="form-control col-md-6" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="cargahoraria">h</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="situacao">Situação</label>
                            <select id="situacao" class="form-control @error('situacao') is-invalid @enderror" name="situacao">
                                <option>Selecionar...</option>
                                <option value="Aprovado">Aprovado</option>
                                <option value="Reprovado">Reprovado</option>
                            </select>
                            @error('situacao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="justificativa">Justificativa</label>
                            <textarea class="form-control @error('justificativa') is-invalid @enderror" id="justificativa" name="justificativa" rows="3" placeholder="Escreva aqui sua justificativa para a situação do certificado do(a) aluno(a)."></textarea>
                            @error('justificativa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-success" id="ajaxSubmit">Salvar</button>
                        </div>                
                    </form> -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Teste -->
    <div class="modal fade" id="avaliar_certificado" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Avaliar Certificado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('avaliar_certificado') }}">
                    @csrf
                    <input type="hidden" name="id_certificado" id="id_certificado">
                    <div class="form-group col-md-12">
                        <label for="tipo">Tipo</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" readonly>
                    </div>
                    <div class="form-group col-md-12 row">
                        <div class="form-group col-md-6">
                            <label for="inicio">Ínicio</label>
                            <input type="date" class="form-control" id="inicio" name="inicio" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="termino">Término</label>
                            <input type="date" class="form-control" id="termino" name="termino" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cargahoraria">Carga Horária</label>
                            <div class="input-group">
                                <input type="text" id="cargahoraria" name="cargahoraria" class="form-control col-md-6" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="cargahoraria">h</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="situacao">Situação</label>
                        <select id="situacao" class="form-control @error('situacao') is-invalid @enderror" name="situacao">
                            <option disabled selected>Selecionar...</option>
                            <option value="Aprovado">Aprovado</option>
                            <option value="Reprovado">Reprovado</option>
                        </select>
                        @error('situacao')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="justificativa">Justificativa</label>
                        <textarea class="form-control @error('justificativa') is-invalid @enderror" id="justificativa" name="justificativa" rows="3" placeholder="Escreva aqui sua justificativa para a situação do certificado do(a) aluno(a)."></textarea>
                        @error('justificativa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="salva_dados">Salvar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal Consultar Aluno -->
    <div class="modal fade" id="consultaraluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Consultar Aluno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                    @csrf
                        <input type="hidden" name="certificado_id" id="certificado_id">
                        <div class="form-group col-md-11">
                            <div class="form-inline">
                                <input class="form-control mr-1" type="search" placeholder="Pesquisar" aria-label="Search">
                                <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="form-group col-md-11">
                            <label for="nomealuno">Nome do Aluno</label>
                            <input type="text" class="form-control" id="nomealuno" name="nomealuno" placeholder="nome do aluno" readonly>
                        </div>
                        <div class="col-md-12">
                            <label for="minimohoras">Minimo de Horas Complementares Para Aprovação</label>
                        </div>
                        <div class="form-group col-md-4 col-sm-5">
                            <div class="input-group">
                                <input type="text" id="minimohoras" name="minimohorascomplementares" class="form-control col-md-5" placeholder="00" aria-label="Carga Horária" aria-describedby="cargahoraria" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="minimohoras">h</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="totalhoras">Total de Horas Complementares</label>
                        </div>
                        <div class="form-group col-md-4 col-sm-5">
                            <div class="input-group">
                                <input type="text" id="totalhoras" name="totalhorascomplementares" class="form-control col-md-5" placeholder="00" aria-label="Total Horas Complementares" aria-describedby="totalhorascomplementares" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="totalhorascomplementares">h</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="situacaoaluno">Situação do Aluno</label>
                            <input type="text" class="form-control" id="situacaoaluno" name="situacaoaluno" placeholder="situação do aluno" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection