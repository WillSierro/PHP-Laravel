<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $a, int $b) {
        // echo "A soma de $a + $b = ".($a+$b);
        // return view('site.teste', ['a' => $a, 'b' => $b]); //array associativo
        // return view('site.teste', compact('a', 'b')); //compact
        return view('site.teste')->with('a', $a)->with('b', $b); //compact
        
    }
}
