<?php

namespace personal_site;

use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    protected $table = 'bio';

    protected $fillable = array('titulo', 'descricao');

    public function salvar(){

        $id = request()->input('id');

        $rules = [
            'titulo' => 'required|max:255',
            'descricao' => 'required'
        ];

        $errorMessages = [
            'required' => 'O campo :attribute é obrigatório.',
            'max' => 'O campo :attribute aceita o máximo de 255 caracteres.'
        ];

        $params = request()->validate($rules, $errorMessages);
        $params = request()->all();

        if($id != null){
            $bio = Bio::find($id);

            $bio->titulo = $params['titulo'];
            $bio->descricao = $params['descricao'];

        }else{
            $bio = new Bio($params);
        }

        $bio->save();
    }
}
