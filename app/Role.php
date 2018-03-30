<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps = TRUE;

    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];
    protected static $_select = ['id', 'name', 'created_at'];

    protected $guarded = [
        //'id', 'name', 'created_at', 'updated_at'
    ];
    //_______________________________________________________________________________________________________________________________________


    /** RELATIONSHIPS: */
    public function users() {
        return $this->belongsToMany('App\User', 'users_roles');
    }

    public function permissions() {
        return $this->belongsToMany('App\Permission','permissions_roles');
    }

} //__/class Role
