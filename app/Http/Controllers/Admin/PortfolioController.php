<?php namespace personal_site\Http\Controllers\Admin;

use personal_site\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use personal_site\Portfolio;
use Illuminate\Http\Request;

Class PortfolioController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listar($success = null){
        $portfolio = Portfolio::all()->sortByDesc("id");

        if($success != null){
            return view('admin/portfolio/lista')->with('portfolio', $portfolio)->with('success', $success);
        }else{
            return view('admin/portfolio/lista')->with('portfolio', $portfolio);
        }
    }

    public function criar($id = null){
        if($id != null){
            $portfolio = Portfolio::find($id);
            return view('admin/portfolio/criar')->with('portfolio', $portfolio);
        }else{
            return view('admin/portfolio/criar');
        }
    }

    public function salvar(Request $request){
        $portfolio = new Portfolio();
        $portfolio->salvar();
    }

    public function remover($id){
        $portfolio = Portfolio::find($id);
        $portfolio->delete();

        return redirect()->action('Admin\PortfolioController@listar', ['success' => null]);
    }

}