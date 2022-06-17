<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editions', function (Blueprint $table) {
            $table->bigIncrements('id');
            /*spanish*/
            $table->integer('edition_number')->nullable(false);
            $table->string('edition_date')->nullable();
            $table->string('edition_title',1500)->nullable(false);
            $table->text('edition_description')->nullable(false);
            $table->text('edition_route_image');
            $table->text('edition_route_full_file');
            /*english*/
            $table->string('edition_title_en',1500)->nullable(false);
            $table->text('edition_description_en')->nullable(false);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editions');
    }
}
