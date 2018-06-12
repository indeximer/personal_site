<?php

namespace personal_site;

use Illuminate\Database\Eloquent\Model;
use Request;

class ConfigGeral extends Model
{
    protected $table = 'config_geral';

    protected $fillable = array('nome', 'slogan', 'logo_img', 'logo_alt', 'avatar_img', 'avatar_alt', 'email','ddd','telefone','facebook','linkedin','endereco');

    public function salvar(){

        $id = request()->input('id');
        $logoImgNome = request()->input('logo_img_nome');
        $avatarImgNome = request()->input('avatar_img_nome');
        $path = public_path('storage/uploads/config');

        $rules = [
            'nome' => 'required|max:255',
            'logo_alt' => 'required|max:255',
            'avatar_alt' => 'required|max:255',
            'email' => 'required|email|max:255',
            'ddd' => 'required|digits:2',
            'telefone' => 'required|digits_between:8,9',
            'facebook' => 'required|max:255',
            'linkedin' => 'required|max:255',
            'endereco' => 'required|max:255',
        ];

        $errorMessages = [
            'required' => 'O campo :attribute é obrigatório.',
            'image' => 'O arquivo deve ser uma imagem.',
            'mimes' => 'A imagem deve ter a extenção jpeg, png, jpg, gif ou svg.',
            'max' => 'O campo :attribute aceita o máximo de 255 caracteres.'
        ];

        if($id != null){
            $config = ConfigGeral::find($id);
            if($config->logo_img != request()->input('logo_img_nome')){
                $rules = array_add($rules, 'logo_img' , 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048');
            }
            
            if($config->avatar_img != request()->input('avatar_img_nome')){
                $rules = array_add($rules, 'avatar_img' , 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048');
            }

            $params = request()->validate($rules, $errorMessages);
            $params = request()->all();

            $config->nome = $params['nome'];
            $config->slogan = $params['slogan'];
            $config->logo_alt = $params['logo_alt'];
            $config->avatar_alt = $params['avatar_alt'];
            $config->email = $params['email'];
            $config->ddd = $params['ddd'];
            $config->telefone = $params['telefone'];
            $config->facebook = $params['facebook'];
            $config->linkedin = $params['linkedin'];
            $config->endereco = $params['endereco'];

            if($config->logo_img != request()->input('logo_img_nome')){
                $config->logo_img = $this->imgUpload('logo_img',$path);
            }
            
            if($config->avatar_img != request()->input('avatar_img_nome')){
                $config->avatar_img = $this->imgUpload('avatar_img',$path);
            }

        }else{
            $rules = array_add($rules, 'logo_img' , 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048');
            $rules = array_add($rules, 'avatar_img' , 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048');
            $params = request()->validate($rules, $errorMessages);
            $params = request()->all();

            $imagem_logo = $this->imgUpload('logo_img',$path);
            $imagem_avatar = $this->imgUpload('avatar_img',$path);

            $params['logo_img'] = $imagem_logo;
            $params['avatar_img'] = $imagem_avatar;

            $config = new ConfigGeral($params);
        }

        $config->save();
    }

    public function imgUpload($img_input, $path){
        $nome_imagem = time().'_'.request()->file($img_input)->getClientOriginalName().'.'.request()->file($img_input)->getClientOriginalExtension();
        request()->file($img_input)->move($path, $nome_imagem);

        return $nome_imagem;
    }
}
