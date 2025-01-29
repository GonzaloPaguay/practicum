<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
       
        $especialidades = Especialidad::all();
        return view('especialidades.index', compact('especialidades'));

       


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
        ]);

        Especialidad::create($request->all());
        return redirect()->route('especialidades.index')->with('success','Especialidades creadas satisfactoriamente');
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
        
        $especialidad=Especialidad::findOrFail($id);


        return view('especialidades.edit', compact('especialidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
      
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'nullable|string',
        ]);

        $especialidad=especialidad::findOrFail($id);

        $especialidad->update($request->all());
        return redirect()->route('especialidades.index')->with('success','Especialidad autualizada satisfactoriamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $especialidad=Especialidad::findOrFail($id);
        $especialidad->delete();
        return redirect()->route('especialidades.index')->with('success','Especialidad eliminada satisfactoriamente');
    }
}