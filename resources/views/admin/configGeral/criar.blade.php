@extends('layouts.admin')

@section('conteudo')
    <div class="row py-4">
        <div class="col-12">
            <h1>{{ isset($config) ? 'Editar': 'Adicionar' }} configurações:</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 pb-4">
            <form class="admin-form" name="form-config" data-success="/admin/config/listar/success" method="post" enctype="multipart/form-data" action="/admin/config/salvar">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @if(isset($config))
                    <input type="hidden" name="id" value="{{ $config->id }}">
                    <input type="hidden" id="logo_img_nome" name="logo_img_nome" value="{{ $config->logo_img }}">
                    <input type="hidden" id="avatar_img_nome" name="avatar_img_nome" value="{{ $config->avatar_img }}">
                @endif

                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="nome">Nome</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ $config->nome or old('nome') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="slogan">Slogan</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="slogan" id="slogan" value="{{ $config->slogan or old('slogan')}}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="logo_img">Imagem do logo</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo_img" id="logo_img" value="{{ $config->logo_img or old('logo_img') }}">
                            <label class="custom-file-label" for="logo_img">{{ $config->logo_img or old('logo_img') }}</label>
                        </div>
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="logo_alt">Alt do logo</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="logo_alt" id="logo_alt" value="{{ $config->logo_alt or old('logo_alt') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="avatar_img">Imagem do avatar</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="avatar_img" id="avatar_img" value="{{ $config->avatar_img or old('avatar_img') }}">
                            <label class="custom-file-label" for="avatar_img">{{ $config->avatar_img  or old('avatar_img'), 'Selecione uma imagem' }}</label>
                        </div>
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="avatar_alt">Alt do avatar</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="avatar_alt" id="avatar_alt" value="{{ $config->avatar_alt  or old('avatar_alt') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="email">E-mail</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="email" id="email" value="{{ $config->email  or old('email') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="ddd">DDD</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="ddd" id="ddd" value="{{ $config->ddd  or old('ddd') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="telefone">Telefone</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="telefone" id="telefone" value="{{ $config->telefone  or old('telefone') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="facebook">Facebook</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $config->facebook  or old('facebook') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="linkedin">Linkedin</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{ $config->linkedin  or old('linkedin') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="endereco">Endereço</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="endereco" id="endereco" value="{{ $config->endereco  or old('endereco') }}">
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