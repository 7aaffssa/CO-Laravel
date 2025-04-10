<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RessourceController extends Controller
{
    public function index()
    {
        return 'je suis le contrôleur RessourceController';
    }

    public function create()
    {
        return 'je suis la méthode create du Contrôleur RessourceController';
    }

    public function edit($id)
    {
        return "je suis la méthode edit du Contrôleur RessourceController. ID: $id";
    }

    public function show($id)
    {
        return "je suis la méthode show du Contrôleur RessourceController. ID: $id";
    }
}