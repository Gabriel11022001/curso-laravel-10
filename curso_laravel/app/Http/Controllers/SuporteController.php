<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Suporte;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Ramsey\Uuid\v1;

class SuporteController extends Controller
{

    public function index() {
        // o método all retorna uma lista contendo todos os dados salvos na tabela a qual a entidade faz referência
        $suportes = Suporte::all()
            ->toArray();

        // dd($suportes);

        return view('suporte', [
            'suportes' => $suportes
        ]);
    }

    // método que redireciona o usuário para a tela para cadastrar uma nova solicitação de suporte
    public function cadastrarSuporte() {

        return view('cadastrar-suporte');
    }

    // método da controller que persiste um suporte no banco de dados
    public function salvarSuporte(Request $requisicao) {

        try {
            /**
             * a partir do objeto da classe Request eu posso pegar
             * os dados que vêm no corpo da requisição, também consigo obter
             * os dados enviados no cabeçalho da requisição
             */
            $suporte = new Suporte();
            $suporte->informacoes = $requisicao->informacoes;
            $suporte->mensagem = $requisicao->mensagem;
            $suporte->status = 'pendente';

            if ($suporte->save()) {

                return view('cadastrar-suporte', [ 'mensagem' => 'Solicitação de suporte cadastrada com sucesso!' ]);
            }

            return view('cadastrar-suporte', [ 'mensagem' => 'Ocorreu um erro ao tentar-se cadastrar a solicitação de suporte!' ]);
        } catch (Exception $e) {
            Log::error('Ocorreu o seguinte erro ao tentar-se cadastrar o suporte: ' . $e->getMessage());

            return view('cadastrar-suporte', [ 'mensagem' => 'Ocorreu um erro ao tentar-se cadastrar uma solicitação de suporte!' ]);
        }

    }

    public function redirecionarTelaEditarSuporte(int $id) {
        $suporte = Suporte::find($id);

        if (!$suporte) {

            return redirect()->route('suporte');
        }

        // dd($suporte->toArray());
        return view('editar-suporte', [
            'suporte' => $suporte->toArray()
        ]);
    }

    public function editarSuporte(Request $requisicao) {

        try {
            $suporte = Suporte::find($requisicao->id);
            $suporte->mensagem = $requisicao->mensagem;
            $suporte->informacoes = $requisicao->informacoes;
            $suporte->status = $requisicao->status;

            if ($suporte->save()) {

                return view('editar-suporte', [ 'mensagem' => 'Solicitação de suporte alterada com sucesso!', 'suporte' => $suporte->toArray() ]);
            } else {

                return view('editar-suporte', [ 'mensagem' => 'Ocorreu um erro ao tentar-se editar os dados da solicitação de suporte!', 'suporte' => $suporte->toArray() ]);
            }

        } catch (Exception $e) {
            Log::error(
                'Ocorreu o seguinte erro ao tentar-se editar os dados da solicitação de suporte: ' . $e->getMessage()
            );

            return view('editar-suporte', [
                'mensagem' => 'Ocorreu um erro ao tentar-se editar os dados da solicitação de suporte!',
                'suporte' => []
            ]);
        }

    }
}
