@extends('layouts.admin')

@section('conteudo')
    <div class="row py-4">
        <div class="col-12">
            <h1>Bio:</h1>

            <a href="/admin/bio/criar" class="btn btn-sm btn-success"><i class="oi oi-plus"></i> Adicionar Bio</a>

            @if(isset($success))
                <p class="mt-3 alert alert-success">Bio salva com sucesso.</p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if($bio->isEmpty())
                <div class="row">
                    <div class="col-12">
                        <p class="alert alert-danger">Nenhuma Bio encontrada.</p>
                    </div>
                </div>
            @else
                <ul class="list-group list-admin justify-content-between">
                    @foreach($bio as $bio)
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="col p-0">{{ $bio->titulo }}</div>
                            
                            <div class="col-auto p-0">
                                <a href="/admin/bio/criar/{{ $bio->id }}" class="badge badge-primary badge-pill ml-1" title="Editar"><i class="oi oi-pencil"></i></a>
                                <a href="/admin/bio/remover/{{ $bio->id }}" class="badge badge-danger badge-pill ml-1" title="Excluir"><i class="oi oi-trash"></i></a>
                            </span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@stop