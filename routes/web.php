<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvokeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\NoteStagiaireController;
use App\Http\Controllers\ProduitController;

// ? TP Routage
//! Partie 1

Route::get('/home', function () {
    return 'Bonjour Laravel';
});

Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/test', [TestController::class,'index'] );

Route::get('/test/show', [TestController::class,'show'] );


Route::get('/view', function () {
    return view('accueil');
});

// ! Partie 2
Route::get('/accueil', function () {
    return view('accueil');
})->name('accueil');

// ! Partie 3
Route::get('/home/{name}', function ($name) {
    return 'Bonjour ' .$name;
});

Route::get('/home/{name}/{age}', function ($name,$age) {
    return 'Bonjour '.$name.',votre age est '.$age.'ans';
});

Route::get('/home/{name}/{age}', function ($name,$age=null) {
    if ($age){return 'Bonjour '.$name.',votre age est '.$age.'ans' ;}
    else{
    return "Bonjour $name";}
    
});

//! Partie 4 
Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
            Route::get('/dashboard',function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('/users',function(){
        return view('admin.users');
    })->name('admin.users');
    
    Route::get('/settings',function(){
        return view('admin.settings');
    })->name('admin.settings');
    });   
});

//! Partie 5
Route::get('/post/{post}', function (Post $post) {
    return view('post.show', ['post' => $post]);
})->name('post.show');

Route::resource('posts', PostController::class);

    //! Partie 7
Route::get('/articles', [ProductController::class, 'index'])->name('articles.index');
Route::delete('/articles/{id}', [ProductController::class, 'destroy'])
->name('articles.destroy');
    
    //! Partie 8
    Route::get('/current-route', function () {
        $route = Route::current();
        return view('current-route', [
            'route' => $route
        ]);
    });


    //! Partie 10 
    Route::get('/slow-route', function () {
        sleep(2); 
        return 'Traitement terminé';
    });

    //! Partie 6
    Route::fallback(function () {
        return view('errors.404');
    });

    // ? TP Middleware
    Route::get('/accueil', function () {
        return view('accueil');
    })->middleware('age');
    
    Route::get('/contact', function () {
        return view('contact');
    })->middleware('user');
    
    Route::get('/testt', function () {
        return view('testt');
    })->middleware('test');

    // ? TP CSRF
    Route::get('/csrf-token', function () {
        return csrf_token();
    });
    
    Route::get('/update-profile-form', function () {
        return view('update-profile');
    });
    
    Route::post('/update-profile', function (Request $request) {
        return $request->all();
    });
    Route::get('/update', function () {
        return view('update');
    });
    
    Route::post('/update', function (Request $request) {
        return $request->all();
    });
    
    Route::get('/formm', [FormController::class, 'showForm'])->name('form.show');
    
    Route::post('/formm/submit', [FormController::class, 'submitForm'])->name('form.submit');
    
    Route::get('/formm/result', [FormController::class, 'showResult'])->name('form.result');
    
    
    Route::get('/test', function () {
        return 'laravel fonctionne';
    });


    // ? TP Controllers
    Route::get('/test', function () {
        return 'laravel fonctionne';
    });
    Route::get('/base', [BaseController::class, 'index']);
    Route::get('/one', [BaseController::class, 'oneMethode']);
    Route::get('/two', [BaseController::class, 'twoMethode']);
    Route::get('/three', [BaseController::class, 'threeMethode']);
    
    Route::get('/oneAction', InvokeController::class);
    
    Route::resource('MaRessource', RessourceController::class);

    // ? TP VIEWS
    Route::get('/user/{id}', [UserController::class, 'show']);

// 3
Route::get('/user/{id?}', [UserController::class, 'show']);

// 4
Route::get('/admin', function () {
    return view('admin.dashboardV');
})->middleware('checkrole:admin');

// Stagiaire Routes
// Route::resource('stagiaires', StagiaireController::class);
// Route::get('stagiaires/{stagiaire}/create-note', [StagiaireController::class, 'createNote'])->name('stagiaires.create-note');
// Route::post('stagiaires/{stagiaire}/store-note', [StagiaireController::class, 'storeNote'])->name('stagiaires.store-note');

// // Note Routes
// Route::resource('notes', NoteStagiaireController::class);

// Route::get('/', function () {
//     return redirect()->route('stagiaires.index');
// });


Route::resource('produits', ProduitController::class);// routes/web.php

Route::resource('modules', ModuleController::class);
Route::delete('/modules', [ModuleController::class, 'destroyAll'])->name('modules.destroyAll');