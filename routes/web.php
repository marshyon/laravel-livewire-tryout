<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view(
        'listings',
        [
            'heading' => 'latest listings',
            'listings' => Listing::all()
        ]
    );
});


Route::get('/listing/{id}', function ($id) {
    $listing = Listing::find($id);
    return view('listing', ['listing' => $listing]);
});



Route::get('/todo', function () {
    return view('todo');
});

Route::get('/usercreate', function () {
    return view('usercreate');
});

Route::get('/todos', function () {
    return view('todo-list');
});

Route::get('/thing', function () {
    return response('thing', 200)
        ->header('Content-Type', 'text/plain')
        ->header('X-Header-Foo', 'Bar');
});

Route::get('/posts/{id}', function ($id) {
    // ddd($id);
    return response("You are looking at post {$id}", 200)
        ->header('Content-Type', 'text/plain');
})->where('id', '[0-9]+');

Route::get('/search', function (Request $request) {
    // dd($request);
    $name = request('name');
    $city = request('city');
    return response("You are searching for {$name} in city {$city}", 200)
        ->header('Content-Type', 'text/plain');
});
