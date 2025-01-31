<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\CitaMedica;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CitaMedicaRelationshipTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Validar la relación entre CitaMedica, Enfermedad, Medico y Paciente.
     */
    public function test_cita_medica_tiene_relacion_con_enfermedad()
    {
        // Crear un modelo CitaMedica
        $cita = new CitaMedica();

        
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $cita->enfermedad());
    }

    public function test_cita_medica_tiene_relacion_con_medico()
    {
        // Crear un modelo CitaMedica
        $cita = new CitaMedica();

       
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $cita->medico());
    }

    public function  test_cita_medica_tiene_relacion_con_paciente()
    {
        
        $cita = new CitaMedica();

        
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $cita->paciente());
    }


   


}