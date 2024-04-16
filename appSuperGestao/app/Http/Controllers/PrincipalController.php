<?php

namespace App\Http\Controllers;
use App\MotivoContato;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal() {
        $motivoContatos = MotivoContato::all();
        return view('site.principal', ['motivoContatos'=> $motivoContatos]);
    }
}
