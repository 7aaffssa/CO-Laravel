<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $showAll = $request->has('show_all');
        
        $query = Module::query();
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('codeM', 'like', "%$search%")
                  ->orWhere('titre', 'like', "%$search%");
            });
        }

        $allModules = $query->get();
        $modules = $showAll ? $allModules : $allModules->take(4);

        return view('modules.index', [
            'modules' => $modules,
            'totalModules' => $allModules->count(),
            'showAll' => $showAll,
            'search' => $search
        ]);
    }
      public function show (Module $module){
        return dd($module);
      }
    public function store(Request $request)
    {
        $request->validate([
            'codeM' => 'required|unique:modules|max:10',
            'titre' => 'required|string|max:255',
            'masse_horaire' => 'required|integer|min:1'
        ]);

        Module::create($request->all());
        
        return redirect()->route('modules.index')
                         ->with('success', 'Module added successfully');
    }

    public function update(Request $request, $codeM)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'masse_horaire' => 'required|integer|min:1'
        ]);

        $module = Module::findOrFail($codeM);
        $module->update($request->all());
        
        return redirect()->route('modules.index')
                         ->with('success', 'Module updated successfully');
    }

    public function destroy($codeM)
    {
        $module = Module::findOrFail($codeM);
        $module->delete();
        
        return redirect()->route('modules.index')
                         ->with('success', 'Module deleted successfully');
    }
    
    public function destroyAll()
    {
        Module::truncate();
        
        return redirect()->route('modules.index')
                         ->with('success', 'All modules have been deleted');
    }
}