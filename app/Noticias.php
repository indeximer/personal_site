<?php

namespace personal_site;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    public $timestamps = false;

    protected $fillable = array('titulo', 'autor', 'categoria', 'resumo', 'conteudo');
}
