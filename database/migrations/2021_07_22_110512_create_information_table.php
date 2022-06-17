<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->bigIncrements('id');

            /**español**/
            $table->string('information_title',355)->nullable(false);
            $table->text('information_text')->nullable(false);
            $table->string('ruta_info_file')->nulleable();
            /**english**/
            $table->string('en_information_title',355)->nullable(false);
            $table->text('en_information_text')->nullable(false);
            $table->string('ruta_info_en_file')->nulleable();
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
        Schema::dropIfExists('information');
    }
} 
