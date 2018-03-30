<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToTableArticles extends Migration
{
    /** Run the migrations.
     * @return void
    */
    public function up()
    {
        if( Schema::hasTable('articles') ) {
            Schema::table('articles', function (Blueprint $table) {
                $table->integer('articles_category_id')->unsigned(); //field `articles_category_id` this is FOREIGN KEY and relation this field `id` of table `articles_categories`
                $table->foreign('articles_category_id')->references('id')->on('articles_categories');
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
