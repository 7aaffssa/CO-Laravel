<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('OneMiddleware')->only('oneMethode');
    //     $this->middleware('TwoMiddleware')->except('oneMethode');
    //     $this->middleware('ThreeMiddleware')->except(['oneMethode', 'twoMethode']);
    // }

    public function index()
    {
        return 'Je suis le contrôleur BaseController';
    }

    public function oneMethode()
    {
        return view('accueil');
    }

    public function twoMethode()
    {
        return 'Je suis la méthode twoMethode';
    }

    public function threeMethode()
    {
        return 'Je suis la méthode threeMethode';
    }
}