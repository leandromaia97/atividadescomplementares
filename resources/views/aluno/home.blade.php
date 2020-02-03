@extends('layouts.app')
@section('content')
<div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <nav class="navbar navbar-light bg-light">
                        <div class="navbar-brand">Meus Certificados</div>
                        <form class="form-inline">
                            <input class="form-control mr-1" type="search" placeholder="Pesquisar" aria-label="Search">
                            <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </nav>

                    <div class="table-responsive" id="datatable">
                        <table class="table table-hover border">
                            <thead>
                                <tr>
                                    <th scope="col">Certificado</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Ínicio</th>
                                    <th scope="col">Término</th>
                                    <th scope="col">Carga Horária</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($resultado))
                                    <div class="alert alert-warning col-6 offset-3" role="alert">Você não enviou nenhum certificado ainda</div>
                                @else
                                
                                @foreach($resultado as $certificado)
                                <tr>
                                    <td>{{$certificado->nome_certificado}}</td>
                                    <td>{{$certificado->tipo}}</td>
                                    <td><i class="far fa-calendar-alt"></i> {{$certificado->inicio}}</td>
                                    <td><i class="far fa-calendar-alt"></i> {{$certificado->termino}}</td>
                                    <td><i class="far fa-clock"></i> {{$certificado->carga_horaria}}<span>h</span></td>
                                    <td></td>
                                    <td>
                                        <div class="btn-group-horizontal">
                                            <a role="button" class="btn btn-warning" onclick="enviaDados({{$certificado->id_certificado}})">Editar</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#excluircertificado">Excluir</button>
                                            <a href="{{ route('BaixarCertificado', $certificado->id_certificado) }}" role="button" class="btn btn-success">Baixar</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group col-md-12">
                        <!-- <div id="donut_single" style="width: 900px; height: 500px;"></div> -->
                        <div>Total de Horas Complementares:</div>
                        <div>Minimo para aprovação:</div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(Session('mensagem'))
                        <div class="alert alert-success text-center">
                            {{Session('mensagem')}}
                        </div>
                        @endif
                    </div>

                    <div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inserircertificado">Inserir Certificado</button>
                    </div>

                </div>
            </div>
    </div>

    <!-- Modal Editar Certificado -->
    <div class="modal fade" id="editarcertificado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Editar Certificado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('EditarCertificado') }}" id="formEditar">
                        @csrf
                        {{ method_field('PUT') }}
                            <input type="hidden" name="id_certificado" value="" id="id">
                            <div class="form-group col-md-12">
                                <label for="editar_tipo">Tipo</label>
                                <select class="form-control" name="tipo" id="editar_tipo">
                                    <option value="Declaração de Participação em Eventos">Declaração de Participação em Eventos</option>
                                    <option value="Certificado de Conclusão de Curso de Capacitação">Certificado de Conclusão de Curso de Capacitação</option>
                                    <option value="Declaração de Participação em Amostra Cultural">Declaração de Participação em Amostra Cultural</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="editar_inicio">Ínicio</label>
                                        <input type="date" class="form-control @error('inicio') is-invalid @enderror" id="editar_inicio" name="inicio" value="">
                                        @error('inicio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="editar_termino">Término</label>
                                        <input type="date" class="form-control @error('termino') is-invalid @enderror" id="editar_termino" name="termino" value="">
                                        @error('termino')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-sm-5">
                                <label for="editar_cargahoraria">Carga Horária</label>
                                <div class="input-group">
                                    <input type="number" id="editar_cargahoraria" name="cargahoraria" class="form-control" value="">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="cargahoraria">h</span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>                                
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Excluir Certificado -->
        <div class="modal" tabindex="-1" id="excluircertificado" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Excluir Certificado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja <b>excluir</b> este certificado?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <button type="button" class="btn btn-danger">Sim</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Inserir Certificado-->
        <div class="modal fade" id="inserircertificado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Inserir Certificado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('InserirCertificado') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group col-md-12">
                                <label for="arquivo">Clique no botão "<b>Escolher Arquivo</b>" para inserir seu Certificado</label>
                                <input type="file" class="form-control-file @error('arquivo') is-invalid @enderror" id="arquivo" name="arquivo">
                                @error('arquivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="tipo">Tipo</label>
                                <select class="form-control @error('tipo') is-invalid @enderror" name="tipo" id="tipo">
                                    <option>Selecionar...</option>
                                    <option value="Declaração de Participação em Eventos">Declaração de Participação em Eventos</option>
                                    <option value="Certificado de Conclusão de Curso de Capacitação">Certificado de Conclusão de Curso de Capacitação</option>
                                    <option value="Declaração de Participação em Amostra Cultural">Declaração de Participação em Amostra Cultural</option>
                                </select>
                                @error('tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inicio">Ínicio</label>
                                        <input type="date" class="form-control @error('inicio') is-invalid @enderror" id="inicio" name="inicio" placeholder="DD/MM/AAAA">
                                        @error('inicio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="termino">Término</label>
                                        <input type="date" class="form-control @error('termino') is-invalid @enderror" id="termino" name="termino" placeholder="DD/MM/AAAA">
                                        @error('termino')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-sm-5">
                                <label for="carga_horaria">Carga Horária</label>
                                <div class="input-group">
                                    <input type="number" id="carga_horaria" name="cargahoraria" class="form-control @error('cargahoraria') is-invalid @enderror" placeholder="00" aria-label="Carga Horária" aria-describedby="cargahoraria">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="cargahoraria">h</span>
                                    </div>
                                </div>
                                @error('cargahoraria')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>                       
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection