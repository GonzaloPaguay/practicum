<?php

namespace App\Http\Controllers;


use App\Models\CitaMedica;
use App\Models\Enfermedad;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
  
        $citas = CitaMedica::with('enfermedad')->get();
 

    

        return view('citas_medicas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
        
        $doctors = DB::select('select a.id,b.apellidos as name,b.nombres from medico a,datos_personales b where a.id=b.Id');
        

        //dd($doctors);
        
       //$doctors = Doctor::all();
        $enfermedades = Enfermedad::all();
        return view('citas_medicas.create', compact('enfermedades','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        

        $request->validate([
            'fecha' => 'required|date',
            'paciente_id' => 'required|integer',
            'doctor_id' => 'required|integer',
            'enfermedad_id' => 'nullable|integer'
            
        ]);

        

        CitaMedica::create($request->all());
        return redirect()->route('citas_medicas.index')->with('success','Citas Medicas se creo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
     

        $doctors = DB::select('select a.id,
        a.name, 
        a.email,
        b.apellidos,
        b.nombres,
        b.ci,
        b.fecha_nacimiento,
        b.telefono_domicilio,
        b.telefono_trabajo,
        b.telefono_celular,
        b.direccion,
        b.estado_civil,
        b.id as personal_id,
        c.licencia,
        c.id as medico_id,
        d.nombre as nomespecialidad
        from users a,datos_personales b,medico c,especialidad d
        where a.id=b.id and a.id=c.id and c.especialidad_id=d.id');
        


        $citaMedica=CitaMedica::findOrFail($id);
        $enfermedades = Enfermedad::all();


        //$doctors = Doctor::all();
        return view('citas_medicas.edit',compact('citaMedica','enfermedades','doctors'));


    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, CitaMedica $citaMedica)
    {


       // $request->validate([
       //     'fecha' => 'requered|date',
       //     'hora' => 'requered',
       //     'paciente_id' => 'requered|integer',
        //    'doctor_id' => 'requered|integer',
        //    'enfermedad_id' => 'nullable|integer'
        //]);


        //dd($request);
       
        $citaMedica=CitaMedica::findOrFail($request->cita_id);

        $citaMedica->update($request->all());
        return redirect()->route('citas_medicas.index')->with('success','Citas Medicas actualizada satisfactoriamente');

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CitaMedica $citaMedica,$id)
    {
        
        $citaMedica=CitaMedica::findOrFail($id);
        $citaMedica->delete();
        return redirect()->route('citas_medicas.index')->with('success','Citas Medicas eliminada satisfactoriamente');

    }
}
