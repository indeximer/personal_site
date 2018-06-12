<?php

namespace personal_site;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';

    protected $fillable = array('titulo', 'imagem', 'imagem_alt', 'descricao', 'link');

    public function salvar(){

        $id = request()->input('id');
        $path = public_path('storage/uploads/portfolio');

        $rules = [
            'titulo' => 'required|max:255',
            'imagem_alt' => 'required|max:255',
            'descricao' => 'required|max:255',
            'link' => 'required|max:255',
        ];

        $errorMessages = [
            'required' => 'O campo :attribute é obrigatório.',
            'image' => 'O arquivo deve ser uma imagem.',
            'mimes' => 'A imagem deve ter a extenção jpeg, png, jpg, gif ou svg.',
            'max' => 'O campo :attribute aceita o máximo de 255 caracteres.'
        ];

        if($id != null){
            $portfolio = Portfolio::find($id);
            if($portfolio->imagem != request()->input('imagem_nome')){
                $rules = array_add($rules, 'imagem' , 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048');
            }
            
            $params = request()->validate($rules, $errorMessages);
            $params = request()->all();

            $portfolio->titulo = $params['titulo'];
            $portfolio->imagem_alt = $params['imagem_alt'];
            $portfolio->descricao = $params['descricao'];
            $portfolio->link = $params['link'];

            if($portfolio->imagem != request()->input('imagem_nome')){
                $portfolio->imagem = $this->imgUpload('imagem',$path);
            }

        }else{
            $rules = array_add($rules, 'imagem' , 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048');
            $params = request()->validate($rules, $errorMessages);
            $params = request()->all();

            $imagem = $this->imgUpload('imagem',$path);
            $params['imagem'] = $imagem;

            $portfolio = new Portfolio($params);
        }

        $portfolio->save();
    }

    public function imgUpload($img_input, $path){
        $nome_imagem = time().'_'.request()->file($img_input)->getClientOriginalName();
        request()->file($img_input)->move($path, $nome_imagem);

        return $nome_imagem;
    }
}
