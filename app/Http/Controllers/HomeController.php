<?php namespace personal_site\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use personal_site\Bio;
use personal_site\ConfigGeral;
use personal_site\Portfolio;

class HomeController extends Controller
{
    public function index()
    {
        $config = ConfigGeral::all()[0];
        $bio = Bio::all()[0];
        $portfolio = Portfolio::all();
        return view('home/index')->with('config', $config)->with('bio', $bio)->with('portfolio', $portfolio);
    }
}
