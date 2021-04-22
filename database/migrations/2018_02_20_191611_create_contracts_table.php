<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('supervisor_id')->nullable();
            $table->unsignedInteger('area_id')->nullable();

            $table->string('type');
            $table->string('number', 20);
            $table->string('SIIF', 20); // número
            $table->string('novelty')->nullable(); 
            $table->date('legalization_date'); // fecha que se legaliza el contrato
            $table->date('start_date');
            $table->date('end_date');
            $table->string('source')->nullable();
            $table->string('resource')->nullable();
            $table->string('value');
            $table->string('monthly_value')->nullable(); // Valor mensualidad
            $table->string('duration')->nullable();
            $table->string('program')->nullable();
            $table->string('insurance')->nullable(); //Aseguradora
            $table->string('number_policy')->nullable(); // número de poliza
            $table->string('policy_expedition_date')->nullable(); // Fecha de expedicion de la poliza
            $table->string('CDP', 20)->nullable(); //Certificado de disponibilidad presupuestal - numero
            $table->text('object')->nullable();
            $table->text('payment_method')->nullable();
            $table->string('arl_name')->nullable();
            $table->integer('arl_rating')->nullable(); //Afiliación riesgos laborales - numero de 1 a 5
            $table->string('arl_expedition_date')->nullable();
            $table->string('eps_name')->nullable();
            $table->string('pension_fund')->nullable();
            $table->string('last_month_payment_contribution')->nullable();
            $table->string('bank')->nullable();
            $table->string('account_number')->nullable();

            $table->foreign('area_id')
                  ->references('id')->on('areas')
                  ->onDelete('set null');
                  
            $table->foreign('supervisor_id')
                ->references('id')->on('employees')
                ->onDelete('set null');

            $table->foreign('employee_id')
                ->references('id')->on('employees')
                ->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::dropIfExists('contracts');

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
