<?php

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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/noticias', 'NoticiasController@index');
Route::get('/noticias/{slug}', 'NoticiasController@post');

Route::get('/admin', 'Admin\AdminController@index');

Route::get('/admin/config', 'Admin\ConfigGeralController@listar');
Route::get('/admin/config/listar', 'Admin\ConfigGeralController@listar');
Route::get('/admin/config/listar/{success}', 'Admin\ConfigGeralController@listar');
Route::get('/admin/config/criar', 'Admin\ConfigGeralController@criar');
Route::get('/admin/config/criar/{id}', 'Admin\ConfigGeralController@criar');
Route::post('/admin/config/salvar', 'Admin\ConfigGeralController@salvar');
Route::get('/admin/config/remover/{id}', 'Admin\ConfigGeralController@remover');

Route::get('/admin/portfolio', 'Admin\PortfolioController@listar');
Route::get('/admin/portfolio/listar', 'Admin\PortfolioController@listar');
Route::get('/admin/portfolio/listar/{success}', 'Admin\PortfolioController@listar');
Route::get('/admin/portfolio/criar', 'Admin\PortfolioController@criar');
Route::get('/admin/portfolio/criar/{id}', 'Admin\PortfolioController@criar');
Route::post('/admin/portfolio/salvar', 'Admin\PortfolioController@salvar');
Route::get('/admin/portfolio/remover/{id}', 'Admin\PortfolioController@remover');

Route::get('/admin/bio', 'Admin\BioController@listar');
Route::get('/admin/bio/listar', 'Admin\BioController@listar');
Route::get('/admin/bio/listar/{success}', 'Admin\BioController@listar');
Route::get('/admin/bio/criar', 'Admin\BioController@criar');
Route::get('/admin/bio/criar/{id}', 'Admin\BioController@criar');
Route::post('/admin/bio/salvar', 'Admin\BioController@salvar');
Route::get('/admin/bio/remover/{id}', 'Admin\BioController@remover');

Route::get('/admin/mensagens', 'Admin\MensagensController@listar');
Route::get('/admin/mensagens/listar', 'Admin\MensagensController@listar');
Route::get('/admin/mensagens/listar/{success}', 'Admin\MensagensController@listar');
Route::get('/admin/mensagens/criar', 'Admin\MensagensController@criar');
Route::get('/admin/mensagens/criar/{id}', 'Admin\MensagensController@criar');
Route::post('/admin/mensagens/salvar', 'Admin\MensagensController@salvar');
Route::post('/admin/mensagens/enviar', 'Admin\MensagensController@enviar');
Route::get('/admin/mensagens/remover/{id}', 'Admin\MensagensController@remover');


Auth::routes();
