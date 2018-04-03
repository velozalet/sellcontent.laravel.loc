<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /** The attributes that are mass assignable.
     * @var array
    */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /** The attributes that should be hidden for arrays.
     * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //_______________________________________________________________________________________________________________________________________________________________________


    /** RELATIONSHIPS: */
    public function roles() {
        return $this->belongsToMany('App\Role','users_roles');
    }

    public function articles() {
        return $this->belongsToMany('App\Article','users_articles_buy');
    }


    /** canDo - Check whether the current user has rights to certain actions on the site.
     * @param $currentUserID - ID of current authenticated User
     * @param string/array $permission - a certain right for the User, which is checked or a set of rights that are checked in the array
     * @param bool $require - flag. To check one defined right for the User ($ require = FALSE) or the whole array of rights that is passed for checking ($ require = TRUE).
     * @return bool
    */  /*(!) `User` Model relation with `Role` Model and already `Role` Model relation with `Permission` Model */
    public function userCanDo( $currentUserID ,$permission, $require=FALSE ) {
        $roles_of_user = $this->find($currentUserID)->roles()->get();

        if( is_array($permission) ) {
            foreach( $permission as $item_perm ) { //level-1
                $item_perm = $this->userCanDo($currentUserID, $item_perm);
                if( $item_perm && !$require ) {
                    return TRUE;
                }
                else if( !$item_perm && $require ) {
                    return FALSE;
                }
            }
            return $require;
        }
        else {
            $roles_of_user = $this->find($currentUserID)->roles()->get();
            foreach( $roles_of_user as $item_role ) { //level-1

                foreach( $item_role->permissions()->get() as $item_perm ) { //level-2
                    if( $permission === $item_perm->name ) {
                        return TRUE;
                    }
                } //_/level-2

            } //_/level-1
            return FALSE;
        }
    } //__/public function canDo()

} //__/class User
