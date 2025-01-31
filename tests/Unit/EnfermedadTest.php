<?php

namespace Tests\Unit;
use App\Models\Enfermedad;
use PHPUnit\Framework\TestCase;

class EnfermedadTest extends TestCase
{
    /**
     * Verificar que un modelo se cree correctamente en memoria
     */
    public function test_creacion_enfermedad_en_memoria(): void
    {

        $enfermedad = new Enfermedad(['nombre'=>'COVID 19','descripcion'=>'Contagiosa',]);

        $this->assertEquals('COVID 19',$enfermedad->nombre);

        $this->assertEquals('Contagiosa',$enfermedad->descripcion);


    }

    public function test_fillable_enfermedad(){
        $enfermedad = new Enfermedad();
        $this->assertEquals([
            'nombre',
            'descripcion',
        ],$enfermedad->getFillable());


    }




}
