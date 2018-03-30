<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticles extends Migration
{
    /** Run the migrations.
     * @return void
    */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alias',150)->unique(); //unique field. This alias for article (slug)
            $table->text('desctext');  //preview text for article
            $table->string('buyflag')->default(0); //label purchased or not. 0 - available for purchase; 1 - already purchased
            $table->string('images',255); //cover for article
            $table->timestamps();
        });
    }

    /**Reverse the migrations.
     * @return void
    */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
