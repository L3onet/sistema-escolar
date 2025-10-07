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
        Schema::create('School', function (Blueprint $table) {
            $table->integer('clave_escuela')->primary();                //clave primaria INT
            $table->integer('tipo_escuela');                            //tipo escuela INT
            $table->string('nombre_escuela', 100);                      //nombre escuela STRING(100)
            $table->string('clave_coepes', 20);                         //clave coepes STRING(20)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('School');
    }
};
