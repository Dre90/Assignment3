<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintsUserItemConversationMessagesTabels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->foreign('postnr')->references('postnr')->on('posts');
        });

        Schema::table('items', function(Blueprint $table)
        {
            $table->foreign('categoryId')->references('id')->on('categories');
            $table->foreign('userId')->references('id')->on('users');
        });

        Schema::table('conversations', function(Blueprint $table)
        {
            $table->foreign('fromUserId')->references('id')->on('users');
            $table->foreign('toUserId')->references('id')->on('users');
            $table->foreign('itemId')->references('id')->on('items');
        });

        Schema::table('messages', function(Blueprint $table)
        {
            $table->foreign('conversationId')->references('Id')->on('conversations');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropForeign(['postnr']);
        });

        Schema::table('items', function(Blueprint $table)
        {
            $table->dropForeign(['categoryId']);
            $table->dropForeign(['userId']);
        });

        Schema::table('conversations', function(Blueprint $table)
        {
            $table->dropForeign(['fromUserId']);
            $table->dropForeign(['toUserId']);
            $table->dropForeign(['itemId']);
        });

        Schema::table('messages', function(Blueprint $table)
        {
            $table->dropForeign(['conversationId']);
        });
    }
}
