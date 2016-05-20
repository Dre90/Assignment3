<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomFieldsToUsersTable extends Migration
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
          $table->string('address');
          $table->integer('postnr',false)->unsigned();
          $table->integer('phonenumber',false)->unsigned();
          $table->string('userImage');
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
        $table->dropColumn('address');
        $table->dropColumn('postnr');
        $table->dropColumn('phonenumber');
        $table->dropColumn('userImage');
      });
    }
}
