<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('propietario_id')
            ->references('id')
            ->on('propietarios')
            ->onUpdate('cascade')
            ->onDelete('cascade'); 
            $table->string('placa');
            $table->string('color');
            $table->string('Marca');
            $table->enum('tipo_de_vehiculo', [
                'particular',
                'publico'
            ]);
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
        Schema::dropIfExists('vehiculos');
    }
}
