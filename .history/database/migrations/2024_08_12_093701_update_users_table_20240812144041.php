<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $table->string('profile_photo')->nullable(); // Add a new column
        $table->string('first_name' ); //add first name column 
        $table->string('last_name' );  //add first name column 
        $table->string('last_name' );  //add first name column 
        $table->renameColumn('username', 'user_name'); // Rename colum

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
