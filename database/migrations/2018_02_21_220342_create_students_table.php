<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    
    public function up()
    {
        Schema::create('students', function (Blueprint $table) 
        {
            $table->increments('id');
            
            $table->string('picture')->default('default.jpg');
            $table->string('first_name');
            $table->string('last_name');

            $table->string('document_type', 10);
            $table->string('document_number', 20);
            $table->string('blood_type', 5)->nullable();

            $table->string('email', 50)->nullable();
            $table->string('personal_email', 50)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('address', 100)->nullable();
     
            $table->unsignedInteger('course_id')->nullable();
           
            $table->timestamps();

            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('students');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
