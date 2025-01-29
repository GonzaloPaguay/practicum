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
        Schema::create('medico', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('licencia',20);
            $table->bigInteger('especialidad_id')->unsigned();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');  
            $table->foreign('especialidad_id')->references('id')->on('especialidad')->onDelete('cascade');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medico');
    }
};
