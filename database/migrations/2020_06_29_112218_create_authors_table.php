<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->bigIncrements('id');
            /*spanish*/
            $table->string('name_author',300)->nullable(false);
            $table->string('email_author',60)->nullable(false)->unique();
            $table->text('grades_author')->nullable(false);
            $table->text('resume_author')->nullable(false);
            $table->text('route_image_author');

            /*english*/
            $table->text('en_grades_author')->nullable(false);
            $table->text('en_resume_author')->nullable(false);

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
        Schema::dropIfExists('authors');
    }
}
