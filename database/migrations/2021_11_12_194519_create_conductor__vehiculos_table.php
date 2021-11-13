<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductorVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductor_vehiculo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')
            ->references('id')
            ->on('vehiculos')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->foreignId('conductor_id')
            ->references('id')
            ->on('conductores')
            ->onUpdate('cascade')
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
        Schema::dropIfExists('conductor__vehiculos');
    }
}
