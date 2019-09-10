<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){


    Route::get('/home', [

        'uses' => 'HomeController@index',
        'as'   => 'home'

    ]);

    Route::get('/category',[

        'uses' => 'BlogCategoryController@index',
        'as'   => 'category'


    ]);


    Route::get('/category/create',[

        'uses' => 'BlogCategoryController@create',
        'as'   => 'category.create'

    ]);

    Route::post('/category/store',[

       'uses' => 'BlogCategoryController@store',
       'as'   => 'category.store'

    ]);

    Route::get('/category/edit/{id}',[

       'uses' => 'BlogCategoryController@edit',
       'as'   => 'category.edit'

    ]);

    Route::post('/category/update/{id}',[

        'uses' => 'BlogCategoryController@update',
        'as'   => 'category.update'

    ]);

    Route::get('/category/delete/{id}',[

       'uses' => 'BlogCategoryController@destroy',
       'as'   => 'category.delete'

    ]);








/*
***********---------------ROUTES FOR THE POST------------------------*****************
*/


    Route::get('/post/create',[

        'uses' => 'BlogPostController@create',

        'as' => 'post.create'

    ]);

    Route::post('/post/store',[

        'uses' => 'BlogPostController@store',
        'as'   => 'post.store'

    ]);

    Route::get('view/post',[

       'uses' => 'BlogPostController@index',
        'as'  => 'post.view'

    ]);

    Route::get('/post/trash/{id}',[

        'uses' => 'BlogPostController@destroy',
        'as'   => 'post.trash'
    ]);

    Route::get('post/trashed',[

        'uses' => 'BlogPostController@view_trashed',
        'as'   => 'post.viewTrashed'

    ]);

    Route::get('post/kill/{id}',[

        'uses' => 'BlogPostController@kill',
        'as'   => 'post.kill'

    ]);

    Route::get('/post/restore/{id}',[

        'uses' => 'BlogPostController@restore',
        'as'   => 'post.restore'
    ]);

    Route::get('/post/edit/{id}',[

        'uses' => 'BlogPostController@edit',
        'as'   => 'post.edit'

    ]);

    Route::post('/post/update/{id}',[

        'uses' => 'BlogPostController@update',
        'as'   => 'post.update'


    ]);
















    Route::get('/view/tag',[

       'uses' => 'TagController@index',
       'as'   => 'tag.view'

    ]);

    Route::get('/tag/create',[

        'uses' => 'TagController@create',
        'as'   => 'tag.create'
    ]);

    Route::post('/tag/store',[

        'uses' => 'TagController@store',
        'as'   => 'tag.store'
    ]);

    Route::get('/tag/edit/{id}',[

        'uses' => 'TagController@edit',
        'as'   => 'tag.edit'

    ]);

    Route::post('/tag/update/{id}',[

        'uses' => 'TagController@update',
        'as'   => 'tag.update'

    ]);

    Route::get('/tag/delete/{id}',[

        'uses'  => 'TagController@destroy',
        'as'    => 'tag.delete'
    ]);








});
