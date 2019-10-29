<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErroController extends Controller
{
    public function naoEncontrado(){
        return response()->json([
            'mensagem' => 'O endpoint especificado não foi encontrado'
        ], 404);
    }
}
