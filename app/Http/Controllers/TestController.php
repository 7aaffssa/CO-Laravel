<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return "TestController";
    }
    public function show(){
        return view('accueil');
    }
    
}