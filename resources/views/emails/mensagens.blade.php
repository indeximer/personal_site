@component('mail::message')

<p>Nome: {{ $mensagemConteudo->nome }}</p>
<p>Telefone: {{ $mensagemConteudo->telefone }}</p>

<p>{{ $mensagemConteudo->mensagem }}</p>

@endcomponent
