<?php namespace personal_site\Http\Controllers\Admin;

use personal_site\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use personal_site\Bio;
use Illuminate\Http\Request;

Class BioController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listar($success = null){
        $bio = Bio::all()->sortByDesc("id");

        if($success != null){
            return view('admin/bio/lista')->with('bio', $bio)->with('success', $success);
        }else{
            return view('admin/bio/lista')->with('bio', $bio);
        }
    }

    public function criar($id = null){
        if($id != null){
            $bio = Bio::find($id);
            return view('admin/bio/criar')->with('bio', $bio);
        }else{
            return view('admin/bio/criar');
        }
    }

    public function salvar(Request $request){
        $bio = new Bio();
        $bio->salvar();
    }

    public function remover($id){
        $bio = Bio::find($id);
        $bio->delete();

        return redirect()->action('Admin\BioController@listar', ['success' => null]);
    }

}