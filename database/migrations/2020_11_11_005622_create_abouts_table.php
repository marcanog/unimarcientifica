<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');

            /**español*/
            $table->string('about_title',255)->nullable(false);
            $table->text('about_text')->nullable(false);


            /**english*/
            $table->string('en_about_title',255)->nullable(false);
            $table->text('en_about_text')->nullable(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
