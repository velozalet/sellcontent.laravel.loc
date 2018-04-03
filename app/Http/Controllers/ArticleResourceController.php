<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;

use App\ArticleCategory;

class ArticleResourceController extends SiteMainController
{
    //protected $_stripe_test_secret_key = getenv('STRIPE_TEST_SECRET_KEY');
    public function __construct() {
        parent::__construct();
        $this->_template_view_name = '.index';
        $this->_keywords = 'Articles Page, Test site, Sale articles';
        $this->_meta_description = 'Articles Page description text ...';
        $this->_author = 'Lutskyi Yaroslav';
        $this->_title= 'ARTICLES';
    }
    //_______________________________________________________________________________________________________________________________________________________________________

    /** Display a listing of the resource.
     * @param bool/string $cat - parameter for URL
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //=> GET DATA(from DB) THROUGH the MODEL:
        $all_articles = SiteMainController::get_entries_with_settings(
            SiteMainController::$_objArticle,false, false, array('articlesCategories'), array()
        ); //dd($all_articles);

        //=> FORMING the dynamic section of the template `resources/views/frontendsite/index.blade.php` - "content" for "ARTICLES" page
        $content_page = view(config('settings.path_folder_frontend').'.include._articles')
            ->with( 'all_articles', $all_articles ); //Data for Articles

        //=> RENDER View and DATA for View
        $this->_vars_for_template_view['page_content'] = $content_page;
        return $this->renderOutput();
    } //__/public function index()


    /** Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id)
    {  //if( Gate::denies('viewHiddenContent', SiteMainController::$_objArticle) ) { abort(404); }
        //dd( env('STRIPE_TEST_SECRET_KEY'));
        //=> GET DATA(from DB) THROUGH the MODEL:
        $get_single_article = SiteMainController::get_entries_with_settings(
            SiteMainController::$_objArticle,false,false, array('articlesCategories','users'), array('id','=',$id)
        ); //dd($get_single_article[0]->users[1]->id);

        $id_users_bought_this_content = array();
        for( $i=0, $cnt=count($get_single_article[0]->users); $i < $cnt; ++$i ) {
            $id_users_bought_this_content[] = $get_single_article[0]->users[$i]->id;
        }

        //=> FORMING the dynamic section of the template `resources/views/frontendsite/index.blade.php` - "content" for "ARTICLES" page
        $content_page = view(config('settings.path_folder_frontend').'.include._single_article')
            ->with( 'single_article', $get_single_article )
            ->with('id_users_bought_this_content', $id_users_bought_this_content ); //Array with ID Users who bought this content
            //->with('is_user_cannot_view_hidden_content', Gate::denies('viewHiddenContent', SiteMainController::$_objArticle) ) bool(TRUE/FALSE) - can or not User show hidden content

        //=> RENDER View and DATA for View
        $this->_vars_for_template_view['page_content'] = $content_page;
        return $this->renderOutput();
    }

} //__/class ArticleResourceController
