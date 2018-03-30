<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilepathToTableArticles extends Migration
{
    /** Run the migrations.
     * @return void
    */
    public function up()
    {
        if( Schema::hasTable('articles') ) {
            Schema::table('articles', function (Blueprint $table) {
                $table->string('file_path',255)->unique(); //unique field. This path to uploaded file in server directory
            });
        }
    }

    /** Reverse the migrations.
     * @return void
    */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
}
