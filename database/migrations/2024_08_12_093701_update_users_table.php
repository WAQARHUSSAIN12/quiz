<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
        Schema::table('users', function (Blueprint $table) {

            $table->string('profile_photo')->nullable(); // Add a new column
            $table->string('first_name'); //add first name column 
            $table->string('last_name');  //add first name column 
            $table->string('gender');  //add gender column 
            $table->boolean('status');  //add status column
            $table->string('online');  //add gender column 
            DB::statement("ALTER TABLE users CHANGE COLUMN name user_name VARCHAR(255)");
            $table->string('user_role');  //add user role 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('profile_photo'); // Remove the column
            $table->dropColumn('first_name'); // Remove the column
            $table->dropColumn('last_name'); // Remove the column
            $table->dropColumn('gender'); // Remove the column
            $table->dropColumn('status'); // Remove the column
            $table->dropColumn('online'); // Remove the column
            $table->dropColumn('user_role'); // Remove the column
            DB::statement("ALTER TABLE users CHANGE COLUMN user_name name VARCHAR(255)");
            
        });
    }
};