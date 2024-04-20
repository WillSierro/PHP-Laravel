<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::/*middleware(LogAcessoMiddleware::class)
    ->*/get('/', 'PrincipalController@principal')
    ->name('site.index')
    ->middleware('log.acesso');

Route::get('/sobrenos', 'SobreNosController@sobrenos')
    ->name('site.sobrenos');

Route::/*middleware(LogAcessoMiddleware::class)
    ->*/get('/contato', 'ContatosController@contatos')
    ->name('site.contato');
    
Route::post('/contato', 'ContatosController@salvar')->name('site.contato');
// nome, categoria, assunto, mensagem

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

//app
Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function(){
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    
    // Route::get('/produto', 'ProdutoController@index')->name('app.produto');
    Route::resource('produto', 'ProdutoController');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}/{msg?}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');


});
Route::get('/teste/{a?}/{b?}', 'TesteController@teste')->name('teste');
Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para voltar a pagina inicial';
});

// Route::get('/contato/{nome}/{cate}/{assunto}/{msg}', function(string $nome, string $cate, string $assunto, string $msg) {
//     echo "Estamos aqui: $nome - $cate - $assunto - $msg";
// });

// Route::get('/contato/{nome}/{cate_id?}',
//     function(
//         string $nome,
//         int $cate_id = 1 // 1 - 'Informação',
//     ) {
//     echo "Estamos aqui: $nome - $cate_id";
// })->where('cate_id', '[0-9]+')->where('nome', '[A-Za-z]+');



// Route::redirect('/rota2', '/rota1');

// Route::get('/rota2', function() {
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

