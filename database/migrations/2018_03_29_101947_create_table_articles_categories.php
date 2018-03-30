<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticlesCategories extends Migration
{
    /** Run the migrations.
     * @return void
    */
    public function up()
    {
        Schema::create('articles_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100); //unique field. Title for category of articles
            $table->string('alias',100)->unique(); //This alias for category of articles (slug)
            $table->timestamps();
        });
    }

    /** Reverse the migrations.
     * @return void
    */
    public function down()
    {
        Schema::dropIfExists('articles_categories');
    }
}
