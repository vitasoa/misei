<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('job_title');
            $table->binary('photo')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('work_email')->unique();
            $table->string('work_location')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->string('departement')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->enum('gender', ["Masculin", "Féminin", "Autre"])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('city_of_bith')->nullable();
            $table->string('country_of_birth')->nullable();
            $table->enum('marital', ["Célibataire", "Marié(e)", "Cohabitant légal", "Veuf(ve)", "Divorcé(e)"])->nullable();
            $table->string('spouse_complete_name')->nullable();
            $table->date('spouse_birthdate')->nullable();
            $table->string('children_nbr')->nullable();
            $table->string('study_field')->nullable();
            $table->string('study_school')->nullable();
            $table->bigInteger('user_id')->nullable(); 
            $table->foreign('parent_id')->references('id')->on('employees');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('employees');
    }
}
