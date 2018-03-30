<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    public $timestamps = TRUE;

    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];
    protected static $_select = ['id', 'name', 'created_at'];

    protected $guarded = [
        //'id', 'name', 'created_at', 'updated_at'
    ];
    //_______________________________________________________________________________________________________________________________________


    /** RELATIONSHIPS: */
    public function roles() {
        return $this->belongsToMany('App\Role','permissions_roles');
    }
} //__/class Permission
