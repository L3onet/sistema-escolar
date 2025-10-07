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
        Schema::create('jefes', function (Blueprint $table) {
            $table->char('clave_area', 6)->primary();             //clave del area CHAR   
            $table->string('descripcion_area', 200);  //descripcion del area VARCHAR    
            $table->string('jefe_area', 50);          //jefe del area VARCHAR
            $table->char('rfc', 13);                   //rfc CHAR
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jefes');
    }
};
