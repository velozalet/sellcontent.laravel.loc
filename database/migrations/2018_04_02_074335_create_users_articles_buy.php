<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersArticlesBuy extends Migration
{
    /** Run the migrations.
     * @return void
    */
    public function up()
    {
        Schema::create('users_articles_buy', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    /** Reverse the migrations.
     * @return void
    */
    public function down()
    {
        Schema::dropIfExists('users_articles_buy');
    }
}
