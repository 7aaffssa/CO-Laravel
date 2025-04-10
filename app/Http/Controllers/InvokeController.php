<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvokeController extends Controller
{
    public function __invoke()
    {
        return 'je suis le contrôleur à une seule action';
    }
}