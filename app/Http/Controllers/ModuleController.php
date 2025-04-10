<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    // Display all modules
    public function index()
    {
        $modules = DB::table('modules')->orderBy('code')->paginate(10); 
        return view('modules.index', compact('modules'));
    }

    // Show create form
    public function create()
    {
        return view('modules.create');
    }

    // Store new module
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|integer|unique:modules,code',
            'title' => 'required|max:255',
            'hours' => 'required|integer|min:1',
        ]);

        DB::table('modules')->insert($validatedData);

        return redirect('/modules')->with('success', 'Module créé avec succès!');
    }

    // Show edit form
    public function edit($code)
    {
        $module = DB::table('modules')->where('code', $code)->first();
        
        if (!$module) {
            abort(404);
        }
        
        return view('modules.edit', compact('module'));
    }

    // Update module
    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'hours' => 'required|integer|min:1',
        ]);

        DB::table('modules')
            ->where('code', $code)
            ->update($validatedData);

        return redirect('/modules')->with('success', 'Module modifié avec succès!');
    }

    // Delete module
    public function destroy($code)
    {
        DB::table('modules')->where('code', $code)->delete();
        return redirect('/modules')->with('success', 'Module supprimé avec succès!');
    }
}