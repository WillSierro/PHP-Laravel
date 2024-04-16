<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existe!!!';
        };
        if($request->get('erro') == 2) {
            $erro = 'Necessário Login para ter acesso a este contéudo!!!';
        };
        return view('site.login', ['titulo'=>'login', 'erro'=> $erro]);
    }

    public function autenticar(Request $request){
        //regras de validação
        $regras = [
            'usuario'=>'email',
            'senha'=>'required'
        ];
        //as mensagens de feedback de validação
        $feedback =[
            'usuario.email'=>'O campo usuário(e-mail) é obrigatório!!',
            'senha.required'=>'o campo senha é obrigatório!!'
        ];

        $request->validate($regras, $feedback);
        // recuperando parametros do formulario
        $email =  $request->get('usuario');
        $password = $request->get('senha');
        
        // inicial o model user
        $user = new User();
        $usuario = $user->where('email', $email)
                    ->where('password', $password)
                    ->get()
                    ->first();
        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.cliente');
        } else {
            return redirect()->route('site.login', ['erro'=> 1]);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
