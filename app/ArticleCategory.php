<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'articles_categories';
    public $timestamps = TRUE;

    protected $fillable = ['id','title','aliasIndex','created_at','updated_at'];
    protected static $_select = ['id','title','alias','created_at'];

    protected $guarded = [
        //'id','title','aliasIndex','created_at','updated_at'
    ];
    //_______________________________________________________________________________________________________________________________________

    /** Get all Article Category from DB for frontend-part
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
            else { $result_entries = self::select( $select )->get();  }
            //If the sample data of this Model needs to load the data of the relation Models. The names of the communication methods between them
            if( $result_entries && $relationload ) { $result_entries->load( $relationload ); }
        }
        else { //If pagination is needed
            if( count($where) > 0 ) { $result_entries = self::select( $select )->where( $where[0],$where[1],$where[2] )->paginate($pagination); }
            else { $result_entries = self::select( $select )->paginate($pagination); }
            //If the sample data of this Model needs to load the data of the relation Models. The names of the communication methods between them
            if( $result_entries && $relationload ) { $result_entries->load( $relationload ); }
        }
        return $result_entries;
    }  //__/public static function get_entries()


    /** RELATIONSHIPS: */
    public function articles() {
        return $this->hasMany('App\Article', 'articles_category_id', 'id');
    }
} //__/class ArticleCategory
