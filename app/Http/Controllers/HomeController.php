<?php

namespace App\Http\Controllers;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        SEOTools::setTitle('Escuela  Nacional de Fiscales del Ministerio Público');
        SEOTools::setDescription('Somos la primera escuela de fiscales a nivel nacional');
        return view('home');
    }
    
}
