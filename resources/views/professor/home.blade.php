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
                                    <th scope="col">Status</th>
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
                                    <td><i class="far fa-clock"></i> 40h</td>
                                    <td>Não avaliado</td>
                                    <td>
                                        <button type="button" class="btn btn-primary">Baixar</button>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Avaliar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Avaliar Certificado-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <span class="input-group-text" id="cargahoraria">Horas</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select id="status" class="form-control" name="status">
                                <option>Aprovado</option>
                                <option>Reprovado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="motivo">Motivo</label>
                            <textarea class="form-control" id="motivo" name="motivo" rows="3"></textarea>
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
</div>
@endsection