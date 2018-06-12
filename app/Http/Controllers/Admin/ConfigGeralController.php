<?php namespace personal_site\Http\Controllers\Admin;

use personal_site\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use personal_site\ConfigGeral;
use Illuminate\Http\Request;

Class ConfigGeralController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listar($success = null){
        $config = ConfigGeral::all()->sortByDesc("id");

        if($success != null){
            return view('admin/configGeral/lista')->with('config', $config)->with('success', $success);
        }else{
            return view('admin/configGeral/lista')->with('config', $config);
        }
    }

    public function criar($id = null){
        if($id != null){
            $config = ConfigGeral::find($id);
            return view('admin/configGeral/criar')->with('config', $config);
        }else{
            return view('admin/configGeral/criar');
        }
    }

    public function salvar(Request $request){
        $ConfigGeral = new ConfigGeral();
        $ConfigGeral->salvar();
    }

    public function remover($id){
        $config = ConfigGeral::find($id);
        $config->delete();

        return redirect()->action('Admin\ConfigGeralController@listar', ['success' => null]);
    }

}