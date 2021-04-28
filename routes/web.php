<?php

use App\Models\Aluno;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;


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

Route::get('/', function () {
    $alunos = Aluno::paginate(2);
    return view('list-aluno ', compact('alunos'));
});

/*
*  metodo   |  URI              |  Name            |   Controller   |   View         |   Funcao
*  GET        /aluno               aluno.index         @index           list-aluno       Listar Alunos
*  GET        /aluno/create        aluno.create        @create          create-aluno     Formulario Criacao
*  POST       /aluno               aluno.store         @store           nenhuma          Inclui os dados  no BD
*  DELETE     /aluno/{aluno}       aluno.destroy       @destroy         list-aluno       Excluir Alunos
*  GET        /aluno/{aluno}/edit  aluno.edit          @edit            edit-aluno       Editar Aluno
*  PUT        /aluno/{aluno}       aluno.update        @update          nenhuma          Salvar Alteracao no BD
*/

Route::resource('aluno', AlunoController::class);
