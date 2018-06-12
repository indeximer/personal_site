@extends('layouts.admin')

@section('conteudo')
    <div class="row py-4">
        <div class="col-12">
            <h1>Portfólio:</h1>

            <a href="/admin/portfolio/criar" class="btn btn-sm btn-success"><i class="oi oi-plus"></i> Adicionar projeto</a>

            @if(isset($success))
                <p class="mt-3 alert alert-success">Projeto salvo com sucesso.</p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if($portfolio->isEmpty())
                <div class="row">
                    <div class="col-12">
                        <p class="alert alert-danger">Nenhum projeto encontrado.</p>
                    </div>
                </div>
            @else
                <ul class="list-group list-admin justify-content-between">
                    @foreach($portfolio as $projeto)
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="col p-0">{{ $projeto->titulo }}</div>
                            
                            <div class="col-auto p-0">
                                <a href="/admin/portfolio/criar/{{ $projeto->id }}" class="badge badge-primary badge-pill ml-1" title="Editar"><i class="oi oi-pencil"></i></a>
                                <a href="/admin/portfolio/remover/{{ $projeto->id }}" class="badge badge-danger badge-pill ml-1" title="Excluir"><i class="oi oi-trash"></i></a>
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@stop