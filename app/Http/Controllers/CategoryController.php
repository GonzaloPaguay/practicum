<?php

namespace App\Http\Controllers;

use App\Models\Prueba01;
use App\Models\Prueba02;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function guardar(){
      

        $prueba01 = new Prueba01();
        $prueba01->nombre = "Gonzalo";
        $prueba01->nombre = "Paguay Toaquiza";
        $prueba01->save();

        
        
        $prueba02 = new Prueba02();
        $prueba02->id_prueba01 = $prueba01->id;
        $prueba02->nombre = "Gonzalo";
        $prueba02->nombre = "Paguay Toaquiza";
        $prueba02->save();

        echo 'Grabado';

    }


}
