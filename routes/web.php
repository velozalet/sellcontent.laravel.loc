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

//Route::get( '/download/{filename}', 'ActionController@download');

Route::get( '/download/{filename}', function($filename=FALSE) {
    // Check if file exists in app/storage/file folder
    $file_path = public_path() . "/files_for_sale/" . $filename;
    $headers = array(
        'Content-Type: docx',
        'Content-Disposition: attachment; filename='.$filename,
    );
    if ( file_exists( $file_path ) ) {
        // Send Download
        return \Response::download( $file_path, $filename, $headers );
    } else {
        // Error
        exit( 'Requested file does not exist on our server!' );
    }
});

/** 1) FOR FRONTEND part.
*/
Route::group( ['middleware'=>['web'] ], function() {

    /** 1.1__________________Home page show - For:'/' */
    Route::resource('/', 'IndexResourceController', [
        'only'=>['index'],
        'names'=>['index'=>'home']
    ]);

    /** 1.2__________________Articles page - For:'/articles' */
    Route::resource('articles', 'ArticleResourceController', [
        'names'=>['index'=>'articles', 'show'=>'article_show_single'],
        'parameters' => [   //For:'/articles/{id}'
            'articles' => 'id'
        ]
    ]);

}); //__/Route::group( ['middleware'=>['web'] ]



/** 2) FOR BACKEND part (Admin-Panel).
*/