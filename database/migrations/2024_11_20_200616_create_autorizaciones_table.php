<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('autorizaciones', function (Blueprint $table) {
            $table->char('periodo', 5);
            $table->string('no_de_control', 10);
            $table->char('tipo_autorizacion', 2);
            $table->string('motivo_autorizacion', 100)->nullable();
            $table->string('quien_autoriza', 35)->nullable();
            $table->dateTime('fecha_hora_autoriza')->nullable();
            $table->char('materia_afectada', 7)->nullable();
            $table->integer('cantidad')->nullable();
            //($table->foreign('no_de_control')->references('no_de_control')->on('alumnos')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['periodo', 'no_de_control', 'tipo_autorizacion']);
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorizaciones');
    }
};
