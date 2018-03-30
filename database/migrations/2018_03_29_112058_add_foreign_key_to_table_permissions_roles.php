<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToTablePermissionsRoles extends Migration
{
    /**Run the migrations.
     * @return void
    */
    public function up()
    {
        if( Schema::hasTable('permissions_roles') ) {
            Schema::table('permissions_roles', function (Blueprint $table) {

                $table->integer('permission_id')->unsigned()->default(8); //field `permission_id` this is FOREIGN KEY and relation this field `id` of table `permissions`
                $table->foreign('permission_id')->references('id')->on('permissions');

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
        Schema::table('permissions_roles', function (Blueprint $table) {
            //
        });
    }
}
