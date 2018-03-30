<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToTableUsersRoles extends Migration
{
    /** Run the migrations.
     * @return void
    */
    public function up()
    {
        if( Schema::hasTable('users_roles') ) {
            Schema::table('users_roles', function (Blueprint $table) {

                $table->integer('user_id')->unsigned(); //field `user_id` this is FOREIGN KEY and relation this field `id` of table `users`
                $table->foreign('user_id')->references('id')->on('users');

                $table->integer('role_id')->unsigned()->default(3); //field `role_id` this is FOREIGN KEY and relation this field `id` of table `roles`
                $table->foreign('role_id')->references('id')->on('roles');
            });
        }
    }

    /** Reverse the migrations.
     * @return void
    */
    public function down()
    {
        Schema::table('users_roles', function (Blueprint $table) {
            //
        });
    }
}
