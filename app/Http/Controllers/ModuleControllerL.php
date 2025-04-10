<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    // Display all modules
    public function index()
    {
        $modules = DB::select('SELECT * FROM modules ORDER BY code');
        return view('modules.index', [
            'modules' => $modules,
            'search' => null
        ]);
    }

    // Show create form
    public function create()
    {
        return view('modules.create');
    }

    // Store new module
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'code' => 'required|integer|unique:modules,code',
        //     'title' => 'required|max:255',
        //     'hours' => 'required|integer|min:1',
        // ]);
    
        // try {
        DB::insert('INSERT INTO modules (code, title, hours) VALUES (?, ?, ?)', [
            $request['code'],
            $request['title'],
            $request['hours']
        ]);
        
        return redirect()->route('modules.index');
        // } catch (\Exception $e) {
        //     return back()->withInput()->withErrors([
        //         'error' => 'Erreur lors de la création: ' . $e->getMessage()
        //     ]);
        // }
    }

    // Show edit form
    public function edit($code)
    {
        $module = DB::select('SELECT * FROM modules WHERE code = ?', [$code]);
        
        if (empty($module)) {
            abort(404);
        }
        
        return view('modules.edit', ['module' => $module[0]]);
    }

    // Update module
    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'hours' => 'required|integer|min:1',
        ]);

        DB::update('UPDATE modules SET title = ?, hours = ? WHERE code = ?', [
            $validatedData['title'],
            $validatedData['hours'],
            $code
        ]);

        return redirect('/modules')->with('success', 'Module modifié avec succès!');
    }

    // Delete module
    public function destroy($code)
    {
        DB::delete('DELETE FROM modules WHERE code = ?', [$code]);
        return redirect('/modules')->with('success', 'Module supprimé avec succès!');
    }
    public function search(Request $request)
{
    $search = $request->input('search');
    
    $modules = DB::select('
        SELECT * FROM modules 
        WHERE code LIKE ? 
        OR title LIKE ? 
        OR hours LIKE ?
        ORDER BY code
    ', ["%$search%", "%$search%", "%$search%"]);

    return view('modules.index', [
        'modules' => $modules,
        'search' => $search
    ]);
}
}