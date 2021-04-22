<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('area_id')->nullable();

            $table->string("first_name");
            $table->string("last_name");
            $table->string("type_contract")->nullable();
            $table->string("type_employee")->nullable();
            $table->string("picture")->nullable()->default("default.jpg");
            $table->string("email")->unique()->nullable();
            $table->string("personal_email")->unique()->nullable();
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->string('birthdate')->nullable()->default(null);
            $table->string("document_type");
            $table->string("document_number")->unique()->nullable();
            $table->string("document_expedition_place")->nullable();
            $table->string("document_expedition_date")->nullable();
            $table->string("residence_place")->nullable();
            $table->string("position")->nullable();
            $table->string("grade")->nullable();
            $table->string("denomination")->nullable();
            $table->string("salary")->nullable();
            $table->string("experience_teacher")->nullable();
            $table->string("experience_area")->nullable();
            $table->string("observation")->nullable();
            $table->boolean("is_supervisor")->default(false);

            $table->foreign('area_id')
                  ->references('id')->on('areas')
                  ->onDelete('set null');

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('employees');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
