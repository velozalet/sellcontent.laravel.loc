<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToTableUsersArticlesBuy extends Migration
{
    /** Run the migrations.
     * @return void
    */
    public function up()
    {
        if( Schema::hasTable('users_articles_buy') ) {
            Schema::table('users_articles_buy', function (Blueprint $table) {

                $table->integer('user_id')->unsigned(); //field `user_id` this is FOREIGN KEY and relation this field `id` of table `users`
                $table->foreign('user_id')->references('id')->on('users');

                $table->integer('article_id')->unsigned(); //field `article_id` this is FOREIGN KEY and relation this field `id` of table `articles`
                $table->foreign('article_id')->references('id')->on('articles');
            });
        }
    }

    /** Reverse the migrations.
     * @return void
    */
    public function down()
    {
        Schema::table('users_articles_buy', function (Blueprint $table) {
            //
        });
    }
}
