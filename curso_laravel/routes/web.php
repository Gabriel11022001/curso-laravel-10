<?php

use App\Http\Controllers\SuporteController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

// no arquivo web.php definimos as rotas da nossa aplicação
Route::get('teste', function () {

    return view('welcome');
});

Route::get('/teste/retornar-dados', function () {

    return [
        [
            'nome_pessoa' => 'Gabriel',
            'idade' => 23
        ],
        [
            'nome_pessoa' => 'Eduardo',
            'idade' => 34
        ]
    ];
});

Route::get('/contato', function () {

    return view('contato');
});

Route::get('/gestor/tela-inicial', function () {

    return view('/gestor/pagina-inicial');
});

Route::get('/teste/controller', [ TesteController::class, 'teste' ]);

// rotas da aplicação que vou desenvolver
Route::get('/forum', [ SuporteController::class, 'index' ])->name('suportes.suporte'); // nomeando a rota com o método name()
// rota para ser redirecionado a tela de cadastardo de uma solicitação de suporte
Route::get('/forum/cadastrar', [ SuporteController::class, 'cadastrarSuporte' ])->name('novo-suporte');
// rota para salvar os dados da solicitação de suporte no banco de dados
Route::post('/suporte/cadastrar', [ SuporteController::class, 'salvarSuporte' ]);
Route::put('/suporte/alterar', [ SuporteController::class, 'editarSuporte' ]);
Route::get('/suporte/editar/{id}', [ SuporteController::class, 'redirecionarTelaEditarSuporte' ]);
Route::get('/suporte/visualizar/{id}', [ SuporteController::class, 'redirecionarTelaVisualizarSolicitacaoSuporte' ]);
Route::get('/suporte/deletar/{id}', [ SuporteController::class, 'deletarSuporte' ]);
