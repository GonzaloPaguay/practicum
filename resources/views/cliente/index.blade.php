<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Clientes') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="col-x1-12">
                    <form action="{{ route('cliente.index')}}" method="get">
                         <div class="form row">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="texto" value="{{$texto}}">
                            </div>
                            <div class="col-auto">
                                 <input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                            <div class="col-auto">
                                 <a href="{{route('cliente.create')}}" class="btn btn-success">Nuevo</a>
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
                                <th>Id</th>
                                <th>Apellidos</th>
                                <th>Nombre</th>
                                <th>Documento</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                           
                        <tbody>

                            @if(count($clientes)<=0)
                            <tr>
                                <td colspan="8">No hay resultados</td>
                            </tr>
                            @else
                            @foreach ($clientes as $cliente)
                            <tr>
                                <br>
                                <td> 
                                    <a href="{{route('cliente.edit',$cliente->id)}}" class="btn btn-warning btn-sm"> Editar</a>
                                   <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$cliente->id}}">
                                        Eliminar
                                    </button>
                                </td>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->apellidos}}</td>
                                <td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->documento}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <td>{{$cliente->email}}</td>
                            </tr> 
                            @include('cliente.delete')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                   
                </div>
            </div>


           {{$clientes->links()}}

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</x-app-layout>