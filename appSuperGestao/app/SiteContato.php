<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Site_Contato_Teste
//site_contato_teste
//site_contato_testes

class SiteContato extends Model
{
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];
}
