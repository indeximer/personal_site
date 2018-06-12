@extends('layouts.admin')

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'.tex-editor',
        plugins:'link',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
</script>

@section('conteudo')
    <div class="row py-4">
        <div class="col-12">
            <h1>{{ isset($bio) ? 'Editar': 'Adicionar' }} bio:</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 pb-4">
            <form class="admin-form" name="form-bio" method="post" enctype="multipart/form-data" action="/admin/mensagens/enviar">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                @if(isset($bio))
                    <input type="hidden" name="id" value="{{ $bio->id }}">
                @endif

                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="nome">Título</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $bio->titulo or old('titulo') }}">
                        <p class="alert alert-danger erros mt-2"></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12 col-lg-2 align-self-center" for="descricao">Descricão</label>
                    <div class="col-12 col-lg-10 col-xl-6">
                        <textarea class="form-control tex-editor" name="descricao" id="descricao">{{ $bio->descricao  or old('descricao') }}</textarea>
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