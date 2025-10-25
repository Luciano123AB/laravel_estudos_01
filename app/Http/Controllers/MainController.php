<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        echo "Index!";
    }
    
    public function about() {
        echo "About!";
    }

    public function mostrarValor($valor) {
        echo "Valor enviado pela rota: $valor";
    }

    public function mostrarValores($valor01, $valor02) {
        echo "Valores enviados pela rota: $valor01 e $valor02";
    }

    public function mostrarValores02(Request $request, $valor01, $valor02) {
        echo "Valores enviados pela rota: $valor01 e $valor02";
    }

    public function mostrarValorOpcional($valor = null) {
        echo "Valor opcional: $valor";
    }
    
    public function mostrarValorOpcional02($valor01, $valor02 = 100) {
        echo "Valor obr/opcional: $valor01 e $valor02";
    }

    public function mostrarPosts($user_id, $post_id) {
        echo "Posts do usuário ID: $user_id e post com ID: $post_id";
    }
}
