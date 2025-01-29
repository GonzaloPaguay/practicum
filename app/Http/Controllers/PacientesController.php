<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\User;
use App\Models\DatosPersonal;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\DB;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
       

        $texto=trim($request->get("texto"));

        $pacientes = DB::select('select a.id,
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
                               c.id as paciente_id
                               from users a,datos_personales b,paciente c
                               where a.id=b.id and a.id=c.id');
                               


                               
      //dd($medicos);
      
        //$clientes=Cliente::all();

       // $medicos=DB::table('medicos')
     //       ->select('id','apellidos','nombres','ci','especialidad','registro','telefono','direccion','contacto','email')
      //         ->where('apellidos','LIKE','%'.$texto.'%')
     //          ->orWhere('registro','LIKE','%'.$texto.'%')
     //          ->orderby('apellidos','asc')
      //         ->paginate(2);

        return view('pacientes.index',compact('pacientes','texto'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades= Especialidad::all();
        return view("pacientes.create",compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $usuario = new User;
        $usuario->name=$request->input('name');
        $usuario->email=$request->input('email');
        $usuario->password=Hash::make($request->input('password'));
        $usuario->save();
       

        $datos = new DatosPersonal;
        $datos->id = $usuario->id;
        $datos->apellidos=$request->input('apellidos');
        $datos->nombres=$request->input('nombres');
        $datos->ci=$request->input('ci');
        $datos->fecha_nacimiento=$request->input('fecha_nacimiento');
        $datos->telefono_domicilio=$request->input('telefono_domicilio');
        $datos->telefono_trabajo=$request->input('telefono_trabajo');
        $datos->telefono_celular=$request->input('telefono_celular');
        $datos->direccion=$request->input('direccion');
        $datos->estado_civil=$request->input('estado_civil');
        $datos->save();

      

        $paciente = new Paciente();
        $paciente->id = $usuario->id;
        $paciente->antecedentes_personales='';
        $paciente->antecedentes_familiares='';
        $paciente->habitos='';
        $paciente->personalidad='';
        $paciente->condicion='';

        $paciente->save();


        //Medico::create($request->all());


        echo '
        <script>
            alert("Paciente registrado con éxito");
            window.location = "/paciente";
        </script>'; 



        return redirect()->route('pacientes.index')->with('success','Médico creado satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           
        $especialidades= Especialidad::all();

        $pacientes = DB::select('select a.id,
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
        c.id as paciente_id
        from users a,datos_personales b,paciente c
        where a.id=b.id and a.id=c.id and a.id='.$id);

        
          
           
     
         $personales=DatosPersonal::findOrFail($id);
         $usuarios=User::findOrFail($id);
         $pacientes=Paciente::findOrFail($id);

      
       

        return view('pacientes.edit',compact('pacientes','personales','usuarios'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //



        $personales=DatosPersonal::findOrFail($id);
        $usuarios=User::findOrFail($id);
        $pacientes=Paciente::findOrFail($id);

        $usuario=User::findOrFail($id);
        $usuario->name=$request->input('name');
        $usuario->email=$request->input('email');
        $usuario->password=Hash::make($request->input('password'));
        $usuario->save();
       
        $datos=DatosPersonal::findOrFail($id);
        $datos->id = $usuario->id;
        $datos->apellidos=$request->input('apellidos');
        $datos->nombres=$request->input('nombres');
        $datos->ci=$request->input('ci');
        $datos->fecha_nacimiento=$request->input('fecha_nacimiento');
        $datos->telefono_domicilio=$request->input('telefono_domicilio');
        $datos->telefono_trabajo=$request->input('telefono_trabajo');
        $datos->telefono_celular=$request->input('telefono_celular');
        $datos->direccion=$request->input('direccion');
        $datos->estado_civil=$request->input('estado_civil');
        $datos->save();

      
        $paciente=Paciente::findOrFail($id);
        $paciente->id = $usuario->id;
        $paciente->save();


        echo '
        <script>
            alert("Médico actualizado con éxito");
            window.location = "/pacientes";
        </script>'; 



   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

             

        $medicos=Paciente::findOrFail($id);
        $medicos->delete();

        $personales=DatosPersonal::findOrFail($id);
        $personales->delete();

        $usuarios=User::findOrFail($id);
        $usuarios->delete();

        
        echo '
        <script>
            alert("Paciente ha sido eliminado");
            window.location = "/pacientes";
        </script>'; 

       
        return redirect()->route('pacientes.index');
    }
}