@extends('layouts.admin')

@section('conteudo')
    <div class="row py-4">
        <div class="col-12">
            <h1>{{ isset($portfolio) ? 'Editar': 'Adicionar' }} projeto:</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 pb-4">
            <form class="admin-form" name="form-portfolio" data-success="/admin/portfolio/listar/success" method="post" enctype="multipart/form-data" action="/admin/portfolio/salvar">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @if(isset($portfolio))
                    <input type="hidden" name="id" value="{{ $portfolio->id }}">
                    <input type="hidden" id="imagem_nome" name="imagem_nome" value="{{ $portfolio->imagem }}">
                @endif

                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="nome">Título</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $portfolio->titulo or old('titulo') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="imagem">Imagem</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="imagem" id="imagem" value="{{ $portfolio->imagem or old('imagem') }}">
                            <label class="custom-file-label" for="imagem">{{ $portfolio->imagem or old('imagem') }}</label>
                        </div>
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="imagem_alt">Alt da imagem</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="imagem_alt" id="imagem_alt" value="{{ $portfolio->imagem_alt or old('imagem_alt') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="descricao">Descricão</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{{ $portfolio->descricao  or old('descricao') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="link">Link</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="link" id="link" value="{{ $portfolio->link  or old('link') }}">
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