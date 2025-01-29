<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get("texto"));
        //$clientes=Cliente::all();
        $clientes=DB::table('cliente')
               ->select('id','apellidos','nombre','documento','telefono','email','direccion')
               ->where('apellidos','LIKE','%'.$texto.'%')
               ->orWhere('documento','LIKE','%'.$texto.'%')
               ->orderby('apellidos','asc')
               ->paginate(2);
        return view('cliente.index',compact('clientes','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cliente.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente;
        $cliente->apellidos=$request->input('apellidos');
        $cliente->nombre=$request->input('nombre');
        $cliente->documento=$request->input('documento');
        $cliente->nombre=$request->input('nombre');
        $cliente->telefono=$request->input('telefono');
        $cliente->direccion=$request->input('direccion');
        $cliente->email=$request->input('email');
        $cliente->save();

        dd($cliente);


        echo '
        <script>
            alert("Cliente registrado con éxito");
            window.location = "/cliente";
        </script>'; 

       // return redirect()->route('cliente.index')->with('success','Cliente creado satisfactoriamente');

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
    {      // 

        $cliente=Cliente::findOrFail($id);


        dd($cliente);
        //return $cliente;
        return view('cliente.edit',compact('cliente'));


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
        $cliente=Cliente::findorFail($id);
        $cliente->apellidos=$request->input('apellidos');
        $cliente->nombre=$request->input('nombre');
        $cliente->documento=$request->input('documento');
        $cliente->telefono=$request->input('telefono');
        $cliente->direccion=$request->input('direccion');
        $cliente->email=$request->input('email');
        $cliente->save();
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $cliente=Cliente::findorFail($id);
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}