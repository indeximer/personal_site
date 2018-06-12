@extends('layouts.admin')

@section('conteudo')
    <div class="row py-4">
        <div class="col-12">
            <h1>{{ isset($mensagem) ? 'Editar': 'Adicionar' }} projeto:</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 pb-4">
            <form class="admin-form" name="form-mensagem" data-success="/admin/mensagens/listar/success" method="post" enctype="multipart/form-data" action="/admin/mensagens/salvar">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @if(isset($mensagem))
                    <input type="hidden" name="id" value="{{ $mensagem->id }}">
                @endif

                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="nome">Nome</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ $mensagem->nome or old('nome') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="email">E-mail</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="email" id="email" value="{{ $mensagem->email or old('email') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="telefone">Telefone</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="telefone" id="telefone" value="{{ $mensagem->telefone or old('telefone') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="mensagem">Mensagem</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <textarea class="form-control" name="mensagem" id="mensagem">{{ $mensagem->mensagem  or old('mensagem') }}</textarea>
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12 col-xl-8">
                        <div class="progress mb-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-success float-right ml-5"><i class="oi oi-box"></i> Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop