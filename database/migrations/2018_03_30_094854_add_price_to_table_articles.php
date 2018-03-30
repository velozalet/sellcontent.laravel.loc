<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceToTableArticles extends Migration
{
    /** Run the migrations.
     * @return void
    */
    public function up()
    {
        if( Schema::hasTable('articles') ) {
            Schema::table('articles', function (Blueprint $table) {
                $table->string('price',4);
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
