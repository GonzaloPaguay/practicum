<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\User;
use App\Models\DatosPersonal;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\DB;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get("texto"));

        $medicos = DB::select('select a.id,
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
                               


                               
      //dd($medicos);
      
        //$clientes=Cliente::all();

       // $medicos=DB::table('medicos')
     //       ->select('id','apellidos','nombres','ci','especialidad','registro','telefono','direccion','contacto','email')
      //         ->where('apellidos','LIKE','%'.$texto.'%')
     //          ->orWhere('registro','LIKE','%'.$texto.'%')
     //          ->orderby('apellidos','asc')
      //         ->paginate(2);

        return view('medicos.index',compact('medicos','texto'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades= Especialidad::all();
        return view("medicos.create",compact('especialidades'));
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

      

        $medico = new Medico();
        $medico->id = $usuario->id;
        $medico->licencia=$request->licencia;
        $medico->especialidad_id=$request->especialidad_id;
        $medico->save();


        //Medico::create($request->all());


        echo '
        <script>
            alert("Médico registrado con éxito");
            window.location = "/medicos";
        </script>'; 



        //return redirect()->route('medicos.index')->with('success','Médico creado satisfactoriamente');

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

        $medicos = DB::select('select a.id,
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
        d.nombre
        from users a,datos_personales b,medico c,especialidad d
        where a.id=b.id and a.id=c.id and c.especialidad_id=d.id and a.id='.$id);

        
          
           
     
         $personales=DatosPersonal::findOrFail($id);
         $usuarios=User::findOrFail($id);
         $medicos=Medico::findOrFail($id);

      
       

        return view('medicos.edit',compact('medicos','personales','usuarios','medicos','especialidades'));


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
        $medicos=Medico::findOrFail($id);

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

      
        $medico=Medico::findOrFail($id);
        $medico->id = $usuario->id;
        $medico->licencia=$request->licencia;
        $medico->especialidad_id=$request->especialidad_id;
        $medico->save();


        echo '
        <script>
            alert("Médico actualizado con éxito");
            window.location = "/medicos";
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

             

        $medicos=Medico::findOrFail($id);
        $medicos->delete();

        $personales=DatosPersonal::findOrFail($id);
        $personales->delete();

        $usuarios=User::findOrFail($id);
        $usuarios->delete();

        
        echo '
        <script>
            alert("Médico ha sido eliminado");
            window.location = "/medicos";
        </script>'; 

       
        return redirect()->route('medicos.index');
    }
}