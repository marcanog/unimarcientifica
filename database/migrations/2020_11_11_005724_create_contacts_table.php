<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            
            /**español**/
            $table->string('contact_title',255)->nullable(false);
            $table->text('contact_text')->nullable(false);

            /**english**/
            $table->string('en_contact_title',255)->nullable(false);
            $table->text('en_contact_text')->nullable(false);

            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
