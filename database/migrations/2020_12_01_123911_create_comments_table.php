<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment');
            $table->boolean('approved');
            $table->unsignedbigInteger('users_id')->index();
            $table->unsignedbigInteger('articles_id')->index();
            $table->timestamps();
        });

    }



    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
