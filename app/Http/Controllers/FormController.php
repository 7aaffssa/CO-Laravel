<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'dn' => 'required|date',
        ]);

        $request->session()->put('form_data', $request->all());

        return redirect()->route('form.result');
    }

    public function showResult(Request $request)
    {
        $formData = $request->session()->get('form_data');

        return view('result', compact('formData'));
    }
}