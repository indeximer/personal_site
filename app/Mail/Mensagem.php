<?php

namespace personal_site\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use personal_site\Mensagens;

class Mensagem extends Mailable
{
    use Queueable, SerializesModels;

    public $mensagemConteudo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Mensagens $mensagem)
    {
        $this->mensagemConteudo = $mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mensagemConteudo->email)
                    ->subject($this->mensagemConteudo->nome . ' - Mensagem do site.')
                    ->markdown('emails.mensagens');
    }
}
