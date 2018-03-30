<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

//use App\ArticleCategory;

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
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //=> FORMING динамическую секцию шаблона `resources/views/frontendsite/pink/index.blade.php` - "content" для "HOME" page
        $content_page = view(config('settings.path_folder_frontend').'.include._articles');

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
        //
    }

} //__/class ArticleResourceController
