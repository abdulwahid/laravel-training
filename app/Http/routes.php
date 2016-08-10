<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 Route::get('/', function () {
     return view('welcome');
 });

Route::auth([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'

]);

Route::get('/home', 'HomeController@index');

Route::group(['as' => 'admin:'], function()
{
    Route::get('/author', 'HomeController@index');

    Route::get('/article', 'HomeController@index');

    Route::get('/author/create', ['as' => 'createAuthor', function(){
            return view('author.create-author');
    }]);

    Route::post('/author/post-create', 'AuthorController@validateAuthorInput');

    Route::get('/author/list', [
        'as' => 'listAuthor', 'uses' => 'AuthorController@getAllAuthors'
    ]);

    Route::get('/author/edit/{id}', [
        'as' => 'editAuthor', 'uses' => 'AuthorController@editAuthor'
    ]);

    Route::post('/author/post-edit/{id}', [
        'as' => 'saveAuthor', 'uses' => 'AuthorController@saveEditAuthor'
    ]);

    Route::get('/author/delete/{id}', [
        'as' => 'deleteAuthor', 'uses' => 'AuthorController@deleteAuthor'
    ]);

    Route::get('/author/articles', [
        'as' => 'loadArticles', 'uses' => 'AuthorController@getArticlesForAuthor'
    ]);

    Route::get('/author/auth-article/{id}', [
        'as' => 'authorArticles', 'uses' => 'AuthorController@getArticlesForOneAuthor'
    ]);

    Route::get('/article/create', ['as' => 'createArticle', 'uses' => 'ArticleController@createArticle' ]);

    Route::post('/article/post-create', 'ArticleController@validateArticleInput');

    Route::get('/article/list', [
        'as' => 'listArticle', 'uses' => 'ArticleController@getAllArticles'
    ]);

    Route::get('/article/edit/{id}', [
        'as' => 'editArticle', 'uses' => 'ArticleController@editArticle'
    ]);

    Route::post('/article/post-edit/{id}', [
        'as' => 'saveArticle', 'uses' => 'ArticleController@saveEditArticle'
    ]);

    Route::get('/article/delete/{id}', [
        'as' => 'deleteArticle', 'uses' => 'ArticleController@deleteArticle'
    ]);

});


