<?php

namespace App\Http\Controllers;

abstract class UserController
{
    public function show($id = null)
{
    $users = [
        1 => ['name' => 'John Doe', 'email' => 'john@example.com'],
        2 => ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
    ];

    if ($id === null) {
        return view('user.profile', ['user' => ['name' => 'Guest', 'email' => 'guest@example.com']]);
    }

    if (!array_key_exists($id, $users)) {
        abort(404, 'Utilisateur non trouvé');
    }

    return view('user.profile', ['user' => $users[$id]]);
}
}