<?php
use Illuminate\Http\Request;
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

/** FOR DOWNLOADING FILES. THE FILE NAME is PASSED as a PARAMETER
*/
Route::get( '/download/{filename}', function($filename=FALSE) {
    //Check if file exists in `/public/files_for_sale`
    $file_path = public_path() . "/files_for_sale/" . $filename;
    $headers = array(
        'Content-Type: docx',
        'Content-Disposition: attachment; filename='.$filename,
    );
    if ( file_exists( $file_path ) ) {
        return \Response::download( $file_path, $filename, $headers ); //Send Download
    } else {
        exit( 'Requested file does not exist on our server!' ); //Error
    }
});


/** FOR STRIPE
*/
Route::post('/checkout', 'StripePaymentController@create_payment');


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