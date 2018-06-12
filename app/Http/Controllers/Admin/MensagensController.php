<?php namespace personal_site\Http\Controllers\Admin;

use personal_site\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use personal_site\Mensagens;
use personal_site\Mail\Mensagem;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

Class MensagensController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listar($success = null){
        $mensagens = Mensagens::all()->sortByDesc("id");

        if($success != null){
            return view('admin/mensagens/lista')->with('mensagens', $mensagens)->with('success', $success);
        }else{
            return view('admin/mensagens/lista')->with('mensagens', $mensagens);
        }
    }

    public function criar($id = null){
        if($id != null){
            $mensagem = Mensagens::find($id);
            return view('admin/mensagens/criar')->with('mensagem', $mensagem);
        }else{
            return view('admin/mensagens/criar');
        }
    }

    public function salvar(Request $request){
        $mensagem = new Mensagens();
        $mensagemSalva = $mensagem->salvar();
    }

    public function enviar(Request $request){
        $mensagem = new Mensagens();
        $mensagemSalva = $mensagem->salvar();

        if($mensagemSalva){
            $params = request()->all();
            $mensagemConteudo = new Mensagens($params);
            Mail::to('douglasfortunato@hotmail.com')->send(new Mensagem($mensagemConteudo));
        }
    }

    public function remover($id){
        $mensagem = Mensagens::find($id);
        $mensagem->delete();

        return redirect()->action('Admin\MensagensController@listar', ['success' => null]);
    }

}