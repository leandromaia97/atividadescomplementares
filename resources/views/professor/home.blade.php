@extends('layouts.app')
@section('content')
<div class="container">
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
                                <tr>
                                    <td>Leandro</td>
                                    <td>Curso de Programação</td>
                                    <td>Atividade Complementar</td>
                                    <td><i class="far fa-calendar-alt"></i> 17/12/2019</td>
                                    <td><i class="far fa-calendar-alt"></i> 18/12/2019</td>
                                    <td><i class="far fa-clock"></i> 40<span>h</span></td>
                                    <td>Não avaliado</td>
                                    <td>
                                        <button type="button" class="btn btn-primary">Baixar</button>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#avaliarcertificado">Avaliar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#consultaraluno">Consultar Aluno</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Avaliar Certificado-->
    <div class="modal fade" id="avaliarcertificado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Avaliar Certificado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group col-md-12">
                            <label for="nomecertificado">Certificado</label>
                            <input type="text" class="form-control" id="nomecertificado" name="nomecertificado" placeholder="nome do certificado" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="tipo">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="tipo" readonly>
                        </div>
                        <div class="form-group col-md-4 col-sm-5">
                            <label for="cargahoraria">Carga Horária</label>
                            <div class="input-group">
                                <input type="text" id="cargahoraria" name="cargahoraria" class="form-control" placeholder="00" aria-label="Carga Horária" aria-describedby="cargahoraria" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="cargahoraria">h</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="situacao">Situação</label>
                            <select id="situacao" class="form-control" name="situacao">
                                <option value="Aprovado">Aprovado</option>
                                <option value="Reprovado">Reprovado</option>
                                <option value="Em análise">Em análise</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="justificativa">Justificativa</label>
                            <textarea class="form-control" id="justificativa" name="justificativa" rows="3" placeholder="Escreva aqui sua justificativa para a situação do certificado do(a) aluno(a)."></textarea>
                        </div>                 
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success">Salvar</button>
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
                    <form method="" action="">
                    @csrf
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
                            <label for="totalhoras">Total de Horas Complementares</label>
                        </div>
                        <div class="form-group col-md-3 col-sm-5">
                            <div class="input-group">
                                <input type="text" id="totalhoras" name="totalhorascomplementares" class="form-control" placeholder="00" aria-label="Total Horas Complementares" aria-describedby="totalhorascomplementares" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="totalhorascomplementares">h</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="minimohoras">Minimo de horas para aprovação</label>
                        </div>
                        <div class="form-group col-md-3 col-sm-5">
                            <div class="input-group">
                                <input type="text" id="minimohoras" name="minimohorascomplementares" class="form-control" placeholder="00" aria-label="Carga Horária" aria-describedby="cargahoraria" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="minimohoras">h</span>
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