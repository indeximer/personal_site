<?php namespace personal_site\Http\Controllers\Admin;

use personal_site\Http\Controllers\Controller;

Class AdminController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin/index');
    }

}