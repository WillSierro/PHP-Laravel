<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        /*
        $contato = new SiteContato();
        $contato->nome = 'contato 1';
        $contato->telefone = '(11) 97387-2045';
        $contato->email = 'contato@contato1.com.br';
        $contato->motivoContato = 1;
        $contato->mensagem = 'Seja bem-vindo ao App Super Gestão';
        $contato->save();
        */
        factory(SiteContato::class, 100)->create();
    }
}
