<?php

namespace Tests\Unit;
use App\Models\Enfermedad;
use App\Models\Medico;
use PHPUnit\Framework\TestCase;

class MedicoTest extends TestCase
{
    /**
     * Verificar que un modelo se cree correctamente en memoria
     */
    public function test_creacion_medico_en_memoria(): void
    {

        $medico = new Medico(['id'=>1,'licencia'=>'12345','especialidad_id'=>1,]);

        $this->assertEquals(1,$medico->id);
        $this->assertEquals('12345',$medico->licencia);
        $this->assertEquals(1,$medico->especialidad_id);


    }

    public function test_fillable_enfermedad(){
        $medico= new Medico();
        $this->assertEquals([
            'id',
            'licencia',
            'especialidad_id',
        ],$medico->getFillable());

             
    }


}
