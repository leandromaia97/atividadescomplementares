@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-0"></div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <nav class="navbar navbar-light bg-light">
                        <div class="navbar-brand">Meus Certificados</div>
                        <form class="form-inline">
                            <input class="form-control mr-1" type="search" placeholder="Pesquisar" aria-label="Search">
                            <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </nav>

                    <div class="table-responsive">
                        <table class="table table-hover border">
                            <thead>
                                <tr>
                                    <th scope="col">Certificado</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Ínicio</th>
                                    <th scope="col">Término</th>
                                    <th scope="col">Carga Horária</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Curso de Programação</td>
                                    <td>Atividade Complementar</td>
                                    <td><i class="far fa-calendar-alt"></i> 17/12/2019</td>
                                    <td><i class="far fa-calendar-alt"></i> 18/12/2019</td>
                                    <td><i class="far fa-clock"></i> 40h</td>
                                    <td>Em análise</td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarcertificado">Editar</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#excluircertificado">Excluir</button>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#">Detalhes</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group col-md-12">
                        <!-- <div id="donut_single" style="width: 900px; height: 500px;"></div> -->
                        <div>Total de Horas Complementares:</div>
                        <div>Minimo para aprovação:</div>
                    </div>
                    <div class="mx-auto">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inserircertificado">Inserir Certificado</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-0"></div>
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
                        <form>
                            <div class="form-group col-md-12">
                                <label for="editar_certificado">Certificado</label>
                                <input type="text" class="form-control" id="editar_certificado" name="nomecertificado" placeholder="Digite o nome do certificado">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="editar_tipo">Tipo</label>
                                <select class="form-control" id="editar_tipo">
                                    <option selected>Selecionar...</option>
                                    <option value="Declaração de participação em eventos">Declaração de participação em eventos</option>
                                    <option value="Certificado de conclusão de curso de capacitação">Certificado de conclusão de curso de capacitação</option>
                                    <option value="Declaração de participação em amostra cultural">Declaração de participação em amostra cultural</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-5">
                                <label for="editar_cargahoraria">Carga Horária</label>
                                <div class="input-group">
                                    <input type="text" id="editar_cargahoraria" name="cargahoraria" class="form-control" placeholder="00" aria-label="Carga Horária" aria-describedby="cargahoraria">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="cargahoraria">Horas</span>
                                    </div>
                                </div>
                            </div>                        
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Salvar</button>
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
                        <form method="POST" action="{{route('InserirCertificado')}}">
                        @csrf
                            <div class="form-group col-md-12">
                                <label for="anexar_arquivo">Clique no botão "<b>Escolher arquivo</b>" para inserir seu Certificado</label>
                                <input type="file" class="form-control-file @error('anexar_arquivo') is-invalid @enderror" id="anexar_arquivo" name="anexararquivo">
                                @error('anexar_arquivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="certificado">Certificado</label>
                                <input type="text" class="form-control @error('certificado') is-invalid @enderror" id="certificado" name="nomecertificado" placeholder="Digite o nome do certificado">
                                @error('certificado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="tipo">Tipo</label>
                                <select class="form-control @error('tipo') is-invalid @enderror" name="tipo" id="tipo">
                                    <option selected>Selecionar...</option>
                                    <option value="Declaração de participação em eventos">Declaração de participação em eventos</option>
                                    <option value="Certificado de conclusão de curso de capacitação">Certificado de conclusão de curso de capacitação</option>
                                    <option value="Declaração de participação em amostra cultural">Declaração de participação em amostra cultural</option>
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
                                        <label for="certificado">Ínicio</label>
                                        <input type="date" class="form-control @error('inicio') is-invalid @enderror" id="inicio" name="inicio" placeholder="">
                                        @error('inicio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="certificado">Término</label>
                                        <input type="date" class="form-control @error('termino') is-invalid @enderror" id="termino" name="termino" placeholder="">
                                        @error('termino')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-sm-5">
                                <label for="cargahoraria">Carga Horária</label>
                                <div class="input-group">
                                    <input type="text" id="cargahoraria" name="cargahoraria" class="form-control @error('cargahoraria') is-invalid @enderror" placeholder="00" aria-label="Carga Horária" aria-describedby="cargahoraria">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="cargahoraria">Horas</span>
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
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>                       
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection