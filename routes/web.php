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
/*
    Route::get('/', function () {
        return view('welcome');
    });
*/
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('default_home');


/** 1) FOR FRONTEND part.
*/
Route::group( ['middleware'=>['web'] ], function() {

    /** 1.1__________________Home page show - For:'/' */
    Route::resource('/', 'IndexResourceController', [
        'only'=>['index'],
        'names'=>['index'=>'home']
    ]);

    /** 1.2__________________Articles page - For:'/articles' */
    /**/
        Route::resource('articles', 'ArticleResourceController', [
            'names'=>['index'=>'articles'],
            'parameters' => [   //For:'/articles/{alias}' (alias = article1,article2,article3...)
                'articles' => 'alias' //переименовываем стандартное имя для такого маршрута 'articles' на 'alias'
            ]
        ]);

}); //__/Route::group( ['middleware'=>['web'] ]



/** 2) FOR BACKEND part (Admin-Panel).
*/