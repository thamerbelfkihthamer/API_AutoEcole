<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function(Blueprint $table){
            $table->increments('id');
            $table->string('type_piece');
            $table->integer('num_piece');
            $table->string('name');
            $table->string('prenom');
            $table->string('email');
            $table->integer('tel');
            $table->date('date_naisssance');
            $table->string('adresss');
            $table->integer('autoecoletable_id');
            $table->integer('examen_id');
            $table->timestamp('created_at');
            $table->timestamp('update_at');
            $table->softDeletes();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop( 'client' );
    }
}
