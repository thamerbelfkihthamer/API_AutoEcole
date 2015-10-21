<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Vehicules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('matricule');
            $table->date('date_visite_technique');
            $table->date('date_fin_assurence');
            $table->string('vidange');
            $table->integer('autoecoletable_id');
            $table->softDeletes();
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
        Schema::drop('Vehicules');
    }
}
