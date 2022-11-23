<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleCollection;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//create a route to get all articles
//Route::get('/articles', 'App\Http\Controllers\ArticleController@index');



Route::get('/articles', function () {
    return new ArticleCollection (Article::paginate());
    //return \App\Models\Article::all();
});

Route::get('/articles/{id}', function ($id) {
    //return \App\Models\Article::find($id);
    return new ArticleResource(Article::findOrFail($id));
});

Route::post('/articles', function (Request $request) {
    return \App\Models\Article::create($request->all());
});

Route::put('/articles/{id}', function (Request $request, $id) {
    $article = \App\Models\Article::findOrFail($id);
    $article->update($request->all());

    return $article;
});

Route::delete('/articles/{id}', function ($id) {
    \App\Models\Article::find($id)->delete();

    return 204;
});

Route::get('/greeting', function () {
    return 'Hello World';
});

