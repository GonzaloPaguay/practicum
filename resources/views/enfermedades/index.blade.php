<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listado de Enfermedades') }}
        </h2>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </x-slot>


<div class="container">
    
    <a href="{{ route('enfermedades.create') }}" class="btn btn-primary mb-3">Crear Enfermedad</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enfermedades as $enfermedad)
                <tr>
                    <td>{{ $enfermedad->id }}</td>
                    <td>{{ $enfermedad->nombre }}</td>
                    <td>{{ $enfermedad->descripcion }}</td>
                    <td>
                        <a href="{{ route('enfermedades.edit', $enfermedad->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('enfermedades.destroy', $enfermedad->id) }}" method="POST" class="d-inline">
                           
                        
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$enfermedad->id}}">
                            Eliminar
                        </form>
                    </td>
                </tr>
                @include('enfermedades.delete')
            @endforeach
        </tbody>
    </table>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</x-app-layout>