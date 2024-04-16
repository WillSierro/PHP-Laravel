<?php

namespace App\Http\Controllers;
use App\MotivoContato;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatosController extends Controller
{
    public function contatos(Request $request) {
        
        $motivoContatos = MotivoContato::all();

        /*$contato = new SiteContato();
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        echo '<br>';*/
        
        /*$contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivoContato = $request->input('motivoContato');
        $contato->mensagem = $request->input('mensagem');
        // print_r($contato->getAttributes());
        // dd($request->all());
        $contato->save();
        */

        /*$contato = new SiteContato();
        $contato->create($request->all());*/
        // $contato->save();
        // print_r($contato->getAttributes());
        
        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // print_r($contato->getAttributes());
        // $contato->save();
        
        /*
        $contato = new SiteContato();
        $contato->create($request->all());
        // print_r($contato->getAttributes());
        $contato->save();
        */


        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivoContatos'=>$motivoContatos]);
    }

    public function salvar(Request $request) {
        // realizar a validação dos dados do formulario recebidos no request
        $regras = [
            'nome'=>'required|min:3|max:40|unique:site_contatos', //nomes com min 3 e max 40 letra
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'max:1000'   
        ];

        $feedback = [
            // 'nome.required'=>'O campo nome precisa se Preenchido',
            'nome.min'=>'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max'=>'O campo nome precisa ter no maximo 40 caracteres',
            'nome.unique'=>'O nome informado já está em uso',
            // 'telefone.required'=>'O campo telefone precisa se Preenchido',
            'mensagem.max'=>'Sua mensagem deve conter no maximo 1000 caracteres',

            'required'=>'O campo :attribute deve ser preencido',
            'email'=>'Preencha um e-mail valido'
        ];
        
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
        // print_r($contato->getAttributes());
        // $contato->save();
    }
}
