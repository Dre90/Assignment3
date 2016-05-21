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
          $table->char('postnr', 4)->index();
          $table->integer('phonenumber')->unsigned();
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
