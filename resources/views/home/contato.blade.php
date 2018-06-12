<!-- Contact Section -->
<section id="contact">
    <div class="container">
    <h2 class="text-center text-uppercase text-secondary mb-0">Entre em contato</h2>
    <hr class="star-dark mb-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <form name="formContato" class="formContato" id="formContato" method="post" action="admin/mensagens/enviar">
                <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <label>Nome</label>
                    <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome">
                    <p class="help-block text-danger erros"></p>
                </div>
                </div>
                <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <label>E-mail</label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="E-mail">
                    <p class="help-block text-danger erros"></p>
                </div>
                </div>
                <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <label>Telefone</label>
                    <input class="form-control" id="telefone" name="telefone" type="tel" placeholder="Telefone">
                    <p class="help-block text-danger erros"></p>
                </div>
                </div>
                <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <label>Mensagem</label>
                    <textarea class="form-control" id="mensagem" name="mensagem" rows="5" placeholder="Mensagem"></textarea>
                    <p class="help-block text-danger erros"></p>
                </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <p class="alert alert-success" id="success-mensagem">Sua mensagem foi enviado com sucesso, em breve entrarei em contato com você.</p>
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-xl" id="enviarContato">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>