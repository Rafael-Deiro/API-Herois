<?php

namespace App\Http\Controllers;

use App\Heroi;
use Exception;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HeroisController extends Controller
{
    public function listar(){
        try {
            $herois = Heroi::query()->get();

            if ($herois->count() > 0)
                return response()->json([
                    'sucesso' => true,
                    'herois' => $herois
                ]);
            else
                throw new NotFound('Nenhum herói foi encontrado');
        }
        catch (NotFound $ex){
            return response()->json([
                'erro' => true,
                'tipo_erro' => 'Registros não encontrados',
                'mensagem_erro' => $ex->getMessage()
            ], 404);
        }
        catch (Exception $ex){
            return response()->json([
                'erro' => true,
                'tipo_erro' => 'Erro da aplicação',
                'mensagem_erro' => $ex->getMessage()
            ], 500);
        }
    }

    public function buscarPorId($id){
        try {
            $heroi = Heroi::query()->findOrFail($id);

            return response()->json([
                'sucesso' => true,
                'heroi' => $heroi
            ]);
        }
        catch (ModelNotFoundException $ex){
            return response()->json([
                'erro' => true,
                'tipo_erro' => 'Erro ao realizar busca no banco de dados',
                'mensagem_erro' => 'Id inválido: Nenhum herói foi encontrado'
            ], 404);
        }
        catch (Exception $ex){
            return response()->json([
                'erro' => true,
                'tipo_erro' => 'Erro da aplicação',
                'mensagem_erro' => $ex->getMessage()
            ], 500);
        }
    }

    public function buscarPorPoder($poder, $incluirSecundario = false){
        try {
            $herois = Heroi::query()->where('poder_principal', 'ilike', $poder);
            
            if ($incluirSecundario)
                $herois->orwhere('poder_secundario', 'ilike', $poder);

            $herois = $herois->get();

            if ($herois->count() > 0)
                return response()->json([
                    'sucesso' => true,
                    'herois' => $herois
                ]);
            else
                throw new NotFound('Nenhum herói possui esse poder');
        }
        catch (NotFound $ex){
            return response()->json([
                'erro' => true,
                'tipo_erro' => 'Registros não encontrados',
                'mensagem_erro' => $ex->getMessage()
            ], 404);
        }
        catch (Exception $ex){
            return response()->json([
                'erro' => true,
                'tipo_erro' => 'Erro da aplicação',
                'mensagem_erro' => $ex->getMessage()
            ], 500);
        }
    }

    public function atualizar(Request $request, $id){
        try {
            $heroi = Heroi::query()->findOrNew($id);
            $heroi->nome = $request->nome;
            $heroi->nome_real = $request->nome_real;
            $heroi->origem = $request->origem;
            $heroi->poder_principal = $request->poder_principal;
            $heroi->poder_secundario = $request->poder_secundario;
            $heroi->save();

            return response()->json([
                'sucesso' => true,
                'heroi_atualizado' => $request->input()
            ]);
        }
        catch(ModelNotFoundException $ex){
            return response()->json([
                'erro' => true,
                'tipo_erro' => 'Erro ao realizar busca no banco de dados',
                'mensagem_erro' => 'Id inválido: Nenhum herói foi encontrado'
            ], 404);
        }
        catch (Exception $ex){
            return response()->json([
                'erro' => true,
                'tipo_erro' => 'Erro da aplicação',
                'mensagem_erro' => $ex->getMessage()
            ], 500);
        }
    }

    public function criar(Request $request){
        try {
            $heroi = new Heroi();
            $heroi->nome = $request->nome;
            $heroi->nome_real = $request->nome_real;
            $heroi->origem = $request->origem;
            $heroi->poder_principal = $request->poder_principal;
            $heroi->poder_secundario = $request->poder_secundario;
            $heroi->save();

            return response()->json([
                'sucesso' => true,
                'novo_heroi' => $request->input()
            ]);
        }
        catch (Exception $ex){
            return response()->json([
                'erro' => true,
                'tipo_erro' => 'Erro da aplicação',
                'mensagem_erro' => $ex->getMessage()
            ], 500);
        }
    }

    public function remover($id){
        try {
            $removidos = Heroi::destroy($id);

            if ($removidos)
                return response()->json([
                    'sucesso' => true,
                    'herois_removidos' => $removidos
                ]);
            else
                throw new Exception("Nenhum herói foi removido");
        }
        catch (Exception $ex){
            return response()->json([
                'erro' => true,
                'tipo_erro' => 'Erro da aplicação',
                'mensagem_erro' => $ex->getMessage()
            ], 500);
        }
    }
}
