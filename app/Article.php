<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public $timestamps = TRUE;

    protected $fillable = ['id','alias','desctext','buyflag','images','articles_category_id','file_path','price','created_at','updated_at'];
    protected static $_select = ['id','alias','desctext','buyflag','images','articles_category_id','file_path','price','created_at'];

    protected $guarded = [
        //'id','alias','desctext','buyflag','images','articles_category_id','file_path','price','created_at','updated_at'
    ];
    //_______________________________________________________________________________________________________________________________________

    /** Get all Articles from DB for backend-part
     * @param bool/array $select - array with the listed fields that you need to take
     * @param bool/int $pagination - Pagination(how many entries to display on one page)
     * @param bool/array $relationload - Load into the data sample the data of the relationship Models or not. If FALSE - not
     * @param array $where - array with query parameters for the SQL-query to DB
     * @return object (collection Models)
    */
    public static function get_entries( $select=FALSE, $pagination=FALSE, $relationload=FALSE, $where=array() ) {
        if( !$select ) { $select = self::$_select; }
        if( !$pagination ) {  //If pagination is not needed
            if( count($where) > 0 ) { $result_entries = self::select( $select )->where( $where[0],$where[1],$where[2] )->get(); }
            else { $result_entries = self::select( $select )->get();  }  //Article::get( $select );
            //If the sample data of this Model needs to load the data of the relation Models. The names of the communication methods between them
            if( $result_entries && $relationload ) { $result_entries->load( $relationload ); }
        }
        else {  //If pagination is needed
            if( count($where) > 0 ) { $result_entries = self::select( $select )->where( $where[0],$where[1],$where[2] )->paginate($pagination); }
            else { $result_entries = self::select( $select )->paginate($pagination); }
            //If the sample data of this Model needs to load the data of the relation Models. The names of the communication methods between them
            if( $result_entries && $relationload ) { $result_entries->load( $relationload ); }
        }
        return $result_entries;
    }  //__/public static function get_entries()


    /** Get single Article from DB for frontend-part
     * @param array $where - array with query parameters for the SQL-query to DB
     * @return object (collection Models)
     */
    public static function get_single_entry( $where=array() ) {
        return $result_entries = self::select( self::$_select )->where( $where[0],$where[1],$where[2] )->get();
    }


    /** RELATIONSHIPS: */
    public function articlesCategories() {
        return $this->belongsTo('App\ArticleCategory', 'articles_category_id', 'id');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'users_articles_buy');
    }

} //__/class Article
