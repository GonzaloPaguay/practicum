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
        Schema::create('paciente', function (Blueprint $table) {
          
            $table->bigInteger('id')->unsigned();
            $table->string('antecedentes_personales',100);
            $table->string('antecedentes_familiares',100);
            $table->string('habitos',100);
            $table->string('personalidad',100);
            $table->string('condicion',100);
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');  
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente');
    }
};
