@extends('layouts.admin')

@section('conteudo')
    <div class="row py-4">
        <div class="col-12">
            <h1>Configurações gerais:</h1>

            <a href="/admin/config/criar" class="btn btn-sm btn-success"><i class="oi oi-plus"></i> Adicionar Configuração</a>

            @if(isset($success))
                <p class="mt-3 alert alert-success">Configurações salvas com sucesso</p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if($config->isEmpty())
                <div class="row">
                    <div class="col-12">
                        <p class="alert alert-danger">Nenhuma configuração encontrada.</p>
                    </div>
                </div>
            @else
                <ul class="list-group list-admin justify-content-between">
                    @foreach($config as $con)
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="col p-0">{{ $con->nome }}</div>
                            
                            <div class="col-auto p-0">
                                <a href="/admin/config/criar/{{ $con->id }}" class="badge badge-primary badge-pill ml-1" title="Editar"><i class="oi oi-pencil"></i></a>
                                <a href="/admin/config/remover/{{ $con->id }}" class="badge badge-danger badge-pill ml-1" title="Excluir"><i class="oi oi-trash"></i></a>
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@stop