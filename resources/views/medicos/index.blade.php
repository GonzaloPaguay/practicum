<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Médicos') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="col-x1-12">
                    <form action="{{ route('medicos.index')}}" method="get">
                         <div class="form row">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="texto" value="{{$texto}}">
                            </div>
                            <div class="col-auto">
                                 <input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                            <div class="col-auto">
                                 <a href="{{route('medicos.create')}}" class="btn btn-success">Nuevo</a>
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
                                <th>ESPECIALIDAD</th>
                                <th>EMAIL</th>
                                
                            </tr>
                        </thead>
                           
                        <tbody>

                            @if(count($medicos)<=0)
                            <tr>
                                <td colspan="8">No hay resultados</td>
                            </tr>
                            @else
                            @foreach ($medicos as $medico)
                            <tr>
                                <br>
                                <td> 
                                    <a href="{{route('medicos.edit',$medico->id)}}" class="btn btn-warning btn-sm"> Editar</a>
                                   <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$medico->id}}">
                                        Eliminar
                                    </button>
                                </td>


                             
                                
                                <td>{{$medico->id}}</td>
                                <td>{{$medico->apellidos}}</td>
                                <td>{{$medico->nombres}}</td>
                                <td>{{$medico->ci}}</td>
                                <td>{{$medico->telefono_domicilio}}</td>
                                <td>{{$medico->nomespecialidad}}</td>
                                <td>{{$medico->email}}</td>
                              
                            </tr> 
                            @include('medicos.delete')
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