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

Route::get('/',[

    'uses' => 'FrontEndController@index',
    'as'   => 'index'

]);

Route::get('/post/{slug}',[
    'uses'  => 'FrontEndController@single_post',
    'as'    => 'post.single'
]);











































Route::get('/test',function (){


    return App\profile::find(1)->User;

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










    Route::get('/view/user',[


        'uses'  => 'UserController@index',
        'as'    => 'user.view'

    ]);

    Route::get('/create/user',[

        'uses' => 'UserController@create',
        'as'   => 'user.create'

    ]);

    Route::post('/store/user',[

        'uses'  => 'UserController@store',
        'as'    =>  'user.store'

    ]);

    Route::get('/make/admin/{id}',[

       'uses'   => 'UserController@make_admin',
       'as'     => 'make.admin'

    ]);

    Route::get('/make/cancel/admin/{id}',[

        'uses'   => 'UserController@to_no_admin',
        'as'     => 'cancel.admin'

    ]);











    Route::get('/profile/user',[

        'uses'  => 'ProfileController@index',
        'as'    => 'user.profile'

    ]);



    Route::post('/profile/user/update',[

        'uses'  => 'ProfileController@update',
        'as'    => 'profile.update'
    ]);

    Route::get('/delete/profile/{id}',[

        'uses'  => 'ProfileController@destroy',
        'as'    => 'delete.profile'
    ]);
















    Route::post('settings/update',[

        'uses'  => 'SettingController@update',
        'as'    => 'settings.update'
    ]);

    Route::get('settings/view',[

        'uses'  => 'SettingController@index',
        'as'    => 'settings.view'

    ]);











});
