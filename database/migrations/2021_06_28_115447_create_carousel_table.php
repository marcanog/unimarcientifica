<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel', function (Blueprint $table) {
            $table->bigIncrements('id');
            /*spanish*/
            $table->text('route_image_carousel');
            $table->string('title_carousel',1000)->nullable(false);
            $table->string('info_carousel',2000)->nullable(false);
            /*english*/
            $table->text('en_route_image_carousel');
            $table->string('en_title_carousel',1000)->nullable(false);
            $table->string('en_info_carousel',2000)->nullable(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousel');
    }
}
