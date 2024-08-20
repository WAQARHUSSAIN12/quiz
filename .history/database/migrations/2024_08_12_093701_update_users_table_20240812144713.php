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
        $table->string('first_name'); //add first name column 
        $table->string('last_name');  //add first name column 
        $table->string('gender');  //add gender column 
        $table->boolean('status');  //add status column
        $table->string('online');  //add gender column 
        $table->renameColumn('name', 'user_name'); //Rename colum
        $table->string('user_role');  //add user role\ 


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
