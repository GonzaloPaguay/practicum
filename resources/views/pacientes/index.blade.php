@extends('layouts.master')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('HOSPITAL ISIDRO AYORA') }} 
        <BR>   
        {{ __('Gestión de Pacientes') }}

        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="col-x1-12">
                    <form action="{{ route('pacientes.index')}}" method="get">
                         <div class="form row">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="texto" value="{{$texto}}">
                            </div>
                            <div class="col-auto">
                                 <input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                            <div class="col-auto">
                                 <a href="{{route('pacientes.create')}}" class="btn btn-success">Nuevo</a>
                            </div>

                        </div>
                    </form>
                </div>


                <div class="col-x1-20">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>ID</th>
                                <th>APELLIDOS</th>
                                <th>NOMBRES</th>
                                <th>C.I.</th>
                                <th>TELÉFONO</th>
                                <th>DIRECCIÓN</th>
                                <th>EMAIL</th>
                                
                            </tr>
                        </thead>
                           
                        <tbody>

                            @if(count($pacientes)<=0)
                            <tr>
                                <td colspan="8">No hay resultados</td>
                            </tr>
                            @else
                            @foreach ($pacientes as $paciente)
                            <tr>
                                <br>
                                <td> 
                                    <a href="{{route('pacientes.edit',$paciente->id)}}" class="btn btn-warning btn-sm"> Editar</a>
                                   <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$paciente->id}}">
                                        Eliminar
                                    </button>
                                </td>


                             
                                
                                <td>{{$paciente->id}}</td>
                                <td>{{$paciente->apellidos}}</td>
                                <td>{{$paciente->nombres}}</td>
                                <td>{{$paciente->ci}}</td>
                                <td>{{$paciente->telefono_domicilio}}</td>
                                <td>{{$paciente->direccion}}</td>
                                <td>{{$paciente->email}}</td>
                              
                            </tr> 
                            @include('pacientes.delete')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                   
                </div>
            </div>


           

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</x-app-layout>