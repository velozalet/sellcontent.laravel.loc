<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;

use App\ArticleCategory;

class ArticleResourceController extends SiteMainController
{
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
        );

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
    {
        //if( Gate::denies('viewHiddenContent', SiteMainController::$_objArticle) ) { abort(404); }

        //=> GET DATA(from DB) THROUGH the MODEL:
        $get_single_article = SiteMainController::get_entries_with_settings(
            SiteMainController::$_objArticle,false,false, array('articlesCategories'), array('id','=',$id)
        );
        //dd($get_single_article);

        //=> FORMING the dynamic section of the template `resources/views/frontendsite/index.blade.php` - "content" for "ARTICLES" page
        $content_page = view(config('settings.path_folder_frontend').'.include._single_article')
            ->with( 'single_article', $get_single_article )
            ->with('is_user_cannot_view_hidden_content', Gate::denies('viewHiddenContent', SiteMainController::$_objArticle) ); //Данные для single article (without pagination); //Data for Single Article

        //=> RENDER View and DATA for View
        $this->_vars_for_template_view['page_content'] = $content_page;
        return $this->renderOutput();
    }

} //__/class ArticleResourceController
