<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

//use App\Article;

class SiteMainController extends Controller
{
    protected static $_objArticle;

    protected $_template_view_name; //for template View
    protected $_vars_for_template_view = array(); //an array with variables that will be passed to the template (View)
    protected $_keywords; //keywords for meta tag pages
    protected $_meta_description; //meta-data (description) for the page
    protected $_author; //meta-data author for the page
    protected $_title; //title for the page tab (display the name of the page on the tab of the browser)
    //_______________________________________________________________________________________________________________________________________________________________________

    public function __construct(){
        //self::$_objArticle = new Article();
    }
    //_______________________________________________________________________________________________________________________________________________________________________

    /** Return View with data
     *  @return
    */
    protected function renderOutput() {
        if( view()->exists( config('settings.path_folder_frontend').$this->_template_view_name ) ) {
            return view( config('settings.path_folder_frontend').$this->_template_view_name, [
                'vars_for_template_view' => $this->_vars_for_template_view,
                'keywords' => $this->_keywords,
                'meta_description' => $this->_meta_description,
                'author' => $this->_author,
                'title' => $this->_title,
            ] )->render();
        }
        else { abort(404); }
    }


    /** Get entries with settings
     * @param object $objModel - object of current and needs Model
     * @param bool/array $select - array with the listed fields that you need to take
     * @param bool/str $pagination - Pagination(how many entries to display on one page)
     * @param bool $relationload - Load into the data sample the data of the relationship Models or not. If FALSE - not
     * @return object (collection Models)
    */
    public static function get_entries_with_settings( $objModel, $select=FALSE, $pagination=FALSE, $relationload=FALSE, $where=array() ) {
        //If pagination is not needed
        if( !$pagination ) {
            if( !$select ) { //If we do not pass our array of fields to sample data
                $result_entries = $objModel::get_entries( false,false,false,$where );
                if( $result_entries && $relationload ) { $result_entries = $objModel::get_entries( false, false, $relationload, $where ); }
            }
            else { //If we do not pass our array of fields to sample data
                $result_entries = $objModel::get_entries( $select,false,false,$where );
                if( $result_entries && $relationload ) { $result_entries = $objModel::get_entries( $select, false, $relationload, $where ); }
            }
        }
        //If pagination is needed
        else {
            if( !$select ) { //Если не передаем свой массив полей для выборки данных
                $result_entries = $objModel::get_entries( false,$pagination,false );
                if( $result_entries && $relationload ) { $result_entries = $objModel::get_entries( false, $pagination, $relationload, $where ); }
            }
            else { //If we pass our array of fields to sample data
                $result_entries = $objModel::get_entries( $select,$pagination,false  );
                if( $result_entries && $relationload ) { $result_entries = $objModel::get_entries( $select, $pagination, $relationload, $where ); }
            }
        }
        return $result_entries;
    }


    /** Get entries with limit
     * @param $entries - entries
     * @param int $take - number of entries you need to take
     * @param bool/int $reverse - take entries from the beginning or the end. If TRUE - take from end
     * @return array/object(collection Models)
    */
    public static function get_entries_limit( $entries, $take, $reverse=FALSE ) {
        if( is_array($entries) ) {  //if input Array
            if( !$reverse ) { $result_entries = array_slice($entries, 0, $take); }
            else { $result_entries = array_slice( array_reverse( $entries, false ), 0, $take ); }
        }
        else { //if input Object(collection Models)
            if( !$reverse ) {
                $obj_x_length = count($entries);
                $marker_end = $take;
                $result_entries_x = new Collection();

                for( $i=0; $i < $obj_x_length; $i++ ) {
                    if( $i < $marker_end ) {
                        $result_entries_x[] = (object)$entries[$i];
                    }
                }
               $result_entries = $result_entries_x;
            }
            else {  //if input Object(collection Models)
                $obj_x_length = count($entries);
                $marker_end = ( $obj_x_length - $take );
                $result_entries_x = new Collection();

                for( $i=0; $i < $obj_x_length; $i++ ) {
                    if( $i > ($marker_end - 1) ) {
                        $result_entries_x[] = (object)$entries[$i];
                    }
                }
                $result_entries = $result_entries_x->reverse();
            }
        }
        return $result_entries;
    }

}  //__/class SiteMainController