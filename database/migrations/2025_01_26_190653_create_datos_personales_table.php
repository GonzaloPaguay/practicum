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

         Schema::create('datos_personales', function (Blueprint $table) {
            
            
            $table->unsignedBigInteger('id');
            $table->string('apellidos',50);
            $table->string('nombres',50);
            $table->string('ci',13);
            $table->date('fecha_nacimiento');
            $table->string('telefono_domicilio',15)->nullable();
            $table->string('telefono_trabajo',15)->nullable();
            $table->string('telefono_celular',15)->nullable();
            $table->string('direccion',80)->nullable(); 
            $table->string('estado_civil',20)->nullable(); 
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');   
            $table->timestamps();      

        } );         
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_personales');
    }
};
