<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtemasTable extends Migration
{
    public function up()
    {
        Schema::create('subtemas', function (Blueprint $table) {
            $table->char('noDeSubtema', 15)->primary(); // Llave primaria
            $table->char('noDeUnidad', 2);
            $table->char('materia', 7);
            $table->string('nombreSubtema', 150);
            $table->timestamps(); // Columnas created_at y updated_at
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('subtemas');
    }
}
