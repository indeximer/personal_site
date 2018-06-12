<?php

namespace personal_site;

use Illuminate\Database\Eloquent\Model;

class Mensagens extends Model
{
    protected $table = 'mensagens';

    protected $fillable = array('nome', 'email', 'telefone','mensagem');

    public function salvar(){

        $id = request()->input('id');

        $rules = [
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'nullable|min:13|max:14',
            'mensagem' => 'required'
        ];

        $errorMessages = [
            'required' => 'O campo :attribute é obrigatório.',
            'max' => 'O campo :attribute aceita o máximo de 255 caracteres.',
            'telefone.max' => 'O campo :attribute aceita o máximo de 14 caracteres.',
            'telefone.min' => 'O campo :attribute aceita o mínimo de 13 caracteres.'
            
        ];

        $params = request()->validate($rules, $errorMessages);
        $params = request()->all();

        if($id != null){
            $mensagem = Mensagens::find($id);

            $mensagem->nome = $params['nome'];
            $mensagem->email = $params['email'];
            $mensagem->telefone = $params['telefone'];
            $mensagem->mensagem = $params['mensagem'];

        }else{
            $mensagem = new Mensagens($params);
        }

        $mensagem->save();

        return true;
    }
}
