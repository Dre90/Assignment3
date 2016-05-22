<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('interestedId')->unsigned()->index();
            $table->integer('ownerId')->unsigned()->index();
            $table->integer('itemId')->unsigned()->index();
            $table->timestamps();

            $table->unique(['interestedId', 'ownerId', 'itemId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('conversations');
    }
}
